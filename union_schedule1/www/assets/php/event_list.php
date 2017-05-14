<?
session_start();?>
<html>
<head>
<title>CheckIT</title>
<meta charset="cp-1251">
<link type="text/css" rel="stylesheet" href="styles/styles.css" />

</head>
</body>
<div class="footer" action="exit.php">
   
    <div class="image">
        <img src="images/logo11.png" alt="CHECKIT" width=100%/>
    </div> 

    <div class="panel">
        
    <form method="POST" action="exit.php" style="float:right;margin-right:1%;width:10%;">
    <input type = "submit" name = "reg" value="Выйти" /> 
    </form>
    </div>
    <img src="images/prostr1.jpg" alt="------" width=100% style="margin-top:-1%;"/>

        <div class="navig" style = "float:left;height:10%;"> <a href="index.php"> Главная страница </a> </div>
        <div class="navig" style = "float:right;height:10%;"> <a href="auth.php"> Управление </a> </div>
</div>

<div style="width:94%; margin-left:2%;margin-top:3% ;padding:1%;background-color: rgba(200,200,250,0.5);height:50%;">
		<table border = '1' >
				<tr style="height:10%;">
					<td>
						<font>Дата</font>
					</td>
					<td>
						<font>Предмет</font>
					</td>
					<td>
						<font>Преподаватель</font>
					</td>
					<td>
						<font>Анонс</font>
					</td>
				</tr>
		<?php
			require_once("/connector.php");
			$year = $_GET['year'];
			$month = $_GET['month'];
			$day = $_GET['day'];
			if($month < 10)
			{
				$month = "0".$month;
			}
			
			if($day < 10)
			{
				$day = "0".$day;
			}
			
			$searchDate = $year."-".$month."-".$day;
			
			$all_events_by_this_date_request = "Select * from schedule.announcement where date = '".$searchDate."';";
			$all_events_by_this_date = $server_connect_pdo->query($all_events_by_this_date_request);
			if($all_events_by_this_date!=null)
			{
		?>

		<?php
				while($row = $all_events_by_this_date->fetch(PDO::FETCH_ASSOC))
				{
					//echo $row['event_date']." - ".$row['even']."<br/>";
		?>
					<tr style="height:20px;">
						<td>
							<font><? echo $row['date']?></font>
						</td>
						<td>
							<font><? echo $row['class']?></font>
						</td>
						<td>
		<?php
							$chosen_lecturer_request = "Select fio from schedule.lecturer where id_user = '".$row['lecturer']."';";
							$chosen_lecturer = $server_connect_pdo->query($chosen_lecturer_request);
							while($row_sec = $chosen_lecturer->fetch())
							{
										 $fio = $row_sec['fio'];
								          $i = strripos($fio," ");
								          $patr = substr($fio, $i+1,1);
								          $fio[$i] = "1";
								          $i = strripos($fio," ");
								          $name = substr($fio, $i+1,1);
								          $surname = substr($fio, 0,$i+1);
								          $fio = $surname." ".$name.".".$patr.".";
		?>
							<font><? echo $fio?></font>
		<?php
							}
		?>
						</td>
						<td>
							<font><? echo $row['ann']?></font>
						</td>

					</tr>
		<?php
				}
		?>
			</table>
		<?php
			}
		?>
	</div>
	</body>
</html>