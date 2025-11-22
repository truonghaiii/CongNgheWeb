<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {

   
    $user = $_POST['username'];
    $pass = $_POST['password'];

    
    if($user == 'truongtuanhai' && $pass == '07022005') {

        
        $_SESSION['ten'] = $user;

        
        header('Location: welcome.php');
        exit;

    } else {
        
        header('Location: login.html?error=1');
        exit;
    }

} else {
    
    header('Location: login.html');
    exit;
}
?>
