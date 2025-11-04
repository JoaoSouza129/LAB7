<?php

include 'db.php';
include 'model.php';
session_start();
// Connect to database
$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);

// put full path to Smarty.class.php
require('C:/XAMPP/php/lib/smarty-4.3.4/libs/Smarty.class.php');
//require('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $micropostid = $_POST['micropost_id'];
    $content = $_POST['content'];

    $update = "UPDATE microposts SET content=?,updated_at=NOW() WHERE id=? AND user_id=?";
    $stmt = mysqli_prepare($db, $update);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $content,$micropostid,$user_id);

        // Executar a declaração
        $success = mysqli_stmt_execute($stmt);

        // 3. Lógica de Verificação Corrigida
        if ($success ) {
            if(mysqli_stmt_affected_rows($stmt) > 0){
                 // [cite: 31, 33] Enviar mensagem de sucesso para message.php
                $_SESSION['message'] = "SUCCESS: post updated";
               
                header('Location: index.php');
                exit();// O PDF diz index.php [cite: 32]
            }else{
                 // [cite: 31, 33] Enviar mensagem de sucesso para message.php
                $_SESSION['message'] = "ERROR: NOT ALLOWED BOY!!!";
                header('Location: index.php');
                exit();// O PDF diz index.php [cite: 32]
            }
            
        } else {
            // Se a execução falhar
            showerror($db);
        }

        // Fechar a declaração
        mysqli_stmt_close($stmt);
    } else {
        // Se a preparação da query falhar
        showerror($db);
    }

    mysqli_close($db);
} else {
    $_SESSION['message'] = "ERROR: LOGIN BRO";
    unset($_SESSION['message']);
    header('location:index.php');
    exit();
}

?>
