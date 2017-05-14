<?php

/*place for bd connection*/
require_once("/connector.php");
/*$get_all_event_dates_request = "Select date from announcements;";
$get_all_event_dates = $server_connect_pdo->query($get_all_event_dates_request);

//$array_events[];
$row;
while($row = $get_all_event_dates->fetch(PDO::FETCH_ASSOC))
{
	$array_events[] = $row['date'];
}
print_r($row);*/

$year;
$month;
$day = 1;

if(isset($_POST['right_button']))
{
	if(isset($_POST['next_year']))
	{
		$year = $_POST['next_year'];
	}
	else
	{
		$year = date('y');
	}
	
	if(isset($_POST['next_month']))
	{
		$month = $_POST['next_month'];
	}
	else
	{
		$month = date('m');
	}
}
else if (isset($_POST['left_button']))
{
	if(isset($_POST['prev_year']))
	{
		$year = $_POST['prev_year'];
	}
	else
	{
		$year = date('y');
	}
	
	if(isset($_POST['prev_month']))
	{
		$month = $_POST['prev_month'];
	}
	else
	{
		$month = date('m');
	}
}
else
{
	$year = date('y');
	$month = date('m');
}

/*if(isset($_POST['day']))
{
	$day = $_POST['day'];
}
else if(isset($_POST['chosen_day']))
{
	$day = $_POST['chosen_day'];
}
else
{
	$day = date('d');
}*/

//echo $year."-".$month."-".$day;

//month check BEGIN
if($month == 12)
{
	$next_year = $year + 1;
	$next_month = 1;
}
else
{
	$next_year = $year;
	$next_month = $month + 1;
}

if($month == 1)
{
	$prev_year = $year - 1;
	$prev_month = 12;
}
else 
{
	$prev_year = $year;
	$prev_month = $month - 1;
}
//month check END

$month_names_arr = array("1" => "Январь", 
						"2" => "Феварль", 
						"3" => "Март", 
						"4" => "Апрель", 
						"5" => "Май", 
						"6" => "Июнь", 
						"7" => "Июль", 
						"8" => "Август",
						"9" => "Сентябрь", 
						"10" => "Октябрь", 
						"11" => "Ноябрь", 
						"12" => "Декабрь");

$month_start = mktime(0, 0, 0, $month, 1, $year);//first day of current chosen month and year
//echo "<br/>".$month_start;

$days_of_week_names = array('Sunday', 
							'Monday', 
							'Tuesday', 
							'Wednesday', 
							'Thursday', 
							'Friday', 
							'Saturday');
							
$maxdays = date('t', $month_start);
//echo "$maxdays = ".$maxdays;
$date_info = getdate($month_start);
//echo "<br/> date info =".$date_info;
$year = $date_info['year'];
$month = $date_info['mon'];

//echo $year."-".$month;

