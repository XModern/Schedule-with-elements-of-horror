<html>
	<head>
	
	</head>
	<body>
	<?php
		require_once("/connector.php");
		if(isset($_POST['remove_announsment_button']))
		{
			//echo $_POST['remove_announsment_field'];
			
			echo "Поле под номером \"".$_POST['remove_announsment_field']."\" из таблицы \"announcement\" удалено. <br/>";
			$remove_announsment_request = "Delete from schedule.announcement where id_ann = '".$_POST['remove_announsment_field']."';";
			$server_connect_pdo->query($remove_announsment_request); 
		}
		else if(isset($_POST['remove_advert_button']))
		{
			//echo $_POST['remove_advert_field'];
			
			echo "Поле под номером \"".$_POST['remove_advert_field']."\" из таблицы \"advert\" удалено. <br/>";
			$remove_advert_request = "Delete from schedule.advert where id_ad = '".$_POST['remove_advert_field']."';";
			$server_connect_pdo->query($remove_advert_request); 
		}
		else if(isset($_POST['remove_class_button']))
		{
			//echo $_POST['remove_class_field'];
			
			echo "Поле с именем \"".$_POST['remove_class_field']."\" из таблицы \"class\" удалено. <br/>";
			$remove_class_request = "Delete from schedule.class where name = '".$_POST['remove_class_field']."';";
			$server_connect_pdo->query($remove_class_request); 
		}
		else if(isset($_POST['remove_faculty_button']))
		{
			//echo $_POST['remove_faculty_field'];
			
			echo "Поле с именем \"".$_POST['remove_faculty_field']."\" из таблицы \"faculty\" удалено. <br/>";
			$remove_faculty_request = "Delete from schedule.faculty where name = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_faculty_request); 
		}
		else if(isset($_POST['remove_group_button']))
		{
			//echo $_POST['remove_group_field'];
			
			echo "Поле под номером \"".$_POST['remove_group_field']."\" из таблицы \"group\" удалено. <br/>";
			$remove_group_request = "Delete from schedule.group where id_group = '".$_POST['remove_group_field']."';";
			$server_connect_pdo->query($remove_group_request); 
		}
		else if(isset($_POST['remove_lecturer_button']))
		{
			//echo $_POST['remove_lecturer_field'];
			
			echo "Поле под номером \"".$_POST['remove_lecturer_field']."\" из таблицы \"lecturer\" удалено. <br/>";
			$remove_lecturer_request = "Delete from schedule.lecturer where id_user = '".$_POST['remove_lecturer_field']."';";
			$server_connect_pdo->query($remove_lecturer_request); 
		}
		else if(isset($_POST['remove_lesson_button']))
		{
			//echo $_POST['remove_lesson_field'];
			
			echo "Поле под номером \"".$_POST['remove_lesson_field']."\" из таблицы \"lesson\" удалено. <br/>";
			$remove_lesson_request = "Delete from schedule.lesson where id_lesson = '".$_POST['remove_lesson_field']."';";
			$server_connect_pdo->query($remove_lesson_request);
		}
		else if(isset($_POST['remove_speciality_button']))
		{
			//echo $_POST['remove_speciality_field'];
			
			echo "Поле с именем \"".$_POST['remove_speciality_field']."\" из таблицы \"speciality\" удалено. <br/>";
			$remove_speciality_request = "Delete from schedule.speciality where name_spec = '".$_POST['remove_speciality_field']."';";
			$server_connect_pdo->query($remove_speciality_request);
		}
		else if(isset($_POST['remove_user_button']))
		{
			//echo $_POST['remove_user_field'];
			
			echo "Поле с именем \"".$_POST['remove_user_field']."\" из таблицы \"user\" удалено. <br/>";
			$remove_user_request = "Delete from schedule.user where id_user = '".$_POST['remove_user_field']."';";
			$server_connect_pdo->query($remove_user_request);
		}
		
		if(isset($_POST['add_new_announcement_button']))
		{
			//echo $_POST['new_record_date'].", ".$_POST['new_record_lector'].", ".$_POST['new_record_announcement'].", ".$_POST['new_record_subject'];
			$add_new_announcement_request = "Insert into schedule.announcement Values(null, '".$_POST['new_announsment_record_date']."', ".$_POST['new_announsment_record_lector'].", '".$_POST['new_announsment_record_announcement']."', '".$_POST['new_announsment_record_subject']."');";
			$add_new_announcement = $server_connect_pdo->query($add_new_announcement_request);
			echo "Новая запись успешно добавлена.<br/>";
		}
		else if(isset($_POST['add_new_advert_button']))
		{
			$add_new_advert_request = "Insert into schedule.advert Values(null, '".$_POST['new_advert_record_date']."', '".$_POST['new_advert_record_advert']."', '".$_POST['new_advert_record_subject']."');";
			$add_new_advert = $server_connect_pdo->query($add_new_advert_request);
			echo "Новая запись успешно добавлена.<br/>";
		}
		
	?>
		<div id = "admin_panel">
			<form name = "admin_form" action = "" method = "POST">
				<div id = "list_of_tables">
					<input type = "submit" name = "announsment_admin_page" value = "Announsment admin page"/>
					<input type = "submit" name = "advert_admin_page" value = "Advert admin page"/>
					<input type = "submit" name = "class_admin_page" value = "Class admin page"/>
					<input type = "submit" name = "faculty_admin_page" value = "Faculty admin page"/>
					<input type = "submit" name = "group_admin_page" value = "Group admin page"/>
					<input type = "submit" name = "lecturer_admin_page" value = "Lecturer admin page"/>
					<input type = "submit" name = "lesson_admin_page" value = "Lesson admin page"/>
					<input type = "submit" name = "speciality_admin_page" value = "Speciality admin page"/>
					<input type = "submit" name = "user_admin_page" value = "User admin page"/>
				</div>
	<?php
				//$db_info_getter_request = "Select * from schedule.";
				if(isset($_POST['announsment_admin_page']))
				{
					//$db_info_getter_request += "announcement;";
					$db_info_getter_request = "Select * from schedule.announcement;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Ид</td>
								<td align = 'center'>Дата</td>
								<td align = 'center'>Лектор</td>
								<td align = 'center'>Объявление</td>
								<td align = 'center'>Предмет</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?echo $row['id_ann'];?>
									</td>
									<td>
										<?echo $row['date'];?>
									</td>
									<td>
										<?
											$selecter_lecturer_request = "Select fio, department from schedule.lecturer where id_user = '".$row['lecturer']."';";
											$selecter_lecturer = $server_connect_pdo->query($selecter_lecturer_request);
											while($secound_row = $selecter_lecturer->fetch(PDO::FETCH_ASSOC))
											{
												echo $secound_row['fio']." (".$secound_row['department'].")";
											}
										?>
									</td>
									<td>
										<?echo $row['ann'];?>
									</td>
									<td>
										<?echo $row['class'];?>
									</td>
									<td>
										<form name = "announsment_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_announsment_field" value = "<?= $row['id_ann']?>"></input>
											<input type = "submit" name = "remove_announsment_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
					<br/>
					<div class = "add_new_announsment_place" style = "border: ridge 1px black;">
						<label>Добавление новой записи:</label>
						<br/>
						<form name = "add_new_announcement_form" action = "" method = "POST">
							<div class = "new_announsment_date_field">
								<label class = "new_announsment_date_label">Дата:</label>
								<input type = "date" name = "new_announsment_record_date" value = ""/>
							</div>
							<div class = "new_announsment_lector_field">
								<label class = "new_announsment_lector_label">Лектор:</label>
								<select name = "new_announsment_record_lector">
									<?php
										$get_lecturer_list_request = "Select id_user, fio from schedule.lecturer;";
										$get_lecturer_list = $server_connect_pdo->query($get_lecturer_list_request);
										while($row = $get_lecturer_list->fetch(PDO::FETCH_ASSOC))
										{
									?>
										<option value = "<?= $row['id_user'];?>"><?php echo $row['fio'];?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class = "new_announsment_announcement_field">
								<label class = "new_announsment_announcement_label">Объявление:</label>
								<br/>
								<textarea name = "new_announsment_record_announcement" cols = "40" rows = "3" style = "resize: none;"></textarea>
							</div>
							<div class = "new_announsment_subject_field">
								<label class = "new_announsment_subject_label">Предмет:</label>
								<select name = "new_announsment_record_subject">
									<?php
										$get_subject_list_request = "Select name from schedule.class;";
										$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
										while($row = $get_subject_list->fetch(PDO::FETCH_ASSOC))
										{
									?>
										<option value = "<?= $row['name'];?>"><?php echo $row['name'];?></option>
									<?php
										}
									?>
								</select>
							</div>
							<br/>
							<input type = "submit" name = "add_new_announcement_button" value = "Добавить"/>
						</form>
					</div>
	<?php
				}
				else if(isset($_POST['advert_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.advert;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Ид</td>
								<td align = 'center'>Дата</td>
								<td align = 'center'>Анонс</td>
								<td align = 'center'>Предмет</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?echo $row['id_ad'];?>
									</td>
									<td>
										<?echo $row['date'];?>
									</td>
									<td>
										<?echo $row['ad'];?>
									</td>
									<td>
										<?echo $row['class'];?>
									</td>
									<td>
										<form name = "advert_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_advert_field" value = "<?= $row['id_ad']?>"></input>
											<input type = "submit" name = "remove_advert_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
					<br/>
					<div class = "add_new_advert_place" style = "border: ridge 1px black;">
						<label>Добавление новой записи:</label>
						<br/>
						<form name = "add_new_advert_form" action = "" method = "POST">
							<div class = "new_advert_date_field">
								<label class = "new_advert_date_label">Дата:</label>
								<input type = "date" name = "new_advert_record_date" value = ""/>
							</div>
							<div class = "new_advert_advert_field">
								<label class = "new_advert_advert_label">Анонс:</label>
								<br/>
								<textarea name = "new_advert_record_advert" cols = "40" rows = "3" style = "resize: none;"></textarea>
							</div>
							<div class = "new_advert_subject_field">
								<label class = "new_advert_subject_label">Предмет:</label>
								<select name = "new_advert_record_subject">
									<?php
										$get_subject_list_request = "Select name from schedule.class;";
										$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
										while($row = $get_subject_list->fetch(PDO::FETCH_ASSOC))
										{
									?>
										<option value = "<?= $row['name'];?>"><?php echo $row['name'];?></option>
									<?php
										}
									?>
								</select>
							</div>
							<br/>
							<input type = "submit" name = "add_new_advert_button" value = "Добавить"/>
						</form>
					</div>
	<?php
				}
				else if(isset($_POST['class_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.class;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Имя</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
							<tr>
								<td>
									<?php echo $row['name'];?>
								</td>
								<td>
									<form name = "class_admin_remove_post" action = "" method = "POST">
										<input type = "hidden" name = "remove_class_field" value = "<?= $row['name']?>"></input>
										<input type = "submit" name = "remove_class_button" value = "Удалить"/>
									</form>
								</td>
							</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
				}
				else if(isset($_POST['faculty_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.faculty;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
					
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Имя</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?php echo $row['name'];?>
									</td>
									<td>
										<form name = "faculty_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_faculty_field" value = "<?= $row['name']?>"></input>
											<input type = "submit" name = "remove_faculty_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
					
				}
				else if(isset($_POST['group_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.group;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Ид</td>
								<td align = 'center'>Факультет</td>
								<td align = 'center'>Специальность</td>
								<td align = 'center'>Курс</td>
								<td align = 'center'>Имя группы</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?php echo $row['id_group'];?>
									</td>
									<td>
										<?php echo $row['faculty'];?>
									</td>
									<td>
										<?php echo $row['speciality'];?>
									</td>
									<td>
										<?php echo $row['course'];?>
									</td>
									<td>
										<?php echo $row['group_name'];?>
									</td>
									<td>
										<form name = "group_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_group_field" value = "<?= $row['id_group']?>"></input>
											<input type = "submit" name = "remove_group_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
				}
				else if(isset($_POST['lecturer_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.lecturer;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Ид</td>
								<td align = 'center'>ФИО</td>
								<td align = 'center'>Уч. степень</td>
								<td align = 'center'>Кафедра</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?php echo $row['id_user'];?>
									</td>
									<td>
										<?php echo $row['fio'];?>
									</td>
									<td>
										<?php echo $row['degree'];?>
									</td>
									<td>
										<?php echo $row['department'];?>
									</td>
									<td>
										<form name = "lecturer_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_lecturer_field" value = "<?= $row['id_user']?>"></input>
											<input type = "submit" name = "remove_lecturer_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
					
				}
				else if(isset($_POST['lesson_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.lesson;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = "center">Ид</td>
								<td align = "center">День недели</td>
								<td align = "center">Номер пары</td>
								<td align = "center">Группа</td>
								<td align = "center">Предмет</td>
								<td align = "center">Преподаватель</td>
								<td align = "center">Тип занятия</td>
								<td align = "center">Аудитория</td>
								<td align = "center">Кол-во групп на паре</td>
								<td align = "center">Четность</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
							<tr>
								<td>
									<?php echo $row['id_lesson'];?>
								</td>
								<td>
									<?php echo $row['day'];?>
								</td>
								<td>
									<?php echo $row['class_num'];?>
								</td>
								<td>
									<?php 
										$get_group_request = "Select group_name from schedule.group where id_group = '".$row['id_lesson']."';";
										$get_group = $server_connect_pdo->query($get_group_request);
										while($second_row = $get_group->fetch(PDO::FETCH_ASSOC))
										{
											echo $second_row['group_name'];
										}
									?>
								</td>
								<td>
									<?php echo $row['class'];?>
								</td>
								<td>
									<?php 
										$get_lecturer_request = "Select fio from schedule.lecturer where id_user = '".$row['lecturer']."';";
										$get_lecturer = $server_connect_pdo->query($get_lecturer_request);
										while($second_row = $get_lecturer->fetch(PDO::FETCH_ASSOC))
										{
											echo $second_row['fio'];
										}
									?>
								</td>
								<td>
									<?php echo $row['type'];?>
								</td>
								<td>
									<?php echo $row['classroom'];?>
								</td>
								<td>
									<?php 
										echo $row['subgroup'];
										/*if($row['subgroup'] == 2)
										{
											echo "Полная группа";
										}
										else
										{
											echo $row['subgroup'];
										}*/
									?>
								</td>
								<td>
									<?php 
										if($row['parity'] == 0)
										{
											echo "Всегда";
										}
										else if($row['parity'] == 1)
										{
											echo $row['Нечетная'];
										}
										else if($row['parity'] == 2)
										{
											echo $row['Четная'];
										}
									?>
								</td>
								<td>
										<form name = "lesson_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_lesson_field" value = "<?= $row['id_lesson']?>"></input>
											<input type = "submit" name = "remove_lesson_button" value = "Удалить"/>
										</form>
								</td>
							</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
				}
				else if(isset($_POST['speciality_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.speciality;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = 'center'>Название специальности</td>
								<td align = 'center'>Факулькутет</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?php echo $row['name_spec'];?>
									</td>
									<td>
										<?php echo $row['faculty'];?>
									</td>
									<td>
										<form name = "speciality_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_speciality_field" value = "<?= $row['name_spec']?>"></input>
											<input type = "submit" name = "remove_speciality_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
				}				
				else if(isset($_POST['user_admin_page']))
				{
					$db_info_getter_request = "Select * from schedule.user;";
					$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
	?>
					<div class = "table_content_list">
						<table border = '1'>
							<tr>
								<td align = "center">Ид</td>
								<td align = "center">Логин</td>
								<td align = "center">Пароль</td>
								<td align = "center">Категория пользователя</td>
								<td align = 'center'>Функции</td>
							</tr>
	<?php
							while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
							{
	?>
								<tr>
									<td>
										<?php echo $row['id_user'];?>
									</td>
									<td>
										<?php echo $row['login'];?>
									</td>
									<td>
										<?php echo $row['password'];?>
									</td>
									<td>
										<?php echo $row['user_category'];?>
									</td>
									<td>
										<form name = "user_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "remove_user_field" value = "<?= $row['id_user']?>"></input>
											<input type = "submit" name = "remove_user_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
	<?php
							}
	?>
						</table>
					</div>
	<?php
				}
	?>
			</form>
		</div>
	</body>
</html>