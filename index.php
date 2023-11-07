<?php 
session_start();
require "app/autoload.php";
use app\Route;

Route::process();
