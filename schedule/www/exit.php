  <? 
   // session_start();
  	echo $_SESSION['login'];

    unset($_SESSION['login']);
    unset($_SESSION['password']);
    unset($_SESSION['category']);    
    session_destroy();

   	echo $_SESSION['login'];

?>

