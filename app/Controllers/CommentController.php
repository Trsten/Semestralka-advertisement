<?php

namespace App\Controllers;

use App\Models\Advertisement;
use App\Models\Comment;
use App\Models\User;
use Lib\Router;

class CommentController
{
    public function index()
    {
        extract([
            'title' => 'Comment',
            'sectionView' => 'app/Views/index.php',
        ]);
        require('app/Views/layout.php');
    }

    public function addComment($id,$data)
    {
        $adv = Advertisement::getAdvertisementById($id);

        $comment = new Comment($data);
        $date = date("Y-m-d H:i:s");
        $comment->setTime($date);
        $comment->setAdverId($adv->getId());
        $userId = User::getOneByLogin($_SESSION['loggedUser']);
        $comment->setUserId($userId->getId());
        $comment->add();
        $comments = Comment::getAllCommentsOfAdvertisement($id);

        extract([
            'title' => 'Advertisements',
            'sectionView' => 'app/Views/detailAdvertisement.php',
            'advertisement' => $adv,
            'comment' => $comments,
        ]);
        require('app/Views/layout.php');
    }

    public function delete($id,$data) {
        $comment = Comment::getCommnet($data['adv_id']);
        $comment->delete();

        $comments = Comment::getAllCommentsOfAdvertisement($id);
        $adv = Advertisement::getAdvertisementById($id);

        extract([
            'title' => 'Advertisements',
            'sectionView' => 'app/Views/editAdvertisementForm.php',
            'advertisement' => $adv,
            'comments' => $comments,
        ]);
        require('app/Views/layout.php');
    }
}