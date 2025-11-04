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
$smarty->assign('message','');

  // get filmes
  

  if(isset($_COOKIE['rememberMe'])){
    $cookie=$_COOKIE['rememberMe'];
    $query  = "SELECT * FROM users WHERE remember_digest='$cookie'";

    if(!($result = @ mysqli_query($db, $query)))
      showerror($db);

    $result_rows  = mysqli_num_rows($result);
    if($result_rows>0){
      $user=mysqli_fetch_assoc($result);
      $_SESSION['id']=$user['id'];
      $_SESSION['username']=$user['name'];
    }


    // opcional: fechar a ligação à base de dados
    //mysqli_close($db);

  }
  $posts = get_posts($db);
  if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $userid=$_SESSION['id'];
  }else{
    $username=null;
    $userid=null;
  }
  if(isset($_SESSION['message'])){
    $message=$_SESSION['message'];
    unset($_SESSION['message']);
  }else{
    $message=null;
  }

  
  // faz a atribui��o das vari�veis do template smarty
  $smarty->assign('posts',$posts);
  $smarty->assign('username',$username);
  $smarty->assign('userid',$userid);
  $smarty->assign('message',$message);
  // Mostra a tabela
  $smarty->display('index_template.tpl');



?>