<?php 
include 'db.php';
include 'model.php';
session_start();
// Connect to database
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

// put full path to Smarty.class.php
require('C:/XAMPP/php/lib/smarty-4.3.4/libs/Smarty.class.php');
//require('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';



if(!isset($_GET['micropost_id'])){
    $micropost_id=null;
    $blog=null;
    $action="newblog_action.php";
}else{
    $micropost_id=$_GET['micropost_id'];
    $post = get_post_content($db,$micropost_id);
    $blog=$post;
    $action="updateblog_action.php";
}
$smarty->assign('micropost_id', $micropost_id);
$smarty->assign('action', $action);
$smarty->assign('blog', $blog);

$smarty->display('blog_template.tpl');
?>