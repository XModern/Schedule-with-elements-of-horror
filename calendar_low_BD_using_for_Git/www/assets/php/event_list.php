<html>
	<head>
	</head>
	<body>
		<a href = "/assets/php/calendar.php">Back to calendar</a>
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
			
			$all_events_by_this_date_request = "Select * from minimized_using_db_calendar_db.calendar where event_date = '".$searchDate."';";
			$all_events_by_this_date = mysqli_query($server_connect, $all_events_by_this_date_request);
			if($all_events_by_this_date!=null)
			{
		?>
			<table border = '1'>
				<tr>
					<td>
						<font>Date</font>
					</td>
					<td>
						<font>Event</font>
					</td>
				</tr>
		<?php
				while($row = mysqli_fetch_assoc($all_events_by_this_date))
				{
					//echo $row['event_date']." - ".$row['even']."<br/>";
		?>
					<tr>
						<td>
							<font><? echo $row['event_date']?></font>
						</td>
						<td>
							<font><? echo $row['even']?></font>
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