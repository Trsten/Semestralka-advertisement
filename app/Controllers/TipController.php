<?php


namespace App\Controllers;
use Lib\Router;

class TipController
{
    public function index()
    {
        extract([
            'title' => 'Tips',
            'sectionView' => 'app/Views/tips.php',
        ]);

        require('app/Views/layout.php');
    }
}