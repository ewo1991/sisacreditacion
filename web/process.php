<?php
    session_start();
    require_once '../controller/UserController.php';    
    if(!isset($_POST['oficinas'])){ UserController::login(); }
        else { $_SESSION['idoficina'] = $_POST['oficinas']; header('Location: index.php');}
            
        ?>