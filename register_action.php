<?php
   
    include 'db.php';
    require('C:/XAMPP/php/lib/smarty-4.3.4/libs/Smarty.class.php');
    //require('/usr/share/php/smarty/libs/Smarty.class.php');
    $db=dbconnect($hostname,$db_name,$db_user,$db_passwd);
    $smarty = new Smarty();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    if(empty($name) || empty($email) || empty($password) || empty($confirmPassword)){
        header("Location: register.php?error=0&name=".urlencode($name)."&email=".urlencode($email));
        exit();
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: register.php?error=2&email=$email");
       
        exit();
    }else{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
        
            $query="select email from users where email='$email'";
            
    
            if(!($result = mysqli_query($db, $query)))
                showerror($db);
            $emailverification = mysqli_fetch_assoc($result);

            
            if(!empty($emailverification)){
                header("Location: register.php?error=1&name=".urlencode($name). "&email=".urlencode($email));
                exit();
            }else if($password!=$confirmPassword){
                header("Location: register.php?error=4&name=". urlencode($name) . "&email=". urlencode($email));
                exit();
            }else{
                $password_digest=substr(md5($password), 0, 32);
                $insert="insert into users (name,email,created_at,updated_at,password_digest) values
                ('$name','$email',NOW(),NOW(),'$password_digest')";
                if(!($result = @ mysqli_query($db, $insert)))
                    showerror($db);
                mysqli_close($db);
                header("Location: login.php");
                exit();
            }
        }
    }




    
?>