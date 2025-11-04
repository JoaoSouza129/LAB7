<?php
    include 'db.php';
    require('C:/XAMPP/php/lib/smarty-4.3.4/libs/Smarty.class.php');
    //require('/usr/share/php/smarty/libs/Smarty.class.php');
    $db=dbconnect($hostname,$db_name,$db_user,$db_passwd);
    session_start();
    $smarty = new Smarty();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->assign('message', '');

    $smarty->assign('email', '');			
    $smarty->assign('password', '');				
    if(isset($_SESSION['message'])){
        $smarty->assign('message', $_SESSION['message']);
        unset($_SESSION['message']);
        if(!isset($_SESSION['email']))
            $smarty->assign('email', '');
        else{
            $smarty->assign('email', $_SESSION['email']);
            unset($_SESSION['email']);
        }
    }else{
        $smarty->assign('message', '');
    }
       
    $smarty->display('login_template.tpl');
?>