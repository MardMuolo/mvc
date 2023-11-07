<?php

spl_autoload_register(function($class) {
    $new_class = str_replace('\\', '/', $class);

    require "$new_class.php";
});