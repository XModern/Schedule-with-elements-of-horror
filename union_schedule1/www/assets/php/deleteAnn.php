<?
session_start();
header("Location:http://union_schedule/assets/php/announcements.php");
if ($_SESSION['user_category'] == "lecturer"){
$id = $_GET['id'];
echo $id;
require_once("MyConfig.php");
$stmt =  $pdo->query('DELETE FROM announcement WHERE (id_ann="'.$id.'")');
}

?>
