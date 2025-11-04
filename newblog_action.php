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

$id=$_SESSION['id'];
$content=$_POST['content'];

if(isset($id)){
    $insert="insert into microposts (content,user_id,created_at,updated_at,likes) values
                (?,?,NOW(),NOW(),0)";
   $stmt = mysqli_prepare($db, $insert);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $content, $id);

        // Executar a declaração
        $success = mysqli_stmt_execute($stmt);

        // 3. Lógica de Verificação Corrigida
        if ($success && mysqli_stmt_affected_rows($stmt) > 0) {
            // [cite: 31, 33] Enviar mensagem de sucesso para message.php
            $_SESSION['message'] = "SUCCESS: New post submitted";
            header('Location: index.php'); 
            exit();
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
}else{
    $_SESSION['message'] = "ERROR: Login first 🥷🏿";
    // Redirecionar para a página de login ou index
    unset($_SESSION['message']);
    header('Location: index.php'); 
    exit();
}

?>