//1 day length in secounds (24*60*60) = 86400
$getting_prev_month_time = $month_start - 86400;
$prev_month = date ("m", $getting_prev_month_time);
//echo $getting_prev_month_time." = ".$prev_month;
//
?>
<div class = "calendar" style="width:100%;height:100%; background-color:white;padding:1%;">
	<form name = "embedded_calendar_form" action = "" method = "POST" style="width:96%;height:96%;">
		<div class = "calendar_table" align = "center">
			<table>
				<div style = "width:100%; height:1%; background-color:blue; border-radius:20px 20px 0 0;"></div>

				<div style = "border:3px;padding: 2% 0 2% 0; margin-bottom:6%;">
					<p class = 'calendar_month' align = 'left' style="width:70%;margin:0%;float:left;margin-left:2%;">
						<?php echo $month_names_arr[$month]?> </p>
					<label class = 'calendar_year' align = 'right' style="float:right;width:20%;margin-right:1%;">
						<?php echo $year?> </label>
				</div>
				<tr style="padding:0;marign:0; background-color:#909090;">
					<td style="width:14.3%; border:1px solid; background-color:#aaa;color:white;margin:0;padding:0; font:9pt sans-serif">
						<font>Пн</font>
					</td>
					<td style="width:14.3%; border:1px solid; background-color:#aaa;color:white;margin:0;padding:0;font:9pt sans-serif">
						<font>Вт</font>
					</td>
					<td style="width:14.3%; border:1px solid;  background-color:#aaa;color:white;margin:0;padding:0;font:9pt sans-serif">
						<font>Ср</font>
					</td>
					<td style="width:14.3%; border:1px solid;  background-color:#aaa;color:white;margin:0;padding:0;font:9pt sans-serif">
						<font>Чт</font>
					</td>
					<td style="width:14.3%;border:1px solid;  background-color:#aaa;color:white;margin:0;padding:0;font:9pt sans-serif">
						<font>Пт</font>
					</td>
					<td style="width:14.3%; border:1px solid white; background-color:#aaa;color:red;margin:0;padding:0;font:9pt sans-serif">
						<font>Сб</font>
					</td>
					<td style="width:14.3%; border:1px solid white; background-color:#aaa;color:red;margin:0;padding:0;font:9pt sans-serif">
						<font>Вс</font>
					</td>
				</tr>
				<tr >
				<?php
					$cell_type = "";
						   
					$weekday = $date_info['wday'];
					//echo "<br/> weekday = ".$weekday;
					//moving $weekday array to the left because 7-th day of week equal 0, after this manipulation it becomes 6-th, but first element of array becomes at cell number 0
					$weekday = $weekday - 1;
					if($weekday == -1)
					{
						$weekday = 6;
					}
					
					if($weekday > 0)//using for creating line of empty beginning of week
					{
				?>
						<td colspan = <?=$weekday?>></td>
				<?php
					}
					
					//echo "20".date('y')."-".date('m')."-".date('d')."<br/>"; 
					
					while($day <= $maxdays)
					{
						//echo $day."<br/>";
						if($weekday == 7)//if weekday == Saturday then creating new row
						{
				?>
							</tr><tr>
				<?php
							$weekday = 0;
						}
						$linkDate = mktime(0, 0, 0, $month, $day, $year);//linkDate store date as array
						
						/*$test = getdate($linkDate);
						echo "<br/> ".$test['year']."-".$test['mon']."-".$test['mday'];*/
						
						//check if date we have $year, $month, $day is current date BEGIN
						//echo $year."-".$month."-".$day."<br/>";
						if($day < 10 and "0$day" == date('d')) 
						{
							if($month < 10 and "0$month" == date('m'))
							{
								if($year == "20".date('y'))
								{
									$cell_type = "today";
								}
								else
								{
									$cell_type = "casual";
								}
							}
							else if($month >= 10 and "$month" == date('m'))
							{
								if($year == "20".date('y'))
								{
									$cell_type = "today";
								}
								else
								{
									$cell_type = "casual";
								}
							}
							else
							{
								$cell_type = "casual";
							}
						}
						else if ($day >= 10 and "$day" == date('d')) 
						{
							if($month < 10 and "0$month" == date('m'))
							{
								if($year == "20".date('y'))
								{
									$cell_type = "today";
								}
								else
								{
									$cell_type = "casual";
								}
							}
							else if($month >= 10 and "$month" == date('m'))
							{
								if($year == "20".date('y'))
								{
									$cell_type = "today";
								}
								else
								{
									$cell_type = "casual";
								}
							}
							else
							{
								$cell_type = "casual";
							}
						}	
						else
						{
							$cell_type = "casual";
						}
						
						//echo $day."<br/>";
						$get_all_event_dates_request = "";
						if($_SESSION['category'] == "lecturer" || $_SESSION['category'] == "decanat")
						{
							$get_all_event_dates_request = "Select date from announcements;";
							//$get_all_event_dates = $server_connect_pdo->query($get_all_event_dates_request);
						}
						else if($_SESSION['category'] == "student")
						{
							$get_all_event_dates_request = "SELECT advert.date FROM advert where faculty = '".$faculty."'
															UNION
															SELECT announcement.date FROM announcement WHERE faculty = '".$faculty."';";
							//$get_all_event_dates = $server_connect_pdo->query($get_all_event_dates_request);
						}
						$get_all_event_dates = $server_connect_pdo->query($get_all_event_dates_request);
						/*while($row = $get_all_event_dates->fetch(PDO::FETCH_ASSOC))*/
						//for($i = 0; $i< count($row); $i++)
						while($row = $get_all_event_dates->fetch(PDO::FETCH_ASSOC))
						{
							//echo $day."<br/>";
							$month_for_comp;
							$day_for_comp;
							$date_for_comp;
							if($month< 10)
							{
								$month_for_comp = "0".$month;
							}
							else
							{
								 $month_for_comp = $month;
							}
							
							if($day< 10)
							{
								$day_for_comp = "0".$day;
							}
							else
							{
								 $day_for_comp = $day;
							}
							//$date_for_comp = date('y-m-d'); 
							$date_for_comp = $year."-".$month_for_comp."-".$day_for_comp;
							//echo $date_for_comp." = ".$row['date']."<br/>";
							
							//echo $date_for_comp." = ".$row['date']."<br/>";
						
							if($date_for_comp == "".$row['date'])
							{
								//echo "a";
								$cell_type = "event";
							}							
						}
						
						//check if date we have $year, $month, $day is current date END
						
						//check if date we have $year, $month, $day is holiday BEGIN
						if($weekday == 5 || $weekday == 6)
						{
							if(($cell_type != "today")&&($cell_type != "event"))
							{
								$cell_type = "holiday";
							}
						}
						//check if date we have $year, $month, $day is holiday END
						
						$color = "black";
						if($cell_type == "today")
						{
							$color = "blue";
						}
						else if($cell_type == "holiday")
						{
							$color = "gray";
						}
						else if($cell_type == "event")
						{
							$color = "#999900";
						}
				?>
					<td style = "height:30px;">
						<a href = "\assets\php\event_list.php?year=<?=$year?>&month=<?=$month?>&day=<?=$day?>" style="color:<?= $color?>"><?echo $day;?></a>
					</td>	
				<?php
						$day++;
						$weekday++;
						
						
						//$day = $maxdays+1;
					}			
				?>
				</tr>
			</table>
		</div>
		<div class = "calendar_control_panel" align = "center">
	<? //$faculty=$_POST['faculty'];
      //$course=$_POST['course']; 
	//echo  "!!!!".$_POST['faculty']." ".$_POST['course'];?>

      			<input type = "hidden" name = "faculty" value = "<?= $_POST['faculty']?>"></input>
			<input type = "hidden" name = "course" value = <?= $_POST['course']?>></input>

			<input type = "hidden" name = "prev_year" value = <?= $prev_year?> ></input>
			<input type = "hidden" name = "next_year" value = <?= $next_year?>></input>
			<input type = "hidden" name = "prev_month" value = <?= $prev_month?>></input>
			<input type = "hidden" name = "next_month" value = <?= $next_month?>></input>
			<div style="float:left;bottom:1px;width:50%;margin-top:10%;height:10%;">
				<input type = "submit" name = "left_button" value = "<" style="width:100%; color:red; background-color:white;height:100%;"/>
			</div>
			<div style="float:right;bottom:1px;width:50%;margin-top:10%;height:10%;">
				<input type = "submit" name = "right_button" value = ">" style="width:100%; color:red; background-color:white;height:100%;"/>
			</div>
		</div>
	</form>
</div>
