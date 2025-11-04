<?php
include 'db.php';
require('C:/XAMPP/php/lib/smarty-4.3.4/libs/Smarty.class.php');
//require('/usr/share/php/smarty/libs/Smarty.class.php');
$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);
session_start();
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$email = $_POST['email'];
$password = $_POST['password'];


$password_hashed = substr(md5($password), 0, 32);

if (empty($email) || empty($password)) {
    $_SESSION['message'] = "Todos os campos devem ser preenchidos";
    header("location: login.php");

    exit();
}

$query  = "SELECT * FROM users where email='$email'and password_digest='$password_hashed'";

if (!($result = @mysqli_query($db, $query)))
    showerror($db);




$result_rows  = mysqli_num_rows($result);
if ($result_rows == 0) {
    $_SESSION['message'] = "Email ou password incorretos";
    header("location: login.php");
} else {


    $user = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['username'] = $user['name'];
    if (isset($_POST['rememberME'])) {
        $token=substr(md5(time()), 0, 32);
        setcookie("rememberMe",$token , time() + (3600 * 24 * 30));
        $update  = "UPDATE users SET remember_digest=? where id=?";
        $stmt = mysqli_prepare($db, $update);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si",$token, $_SESSION['id']);

            // Executar a declaração
            $success = mysqli_stmt_execute($stmt);

            
            // Fechar a declaração
            mysqli_stmt_close($stmt);
        } else {
            // Se a preparação da query falhar
            showerror($db);
        }
    } else {
    }
    unset($_SESSION['message']);
    header("location: message.php");
}

// opcional: fechar a ligação à base de dados
mysqli_close($db);
