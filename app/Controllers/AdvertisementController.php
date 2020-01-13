<?php

namespace App\Controllers;

use App\Models\Advertisement;
use App\Models\Comment;
use App\Models\User;
use Lib\Router;

class AdvertisementController
{
    public function index()
    {
        $advertisements = Advertisement::getAll();

        extract([
            'title' => 'Tips',
            'sectionView' => 'app/Views/advertisements.php',
            'advertisements' => $advertisements,
        ]);
        require('app/Views/layout.php');
    }

    public function create()
    {
        extract([
            'title' => 'Tips',
            'sectionView' => 'app/Views/createAdvertisementForm.php',
        ]);
        require('app/Views/layout.php');
    }

    public function edit($id)
    {
        if (!empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin')
        {
            $user = User::getOneByLogin($_SESSION['loggedUser']);
            $adv = Advertisement::getAdvertisement($user->getId(), $id);
        } else {
            $adv = Advertisement::getAdvertisementById($id);
            $comments = Comment::getAllCommentsOfAdvertisement($id);
        }

        if (empty($comments))
        {
            extract([
                'title' => 'Edit advertisement',
                'sectionView' => 'app/Views/editAdvertisementForm.php',
                'advertisement' => $adv,
            ]);
        } else {
            extract([
                'title' => 'Edit advertisement',
                'sectionView' => 'app/Views/editAdvertisementForm.php',
                'advertisement' => $adv,
                'comment' => $comments,
            ]);
        }
        require('app/Views/layout.php');
    }

    public function show()
    {
        if (!empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin')
        {
            $user = User::getOneByLogin($_SESSION['loggedUser']);
            $adv = Advertisement::getUserAdvertisements($user->getId());
        } else {
            $adv = Advertisement::getAll();
        }
        extract([
            'title' => 'Advertisements',
            'sectionView' => 'app/Views/myAdvertisements.php',
            'advertisements' => $adv,
        ]);
        require('app/Views/layout.php');
    }

    public function update($id,$data)
    {
        if (!empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin')
        {
            $userId = User::getOneByLogin($_SESSION['loggedUser'])->getId();
            $adv = Advertisement::getAdvertisement($userId,$id);
        } else {
            $adv = Advertisement::getAdvertisementById($id);
        }
        $adv->setAttributes($data);
        $adv->update();
        Router::redirect('/advertisement/show');
    }

    public function delete($id)
    {
        if (!empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin')
        {
            $userId = User::getOneByLogin($_SESSION['loggedUser'])->getId();
            $adv = Advertisement::getAdvertisement($userId,$id);
        } else {
            $adv = Advertisement::getAdvertisementById($id);
        }
        $adv->delete();
        Router::redirect('/advertisement/show');
    }

    public function createAdvertisement($data)
    {
        print_r($data);
        $user  = User::getOneByLogin($_SESSION['loggedUser']);
        $adv = new Advertisement($data);
        $adv->setUserId($user->getId());

        $adv->save();
        Router::redirect('/advertisement/show');
    }

    public function details($id)
    {
        $adv = Advertisement::getAdvertisementById($id);
        $comments = Comment::getAllCommentsOfAdvertisement($id);

        extract([
            'title' => 'Advertisements',
            'sectionView' => 'app/Views/detailAdvertisement.php',
            'advertisement' => $adv,
            'comment' => $comments,
        ]);
        require('app/Views/layout.php');
    }
}