<?session_start();
header("Location:http://union_schedule/assets/php/registration.php");
$login=$_POST['login'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];


if($pass != $repass){
	$_SESSION['error'] = 1;
} else {
require_once('MyConfig.php');
$stmt = $pdo->query('SELECT * FROM user WHERE (login="'.$login.'")');
if ($stmt->rowCount() == 0){
	$stmt1 = $pdo->query('INSERT INTO user VALUES (NULL,"'.$login.'","'.$pass.'","student")');
	$_SESSION['error'] = 4;
	exit;
} else {
		$_SESSION['error'] = 2;
		exit;
}
}
?>
