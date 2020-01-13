<?php

namespace App\Controllers;

use App\Models\User;
use Lib\Router;

class UserController
{
    public function index()
    {
        $users = User::getAll();
        extract([
            'title' => 'MVC - Zoznam pouzivatelov',
            'sectionView' => 'app/Views/users.php',
            'users' => $users,
        ]);

        require('app/Views/layout.php');
    }

    public function show()
    {
        if(!self::verfyUsername($_SESSION['loggedUser'])) {
            $user = User::getOneByLogin($_SESSION['loggedUser']);

            extract([
                'title' => 'Uzivatel',
                'sectionView' => 'app/Views/userInfo.php',
                'user' => $user
            ]);

            require ('app/Views/layout.php');
        } else {
            echo $_SESSION['loggedUser'];
        }
    }

    public function store()
    {
        echo 'Vytvor noveho pouzivatela';
    }

    public function edit($data)
    {

        if ($data['editUser'] == 'save' && self::verfyUsername($data['username'])) {

            $user = User::getOneByLogin($_SESSION['loggedUser']);

            if (!empty($data['username']))
            {
                $user->setUsername($data['username']);
                $_SESSION['loggedUser'] = $data['username'];
            }

            if (!empty($data['full_name']))
                $user->setFullName($data['full_name']);

            if (!empty($data['password']))
                $user->setPassword(password_hash($data['password'],PASSWORD_BCRYPT));

            if (!empty($data['email']))
                $user->setEmail($data['email']);

            $user->update();

            Router::redirect('/user/show');
        } else {
            Router::redirect('/home');
        }
    }

    public function delete($id)
    {
        echo 'Vymaz pouzivatela s id ' . $id;
    }

    private function verfyUsername($username)
    {
        $users = User::getAll();

        /** @var User $user */
        foreach ($users as $user)
            if ($user->getUsername() == $username)
                return false;
            return true;
    }
}