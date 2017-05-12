<?php

/*place for bd connection*/
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

$month_names_arr = array("1" => "January", 
						"2" => "February", 
						"3" => "March", 
						"4" => "April", 
						"5" => "May", 
						"6" => "June", 
						"7" => "July", 
						"8" => "August",
						"9" => "September", 
						"10" => "October", 
						"11" => "November", 
						"12" => "December");

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
<div class = "calendar">
	<form name = "embedded_calendar_form" action = "" method = "POST">
		<div class = "calendar_table" align = "center">
			<table border = '5'>
				<tr>
					<td colspan = '7' class = 'calendar_year' align = 'center'>
						<?php echo $year?>
					</td>
				</tr>
				<tr>
					<td colspan = '7' class = 'calendar_month' align = 'center'>
						<?php echo $month_names_arr[$month]?>
					</td>
				</tr>
				<tr>
					<td>
						<font>Mon</font>
					</td>
					<td>
						<font>Tue</font>
					</td>
					<td>
						<font>Wed</font>
					</td>
					<td>
						<font>Thu</font>
					</td>
					<td>
						<font>Fri</font>
					</td>
					<td>
						<font>Sat</font>
					</td>
					<td>
						<font>Sun</font>
					</td>
				</tr>
				<tr>
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
						
						//check if date we have $year, $month, $day is current date END
						
						//check if date we have $year, $month, $day is holiday BEGIN
						if($weekday == 5 || $weekday == 6)
						{
							if($cell_type != "today")
							{
								$cell_type = "holiday";
							}
						}
						//check if date we have $year, $month, $day is holiday END
						
						$color = "white";
						if($cell_type == "today")
						{
							$color = "yellow";
						}
						else if($cell_type == "holiday")
						{
							$color = "red";
						}
				?>
					<td bgcolor = '<?= $color?>'>
						<label><?echo $day;?></label>
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
			<input type = "hidden" name = "prev_year" value = <?= $prev_year?>></input>
			<input type = "hidden" name = "next_year" value = <?= $next_year?>></input>
			<input type = "hidden" name = "prev_month" value = <?= $prev_month?>></input>
			<input type = "hidden" name = "next_month" value = <?= $next_month?>></input>
			<input type = "submit" name = "left_button" value = "<"/>
			<input type = "submit" name = "right_button" value = ">"/>
		</div>
	</form>
</div>
