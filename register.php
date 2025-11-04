<?php
include 'db.php';
require('C:/XAMPP/php/lib/smarty-4.3.4/libs/Smarty.class.php');
//require('/usr/share/php/smarty/libs/Smarty.class.php');
$db=dbconnect($hostname,$db_name,$db_user,$db_passwd);
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->assign('message', '');
if (!isset($_GET['error']) )
    {
        $smarty->assign('name', '');	
        $smarty->assign('email', '');			
        $smarty->assign('password', '');				
        $smarty->assign('confirmPassword', '');
       
    } ;
            
    if (isset($_GET['error']))
    {
        $smarty->assign('name', $_GET['name']);	
        $smarty->assign('email', $_GET['email']);
        $smarty->assign('password', '');			
        $smarty->assign('confirmPassword', '');	
        if ($_GET['error'] == '0'){
            $message = "Todos os campos devem ser preenchidos"; 
            $smarty->assign('message', 'Todos os campos devem ser preenchidos');
        }else if ($_GET['error'] == '1'){
            $message = "Email ja existe";
            $smarty->assign('message', 'Email já existe na base de dados');
        }else if ($_GET['error'] == '2'){
            $message = "Formato de email incorreto";
            $smarty->assign('message', 'Email tem formato incorreto');
        }else if ($_GET['error'] == '3'){
            $message = "Password invalida";
            $smarty->assign('message', 'password invalida');
        }else if ($_GET['error'] == '4'){
            $message = "Passwords nao coincidem ";
            $smarty->assign('message', 'Passwords não coincidem');
        }
    
    } ;
    $smarty->display('register_template.tpl');
?>