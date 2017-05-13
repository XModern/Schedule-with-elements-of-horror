<?//ini_set('display_errors','Off');
   	session_start();

    unset($_SESSION['login']);
    unset($_SESSION['password']);
    unset($_SESSION['category']);
    unset($_SESSION['error']);    
    session_destroy();
  	header('Location:http://union_schedule1/');

?>

