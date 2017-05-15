<?//ini_set('display_errors','Off');
   	session_start();

    unset($_SESSION['login']);
    unset($_SESSION['password']);
    unset($_SESSION['category']);
    unset($_SESSION['error']);    
    unset($_SESSION['id_user']);     
    session_destroy();
header("Location:http://union_schedule/assets/php/");

?>

