<?
session_start();
header("Location:http://union_schedule/assets/php/announcements.php");
if ($_SESSION['category'] == "lecturer"){

$date = $_POST['anndate'];
$date = date("Y-m-d", strtotime($date));

$lecturer = $_POST['lecturer'];
$class = $_POST['class'];
$faculty = $_POST['faculty'];
$ann = $_POST['ann'];
echo $date." ".$lecturer." ".$class." ".$faculty." ".$ann;
require_once("MyConfig.php");
$stmt =  $pdo->query('INSERT INTO announcement VALUES (NULL,"'.$date.'",'.$lecturer.',"'.$ann.'","'.$class.'","'.$faculty.'")');
}
?>