 <?php 
	$dhost="127.0.0.1";   
	$dname="schedule";          
	$duser="root";           
	$dpass="root"; 
	$charset = 'cp1251';    

    $dsn = "mysql:host=$dhost;dbname=$dname;charset=$charset";

    $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false);
	try {
   		$pdo = new PDO($dsn, $duser, $dpass, $opt);
   	} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
