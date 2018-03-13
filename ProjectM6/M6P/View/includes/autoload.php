<?php
spl_autoload_register(function ($class_name) {
    
    include $_SERVER['DOCUMENT_ROOT'] . "/ProjectM6/" .$class_name . '.php';
    
});
    
    
    
    ?>