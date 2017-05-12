<html>
	<head>
	</head>
	<body>
		<a href = "/assets/php/calendar.php">Back to calendar</a>
		<br/>
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
			echo "Date: ".$searchDate."<br/>";
			
			$all_events_by_this_date_request = "Select * from schedule.announcement where date = '".$searchDate."';";
			$all_events_by_this_date = $server_connect_pdo->query($all_events_by_this_date_request);
			if($all_events_by_this_date!=null)
			{
		?>
			<table border = '1'>
				<tr>
					<td>
						<font>Date</font>
					</td>
					<td>
						<font>Class number</font>
					</td>
					<td>
						<font>Lecturer</font>
					</td>
				</tr>
		<?php
				while($row = $all_events_by_this_date->fetch(PDO::FETCH_ASSOC))
				{
					//echo $row['event_date']." - ".$row['even']."<br/>";
		?>
					<tr>
						<td>
							<font><? echo $row['date']?></font>
						</td>
						<td>
							<font><? echo $row['class_num']?></font>
						</td>
						<td>
		<?php
							$chosen_lecturer_request = "Select fio, department from schedule.lecturer where id_user = '".$row['lecturer']."';";
							$chosen_lecturer = $server_connect_pdo->query($chosen_lecturer_request);
							while($row_sec = $chosen_lecturer->fetch(PDO::FETCH_ASSOC))
							{
		?>
							<font><? echo $row_sec['fio']." (".$row_sec['department'].")"?></font>
		<?php
							}
		?>
						</td>
					</tr>
		<?php
				}
		?>
			</table>
		<?php
			}
		?>
	</body>
</html>