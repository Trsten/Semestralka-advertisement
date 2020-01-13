<?php

namespace App\Controllers;

use App\Models\User;
use Lib\Router;

class HomeController
{
    public function index()
    {
        extract([
            'title' => 'Property - Home',
            'sectionView' => 'app/Views/home.php'
        ]);

        require('app/Views/layout.php');
    }

    public function login()
    {
        extract([
            'title' => 'Login',
            'sectionView' => 'app/Views/loginForm.php'
        ]);

        require('app/Views/layout.php');
    }

    public function register()
    {
        extract([
           'title' => "Register",
            'sectionView' => 'app/Views/registerForm.php'
        ]);

        require('app/Views/layout.php');
    }

    public function logout()
    {
        extract([
            'title' => "Logout",
            'sectionView' => 'app/Views/home.php'
        ]);

        require('app/Views/layout.php');
    }

    public function registerUser(array $data)
    {
        if (!self::verifyUsername($data['username'])) {
            Router::redirect('/home/register');
        }

        if($data['password'] != $data['con_password']) {
            Router::redirect('/home/register');
        }

        $user = new User($data);
        $user->heshPassword();
        $user->save();

        Router::redirect('/home/login');
    }

    public function loginUser(array $data)
    {
        if(!self::verifyUsername($data['username'])) {

            $user = User::getOneByLogin($data['username']);
            $hesh = $user->getPassword();

            if (password_verify( $data['password'],$hesh))
            {
                //login succes
                $_SESSION['loggedUser'] = $user->getUsername();
                Router::redirect('/home');
            } else {
                ///invalid password
                Router::redirect('/home/login');
            }
        } else {
            //invalid login
            Router::redirect('/home/login');
        }
    }

    public function logoutUser()
    {
        unset($_SESSION['loggedUser']);
        session_destroy();
        Router::redirect('/home');
    }

    private function verifyUsername($username)
    {
        $users = User::getAll();

        /** @var User $user */
        foreach ($users as $user) {
            if ($user->getUsername() == $username)
                return false;}
        return true;
    }
}