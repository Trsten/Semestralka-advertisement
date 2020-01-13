<?php
include 'config/config.php';

use Lib\Router;
use Lib\DB;

DB::connect('localhost', 'root', '', 'property_db');
Router::handleRoute();