<html>
	<head>
	<title>CheckIT</title>
	<meta charset="cp-1251">
	<link type="text/css" rel="stylesheet" href="styles.css" />
	</head>
	<body>

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

<div style="width:90%; margin:2% 4% 5% 4%;padding:1%;background-color:rgba(200,200,250,0.5);"> 

	<?php
		require_once("/connector.php");

		if(isset($_POST['remove_announsment_button']))
		{
			//echo $_POST['remove_announsment_field'];
			
			echo "Поле под номером \"".$_POST['remove_announsment_field']."\" из таблицы \"announcement\" удалено. <br/>";
			$remove_announsment_request = "Delete from schedule.announcement where id_ann = '".$_POST['remove_announsment_field']."';";
			$server_connect_pdo->query($remove_announsment_request); 
			
			unset($_POST['remove_announsment_button']);
		}
		else if(isset($_POST['remove_advert_button']))
		{
			//echo $_POST['remove_advert_field'];
			
			echo "Поле под номером \"".$_POST['remove_advert_field']."\" из таблицы \"advert\" удалено. <br/>";
			$remove_advert_request = "Delete from schedule.advert where id_ad = '".$_POST['remove_advert_field']."';";
			$server_connect_pdo->query($remove_advert_request);
			
			unset($_POST['remove_advert_button']);			
		}
		else if(isset($_POST['remove_class_button']))
		{
			//echo $_POST['remove_class_field'];
			
			echo "Поле с именем \"".$_POST['remove_class_field']."\" из таблицы \"class\" удалено. <br/>";
			$remove_class_request = "Delete from schedule.class where name = '".$_POST['remove_class_field']."';";
			$server_connect_pdo->query($remove_class_request);

			unset($_POST['remove_class_button']);
		}
		else if(isset($_POST['remove_department_button']))
		{
			//echo $_POST['remove_department_field'];
			
			echo "Поле с именем \"".$_POST['remove_department_field']."\" из таблицы \"department\" удалено. <br/>";
			$remove_department_request = "Delete from schedule.department where department = '".$_POST['remove_department_field']."';";
			$server_connect_pdo->query($remove_department_request);

			unset($_POST['remove_department_button']);
		}
		else if(isset($_POST['remove_faculty_button']))
		{
			//echo $_POST['remove_faculty_field'];
			
			echo "Поле с именем \"".$_POST['remove_faculty_field']."\" из таблицы \"faculty\" удалено. <br/>";
			$remove_faculty_request = "Delete from schedule.faculty where name = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_faculty_request); 
			
			$remove_advert_request = "Delete from schedule.advert where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_advert_request);

			$remove_announcement_request = "Delete from schedule.announcement where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_announcement_request);
			
			$remove_class_request = "Delete from schedule.class where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_class_request);
			
			$remove_department_request = "Delete from schedule.department where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_department_request);
			
			$remove_group_request = "Delete from schedule.group where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_group_request);
			
			$remove_lesson_request = "Delete from schedule.lesson where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_lesson_request);
			
			$remove_speciality_request = "Delete from schedule.speciality where faculty = '".$_POST['remove_faculty_field']."';";
			$server_connect_pdo->query($remove_speciality_request);
			
			unset($_POST['remove_faculty_button']);
		}
		else if(isset($_POST['remove_group_button']))
		{
			//echo $_POST['remove_group_field'];
			
			echo "Поле под номером \"".$_POST['remove_group_field']."\" из таблицы \"group\" удалено. <br/>";
			$remove_group_request = "Delete from schedule.group where id_group = '".$_POST['remove_group_field']."';";
			$server_connect_pdo->query($remove_group_request);

			unset($_POST['remove_group_button']);
		}
		else if(isset($_POST['remove_lecturer_button']))
		{
			//echo $_POST['remove_lecturer_field'];
			
			echo "Поле под номером \"".$_POST['remove_lecturer_field']."\" из таблицы \"lecturer\" удалено. <br/>";
			$remove_lecturer_request = "Delete from schedule.lecturer where id_user = '".$_POST['remove_lecturer_field']."';";
			$server_connect_pdo->query($remove_lecturer_request);

			unset($_POST['remove_lecturer_button']);
		}
		else if(isset($_POST['remove_lesson_button']))
		{
			//echo $_POST['remove_lesson_field'];
			
			echo "Поле под номером \"".$_POST['remove_lesson_field']."\" из таблицы \"lesson\" удалено. <br/>";
			$remove_lesson_request = "Delete from schedule.lesson where id_lesson = '".$_POST['remove_lesson_field']."';";
			$server_connect_pdo->query($remove_lesson_request);
			
			unset($_POST['remove_lesson_button']);
		}
		else if(isset($_POST['remove_speciality_button']))
		{
			//echo $_POST['remove_speciality_field'];
			
			echo "Поле с именем \"".$_POST['remove_speciality_field']."\" из таблицы \"speciality\" удалено. <br/>";
			$remove_speciality_request = "Delete from schedule.speciality where name_spec = '".$_POST['remove_speciality_field']."';";
			$server_connect_pdo->query($remove_speciality_request);
			
			unset($_POST['remove_speciality_button']);
		}
		else if(isset($_POST['remove_user_button']))
		{
			//echo $_POST['remove_user_field'];
			
			echo "Поле с именем \"".$_POST['remove_user_field']."\" из таблицы \"user\" удалено. <br/>";
			$remove_user_request = "Delete from schedule.user where id_user = '".$_POST['remove_user_field']."';";
			$server_connect_pdo->query($remove_user_request);
			
			unset($_POST['remove_user_button']);
		}
		else if(isset($_POST['remove_student_button']))
		{
			echo "Поле с именем \"".$_POST['remove_student_field']."\" из таблицы \"student\" удалено. <br/>";
			$remove_student_request = "Delete from schedule.student where id_user = ".$_POST['remove_student_field'].";";
			$server_connect_pdo->query($remove_student_request);
			
			unset ($_POST['remove_student_button']);
		}
		
		if(isset($_POST['add_new_announcement_button']))
		{
			//echo $_POST['new_record_date'].", ".$_POST['new_record_lector'].", ".$_POST['new_record_announcement'].", ".$_POST['new_record_subject'];
			$add_new_announcement_request = "Insert into schedule.announcement Values(null, '".$_POST['new_announsment_record_date']."', ".$_POST['new_announsment_record_lector'].", '".$_POST['new_announsment_record_announcement']."', '".$_POST['new_announsment_record_subject']."', '".$_POST['choosen_faculty']."');";
			$add_new_announcement = $server_connect_pdo->query($add_new_announcement_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_announcement_button']);
		}
		else if(isset($_POST['add_new_advert_button']))
		{
			$add_new_advert_request = "Insert into schedule.advert Values(null, '".$_POST['new_advert_record_date']."', '".$_POST['new_advert_record_advert']."', '".$_POST['new_advert_record_subject']."', '".$_POST['choosen_faculty']."');";
			$add_new_advert = $server_connect_pdo->query($add_new_advert_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_advert_button']);
		}
		else if(isset($_POST['add_new_class_button']))
		{
			$add_new_class_request = "Insert into schedule.class Values('".$_POST['new_class_record_name']."', '".$_POST['choosen_faculty']."');";
			$add_new_class = $server_connect_pdo->query($add_new_class_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_class_button']);
		}
		else if(isset($_POST['add_new_department_button']))
		{
			$add_new_department_request = "Insert into schedule.department Values('".$_POST['new_department_record_name']."', '".$_POST['choosen_faculty']."');";
			$add_new_department = $server_connect_pdo->query($add_new_department_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_department_button']);
		}
		else if(isset($_POST['add_new_faculty_button']))
		{
			$add_new_faculty_request = "Insert into schedule.faculty Values('".$_POST['new_faculty_record_name']."');";
			$add_new_faculty = $server_connect_pdo->query($add_new_faculty_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_faculty_button']);
		}
		else if(isset($_POST['add_new_group_button']))
		{
			/*echo "<br/>".$_POST['choosen_faculty']." ".$_POST['new_group_record_speciality']." ".$_POST['new_group_record_course']." ".$_POST['new_group_record_name']."<br/>";*/
			
			$add_new_group_request = "Insert into schedule.group Values(null, '".$_POST['choosen_faculty']."', '".$_POST['new_group_record_speciality']."', ".$_POST['new_group_record_course'].", '".$_POST['new_group_record_name']."');";
			$add_new_group = $server_connect_pdo->query($add_new_group_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_group_button']);
		}
		else if(isset($_POST['add_new_speciality_button']))
		{
			$add_new_speciality_request = "Insert into schedule.speciality Values('".$_POST['new_speciality_record_name']."', '".$_POST['choosen_faculty']."');";
			$add_new_speciality = $server_connect_pdo->query($add_new_speciality_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_speciality_button']);
		}
		else if(isset($_POST['add_new_lecturer_button']))
		{
			/*echo $_POST['new_lecturer_record_name']." ".$_POST['new_lecturer_record_degree']." ".$_POST['new_lecturer_record_department'];*/
			
			$add_new_lecturer_request = "Insert into schedule.lecturer Values('".$_POST['new_lecturer_record_name']."', '".$_POST['new_lecturer_record_id']."', '".$_POST['new_lecturer_record_degree']."', '".$_POST['new_lecturer_record_department']."');";
			$add_new_lecturer = $server_connect_pdo->query($add_new_lecturer_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_lecturer_button']);
		}
		else if(isset($_POST['add_new_user_button']))
		{
			$add_new_user_request = "Insert into schedule.user Values(null, '".$_POST['new_user_record_login']."', '".$_POST['new_user_record_password']."', '".$_POST['new_user_record_category']."');";
			$add_new_user = $server_connect_pdo->query($add_new_user_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_user_button']);
		}
		else if(isset($_POST['add_new_lesson_button']))
		{
			/*echo "Insert into schedule.lesson Values(null, '".$_POST['new_lesson_record_day']."', ".$_POST['new_lesson_record_pair_num'].", ".$_POST['new_lesson_record_group'].", '".$_POST['new_lesson_record_subject']."', ".$_POST['new_lesson_record_lector'].", '".$_POST['new_lesson_record_type']."', '".$_POST['new_lesson_record_classroom']."', ".$_POST['new_lesson_record_group_amount'].", ".$_POST['new_lesson_record_parity'].", '".$_POST['choosen_faculty']."');";*/
			
			$add_new_lesson_request = "Insert into schedule.lesson Values(null, '".$_POST['new_lesson_record_day']."', ".$_POST['new_lesson_record_pair_num'].", ".$_POST['new_lesson_record_group'].", '".$_POST['new_lesson_record_subject']."', ".$_POST['new_lesson_record_lector'].", '".$_POST['new_lesson_record_type']."', '".$_POST['new_lesson_record_classroom']."', ".$_POST['new_lesson_record_group_amount'].", ".$_POST['new_lesson_record_parity'].", '".$_POST['choosen_faculty']."');";
			$add_new_lesson = $server_connect_pdo->query($add_new_lesson_request);
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_lesson_button']);
		}
		else if(isset($_POST['add_new_student_button']))
		{
			$add_new_student_request = "Insert into schedule.student Values(".$_POST['new_student_record_id'].", '".$_POST['new_student_record_name']."', ".$_POST['new_student_record_group'].", '".$_POST['choosen_faculty']."');";
			$add_new_student = $server_connect_pdo->query($add_new_student_request);
			
			echo "Новая запись успешно добавлена.<br/>";
			
			unset($_POST['add_new_student_button']);
		}
		
		/*echo $_POST['update_advert_record_date']." , ".$_POST['update_advert_record_advert']." , ".$_POST['update_advert_record_subject']." , ".$_POST['update_advert_record_id'];*/
		
		if(isset($_POST['update_user_button']))
		{
			$update_user_request = "Update schedule.user set login = '".$_POST['update_user_record_login']."', password = '".$_POST['update_user_record_password']."', user_category = '".$_POST['new_user_record_category']."' where id_user = ".$_POST['update_user_record_id'].";";
			
			$server_connect_pdo->query($update_user_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_user_button']);
		}
		else if(isset($_POST['update_faculty_button']))
		{
			//echo $_POST['update_faculty_record_name']." - ".$_POST['update_faculty_record_name_key'];
			$update_faculty_request = "Update schedule.faculty set name = '".$_POST['update_faculty_record_name']."' where name = '".$_POST['update_faculty_record_name_key']."';";
			
			$server_connect_pdo->query($update_faculty_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_faculty_button']);
		}
		else if(isset($_POST['update_announsment_button']))
		{
			//echo $_POST['update_faculty_record_name']." - ".$_POST['update_faculty_record_name_key'];
			$update_announsment_request = "Update schedule.announcement set date = '".$_POST['new_announsment_record_date']."', lecturer = '".$_POST['new_announsment_record_lector']."', ann = '".$_POST['update_announsment_record_announsment']."', class = '".$_POST['update_announsment_record_subject']."' where id_ann = '".$_POST['update_announsment_record_id']."';";
			
			//$update_announsment_request = "Update schedule.announcement set date = '".$_POST['new_announsment_record_date']."';";
			
			$server_connect_pdo->query($update_announsment_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_announsment_button']);
		}
		else if(isset($_POST['update_advert_button']))
		{
			//echo $_POST['update_advert_record_date']." , ".$_POST['update_advert_record_advert']." , ".$_POST['update_advert_record_subject']." , ".$_POST['update_advert_record_id'];
			$update_advert_request = "Update schedule.advert set date = '".$_POST['update_advert_record_date']."', ad = '".$_POST['update_advert_record_advert']."', class = '".$_POST['update_advert_record_subject']."', faculty = '".$_POST['choosen_faculty']."' where id_ad = '".$_POST['update_advert_record_id']."';";
			
			$server_connect_pdo->query($update_advert_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_advert_button']);
		}
		else if(isset($_POST['update_group_button']))
		{
			//echo $_POST['update_advert_record_date']." , ".$_POST['update_advert_record_advert']." , ".$_POST['update_advert_record_subject']." , ".$_POST['update_advert_record_id'];
			$update_group_request = "Update schedule.group set faculty = '".$_POST['choosen_faculty']."', speciality = '".$_POST['update_group_record_speciality']."', course = '".$_POST['update_group_record_course']."', group_name = '".$_POST['update_group_record_name']."' where id_group = '".$_POST['update_group_record_id']."';";
			
			$server_connect_pdo->query($update_group_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_group_button']);
		}
		else if(isset($_POST['update_lecturer_button']))
		{
			/*echo $_POST['update_lecturer_record_name']." , ".$_POST['update_lecturer_record_account']." , ".$_POST['update_lecturer_record_degree']." , ".$_POST['update_lecturer_record_department'];*/
			
			$update_lecturer_request = "Update schedule.lecturer set id_user = '".$_POST['update_lecturer_record_account']."', fio = '".$_POST['update_lecturer_record_name']."', group = '".$_POST['update_lecturer_record_degree']."', faculty = '".$_POST['update_lecturer_record_department']."' where id_user = '".$_POST['update_lecturer_record_id']."';";
			
			$server_connect_pdo->query($update_lecturer_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_lecturer_button']);
		}
		else if(isset($_POST['update_student_button']))
		{
			//echo $_POST['update_student_record_account']." , ".$_POST['update_student_record_name']." , ".$_POST['update_student_record_group']." , ".$_POST['choosen_faculty']." , ".$_POST['update_student_record_id']."<br/>";
			
			$update_student_request = "Update schedule.student set id_user = '".$_POST['update_student_record_account']."', fio = '".$_POST['update_student_record_name']."', student.group = '".$_POST['update_student_record_group']."', faculty = '".$_POST['choosen_faculty']."' where id_user = '".$_POST['update_student_record_id']."';";
			/*$update_student_request = "Update schedule.student set id_user = '".$_POST['update_student_record_account']."', fio = '".$_POST['update_student_record_name']."', student.group = '".$_POST['update_student_record_group']."' where id_user = '".$_POST['update_student_record_id']."';";*/
			
			$server_connect_pdo->query($update_student_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_student_button']);
		}
		else if(isset($_POST['update_lesson_button']))
		{
			/*echo $_POST['update_lesson_record_day']." , ".$_POST['update_lesson_record_pair_num']." , ".$_POST['update_lesson_record_group']." , ".$_POST['update_lesson_record_subject']." , ".$_POST['update_lesson_record_lector']." , ".$_POST['update_lesson_record_type']." , ".$_POST['update_lesson_record_classroom']." , ".$_POST['update_lesson_record_subgroup']." , ".$_POST['update_lesson_record_parity']." , ".$_POST['choosen_faculty']." , ".$_POST['update_lesson_record_id'];*/
			
			
			$update_lesson_request = "Update schedule.lesson set day = '".$_POST['update_lesson_record_day']."', class_num = '".$_POST['update_lesson_record_pair_num']."', lesson.group = '".$_POST['update_lesson_record_group']."', class = '".$_POST['update_lesson_record_subject']."', lecturer = '".$_POST['update_lesson_record_lector']."', type = '".$_POST['update_lesson_record_type']."', classroom = '".$_POST['update_lesson_record_classroom']."', subgroup = '".$_POST['update_lesson_record_subgroup']."', parity = '".$_POST['update_lesson_record_parity']."', faculty = '".$_POST['choosen_faculty']."' where id_lesson = '".$_POST['update_lesson_record_id']."';";
			
			$server_connect_pdo->query($update_lesson_request);
			
			echo "Запись успешно изменена.<br/>";
			
			unset($_POST['update_lesson_button']);
		}

	?>
	
		<?//user_choose_form BEGIN?>
		<div id = "user_choose_div" style = "border: ridge 1px black;">
			<form name = "user_choose_form" action = "" method = "POST">
		<?php
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
							<td align = 'center' colspan = '2'>Функции</td>
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
								<td>
									<?php /*?><form name = "user_admin_change_post" action = "" method = "POST">
										<input type = "hidden" name = "change_user_field" value = "<?= $row['id_user']?>"></input>
										<input type = "submit" name = "change_user_button" value = "Изменить"/>
									</form>	
									<br/>
									<?php */?>
									<?php
									if((isset($_POST['change_user_button']))&&($row['id_user'] == $_POST['change_user_field']))
									{
									?>
										<div class = "update_user_place" style = "border: ridge 1px black;">
											<label>Форма изменения записи:</label>
											<br/>
											<form name = "update_user_form" action = "" method = "POST">
												<input type = "hidden" name = "update_user_record_id" value = "<?= $row['id_user']?>"/>
												
												<div class = "update_user_login_field">
													<label class = "update_user_login_label">Логин:</label>
													<input type = "text" name = "update_user_record_login" value = "<?= $row['login']?>"/>
												</div>
												<div class = "update_user_password_field">
													<label class = "update_user_password_label">Пароль:</label>
													<input type = "text" name = "update_user_record_password" value = "<?= $row['password']?>"/>
												</div>
												<div class = "update_user_category_field">
													<label class = "update_user_category_label">Введите категорию пользователя:</label>
													<select name = "new_user_record_category">
													<?php
														$all_key_vals = array("student", "lecturer", "decanat");
														$all_vals = array("student" => "студент", "lecturer" => "преподаватель", "decanat" => "админ");
													?>
														<option value = "<?= $row['user_category']?>"><?php echo $all_vals[$row['user_category']];?></option>
														<?php
															for($i = 0; $i< count($all_key_vals); $i++)
															{
																if($all_key_vals[$i] != $row['user_category'])
																{
																?>
																<option value = "<?= $all_key_vals[$i]?>"><?php echo $all_vals[$all_key_vals[$i]];?></option>
																<?php
																}
															}
														?>

													</select>
												</div>
												<br/>
												<input type = "submit" name = "update_user_button" value = "Изменить"/>
											</form>
										</div>
									<?php
									}
									else
									{
									?>
										<form name = "user_admin_change_post" action = "" method = "POST">
										<input type = "hidden" name = "change_user_field" value = "<?= $row['id_user']?>"></input>
										<input type = "submit" name = "change_user_button" value = "Открыть форму для изменения"/>
									</form>	
									<?php
									}
									?>
								</td>
							</tr>
		<?php
						}
		?>
					</table>
				</div>
				<br/>
				<div class = "add_new_user_place" style = "border: ridge 1px black;">
					<label>Добавление новой записи:</label>
					<br/>
					<form name = "add_new_user_form" action = "" method = "POST">
						<div class = "new_user_login_field">
							<label class = "new_user_login_label">Логин:</label>
							<input type = "text" name = "new_user_record_login" value = ""/>
						</div>
						<div class = "new_user_password_field">
							<label class = "new_user_password_label">Пароль:</label>
							<input type = "text" name = "new_user_record_password" value = ""/>
						</div>
						<div class = "new_user_category_field">
							<label class = "new_user_category_label">Введите категорию пользователя:</label>
							<select name = "new_user_record_category">
								<option value = "student">студент</option>
								<option value = "lecturer">преподаватель</option>
								<option value = "decanat">админ</option>
							</select>
						</div>
						<br/>
						<input type = "submit" name = "add_new_user_button" value = "Добавить"/>
					</form>
				</div>
			</form>
		</div>
		<?//user_choose_form END?>
		
		<?/*lecturer_choose_form BEGIN?>
		<br/>
		<div id = "lecturer_choose_div" style = "border: ridge 5px black;">
			<form name = "lecturer_choose_form" action = "" method = "POST">
			<?php
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
				<br/>
				<div class = "add_new_lecturer_place" style = "border: ridge 1px black;">
					<label>Добавление новой записи:</label>
					<br/>
					<?php //<form name = "add_new_lecturer_form" action = "" method = "POST"> ?>
					<div class = "new_lecturer_name_field">
						<label class = "new_lecturer_name_label">ФИО:</label>
						<br/>
						<input type = "text" name = "new_lecturer_record_name" value = ""></input>
					</div>
					<div class = "new_lecturer_degree_field">
						<label class = "new_lecturer_degree_label">Ученая степень:</label>
						<br/>
						<input type = "text" name = "new_lecturer_record_degree" value = ""></input>
					</div>
					<div class = "new_lecturer_department_field">
						<label class = "new_lecturer_department_label">Введите кафедру:</label>
						<select name = "new_lecturer_record_department">
							<?php
							$get_all_lecturer_department_request = "Select department from schedule.department where faculty = '".$_POST['choosen_faculty']."';";
							$get_all_lecturer_department = $server_connect_pdo->query($get_all_lecturer_department_request);
							while($row = $get_all_lecturer_department->fetch(PDO::FETCH_ASSOC))
							{
							?>
								<option value = "<?= $row['department']?>"><?php echo $row['department'];?></option>
							<?php
							}
							?>
						</select>
					</div>
					<br/>
					<input type = "submit" name = "add_new_lecturer_button" value = "Добавить"/>
					<?php //</form>?>
				</div>
			</form>
		</div>
		<?lecturer_choose_form END*/?>
		<br/>
		<?//faculty_add_form BEGIN?>
		<div id = "faculty_add_div" style = "border: ridge 1px black;">
			<form name = "faculty_choose_form" action = "" method = "POST">
			<?php
				$db_info_getter_request = "Select * from schedule.faculty;";
				$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
							
			?>
				<div class = "table_content_list">
					<table border = '1'>
						<tr>
							<td align = 'center'>Имя</td>
							<td align = 'center' colspan = '2'>Функции</td>
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
								<td>
									<?php
									if((isset($_POST['change_faculty_button']))&&($row['name'] == $_POST['change_faculty_field']))
									{
									?>
										<div class = "update_user_place" style = "border: ridge 1px black;">
											<label>Форма изменения записи:</label>
											<br/>
											<form name = "update_user_form" action = "" method = "POST">
												<input type = "hidden" name = "update_faculty_record_name_key" value = "<?= $row['name']?>"/>
												
												<div class = "update_faculty_name_field">
													<label class = "update_faculty_name_label">Название:</label>
													<input type = "text" name = "update_faculty_record_name" value = "<?= $row['name']?>"/>
												</div>
												<br/>
												<input type = "submit" name = "update_faculty_button" value = "Изменить"/>
											</form>
										</div>
									<?php
									}
									else
									{
									?>
									<form name = "user_admin_change_post" action = "" method = "POST">
										<input type = "hidden" name = "change_faculty_field" value = "<?= $row['name']?>"></input>
										<input type = "submit" name = "change_faculty_button" value = "Открыть форму для изменения"/>
									</form>	
									<?php
									}
									?>
								</td>
							</tr>
			<?php
						}
			?>
					</table>
				</div>
				<br/>
				<div class = "add_new_faculty_place" style = "border: ridge 1px black;">
					<label>Добавление новой записи:</label>
					<br/>
					<form name = "add_new_faculty_form" action = "" method = "POST">
						<div class = "new_faculty_name_field">
							<label class = "new_faculty_name_label">Название:</label>
							<input type = "text" name = "new_faculty_record_name" value = ""/>
						</div>
						<br/>
						<input type = "submit" name = "add_new_faculty_button" value = "Добавить"/>
					</form>
				</div>					
				<?php
					/*if(isset($_POST['choosen_faculty']))
						{
							$check_if_choosen_faculty_exists_request = "Select count(name) as count from schedule.faculty where name = '".$_POST['choosen_faculty']."';";
							$check_if_choosen_faculty_exists = $server_connect_pdo->query($check_if_choosen_faculty_exists_request);
							$row = $check_if_choosen_faculty_exists->fetch(PDO::FETCH_ASSOC);
							echo "res =".$row['count'];
						}*/
				?>
			</form>
		</div>
		<?//faculty_add_form END?>
		<br/>
		<div id = "admin_panel" style = "border: ridge 1px black;">
			<label>Вы сейчас работаете с факультетом: <?php echo $_POST['choosen_faculty'];?></label>
			<form name = "faculty_change_form" action = "" method = "POST">
				<div class = "faculty_choose_field">
					<label>Выберите факультет для работы: </label>
					<select name = "choosen_faculty">
		<?php
						if(isset($_POST['choosen_faculty']))
						{
							$check_if_choosen_faculty_exists_request = "Select count(name) as count from schedule.faculty where name = '".$_POST['choosen_faculty']."';";
							$check_if_choosen_faculty_exists = $server_connect_pdo->query($check_if_choosen_faculty_exists_request);
							$row = $check_if_choosen_faculty_exists->fetch(PDO::FETCH_ASSOC);
							if($row['count'] > 0)
							{
		?>
								<option value = "<?= $_POST['choosen_faculty']?>"><?php echo $_POST['choosen_faculty'];?></option>
		<?php
						}
							}
						$get_all_faculty_names_request = "Select name from schedule.faculty where name != '".$_POST['choosen_faculty']."';";
						$get_all_faculty_names = $server_connect_pdo->query($get_all_faculty_names_request);
						while($row = $get_all_faculty_names->fetch(PDO::FETCH_ASSOC))
							{
		?>
								<option value = "<?= $row['name']?>"><?php echo $row['name'];?></option>
		<?php
							}
		?>
					</select>
				</div>
				<input type = "submit" name = "faculty_choose_button" value = "Войти в режим редактирования"/>
			</form>

		<br/>
	
	<?php
		//$admin_panel_access_flag = false;
		if((isset($_POST['choosen_faculty']))&&(!isset($_POST['remove_faculty_button'])))
		{
			//$admin_panel_access_flag = true;		
		?>
				<form name = "admin_form" action = "" method = "POST">

						<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
					
					<div id = "list_of_tables">
						<input type = "submit" name = "announsment_admin_page" value = "Панель редактирования таблицы 'announsment'"/>
						<input type = "submit" name = "advert_admin_page" value = "Панель редактирования таблицы 'advert'"/>
						<input type = "submit" name = "class_admin_page" value = "Панель редактирования таблицы 'class'"/>
						<input type = "submit" name = "department_admin_page" value = "Панель редактирования таблицы 'department'"/>
						<input type = "submit" name = "group_admin_page" value = "Панель редактирования таблицы 'group'"/>
						<input type = "submit" name = "lecturer_admin_page" value = "Панель редактирования таблицы 'lecturer'"/>
						<input type = "submit" name = "lesson_admin_page" value = "Панель редактирования таблицы 'lesson'"/>
						<input type = "submit" name = "speciality_admin_page" value = "Панель редактирования таблицы 'speciality'"/>
						<input type = "submit" name = "student_admin_page" value = "Панель редактирования таблицы 'student'"/>
					</div>
		<?php
					//$db_info_getter_request = "Select * from schedule.";
					if(isset($_POST['announsment_admin_page']))
					{
						//$db_info_getter_request += "announcement;";
						$db_info_getter_request = "Select * from schedule.announcement where faculty = '".$_POST['choosen_faculty']."';";
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
									<td align = 'center' colspan = '2'>Функции</td>
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
												<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
												<input type = "hidden" name = "remove_announsment_field" value = "<?= $row['id_ann']?>"></input>
												<input type = "submit" name = "remove_announsment_button" value = "Удалить"/>
											</form>
										</td>
										<td>
										
											<?php
											if((isset($_POST['change_announsment_button']))&&($row['id_ann'] == $_POST['change_announsment_field']))
											{
											?>
												<div class = "update_user_place" style = "border: ridge 1px black;">
													<label>Форма изменения записи:</label>
													<br/>
													<form name = "update_user_form" action = "" method = "POST">
														<?//fields for page state saving BEGIN?>
														<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>				
														<input type = "hidden" name = "announsment_admin_page" value = "<?= $_POST['announsment_admin_page']?>"/>
														<?//fields for page state saving END?>
														
														
														<input type = "hidden" name = "update_announsment_record_id" value = "<?= $row['id_ann']?>"/>
															
														<div class = "new_announsment_date_field">
															<label class = "new_announsment_date_label">Дата:</label>
															<input type = "date" name = "new_announsment_record_date" value = "<?= $row['date']?>"/>
														</div>
														<div class = "new_announsment_lector_field">
															<label class = "new_announsment_lector_label">Преподаватель:</label>
															<select name = "new_announsment_record_lector">
																<?php
																	$selecter_lecturer_request = "Select fio from schedule.lecturer where id_user = '".$row['lecturer']."';";
																	$selecter_lecturer = $server_connect_pdo->query($selecter_lecturer_request);
																	while($secound_row = $selecter_lecturer->fetch(PDO::FETCH_ASSOC))
																	{
																		?>
																			<option value = "<?= $row['lecturer'];?>"><?php echo $secound_row['fio'];?></option>
																		<?php
																		//echo $secound_row['fio']." (".$secound_row['department'].")";
																	}
																	
																	$get_lecturer_list_request = "Select id_user, fio from schedule.lecturer where id_user != '".$row['lecturer']."';";
																	$get_lecturer_list = $server_connect_pdo->query($get_lecturer_list_request);
																	while($secound_row = $get_lecturer_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $secound_row['id_user']?>"><?php echo $secound_row['fio'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<div class = "update_announsment_announsment_field">
															<? //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa : ".$row['ann'];?>
															<label class = "update_announsment_announsment_label">Объявление:</label>
															<textarea name = "update_announsment_record_announsment" value = "<?= $row['ann']?>" cols = "40" rows = "3" style = "resize: none;"><?php echo $row['ann'];?></textarea>
														</div>
														<div class = "update_announsment_subject_field">
															<label class = "update_announsment_subject_label">Предмет:</label>
															<select name = "update_announsment_record_subject">
																<option value = "<?= $row['class']?>"><?php echo $row['class'];?></option>
																<?php
																	$get_subject_list_request = "Select name from schedule.class where (faculty = '".$_POST['choosen_faculty']."') and (name != '".$row['class']."');";
																	$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
																	while($row_fourth = $get_subject_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $row_fourth['name'];?>"><?php echo $row_fourth['name'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<br/>
														<input type = "submit" name = "update_announsment_button" value = "Изменить"/>
													</form>
												</div>
											<?php
											}
											else
											{
											?>
												<form name = "user_admin_change_post" action = "" method = "POST">
													<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
													
													<input type = "hidden" name = "announsment_admin_page" value = "<?= $_POST['announsment_admin_page']?>"/>
													
													<input type = "hidden" name = "change_announsment_field" value = "<?= $row['id_ann']?>"></input>
													<input type = "submit" name = "change_announsment_button" value = "Открыть форму для изменения"/>
												</form>	
												<?php
												}
												?>
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
							
							<?php
							/*<form name = "add_new_announcement_form" action = "" method = "POST">
							
								<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>*/
							?>
							
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
											$get_subject_list_request = "Select name from schedule.class where faculty = '".$_POST['choosen_faculty']."';";
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
							<?php //</form>?>
						</div>
		<?php
					}
					else if(isset($_POST['advert_admin_page']))
					{
						$db_info_getter_request = "Select * from schedule.advert where faculty = '".$_POST['choosen_faculty']."';";
						$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
		?>
						<div class = "table_content_list">
							<table border = '1'>
								<tr>
									<td align = 'center'>Ид</td>
									<td align = 'center'>Дата</td>
									<td align = 'center'>Анонс</td>
									<td align = 'center'>Предмет</td>
									<td align = 'center' colspan = '2'>Функции</td>
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
												<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
												<input type = "hidden" name = "remove_advert_field" value = "<?= $row['id_ad']?>"></input>
												<input type = "submit" name = "remove_advert_button" value = "Удалить"/>
											</form>
										</td>
										<td>							
										<?php
											if((isset($_POST['change_advert_button']))&&($row['id_ad'] == $_POST['change_advert_field']))
											{
										?>
												<div class = "update_user_place" style = "border: ridge 1px black;">
													<label>Форма изменения записи:</label>
													<br/>
													<form name = "update_user_form" action = "" method = "POST">
														<?//fields for page state saving BEGIN?>
														<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>				
														<input type = "hidden" name = "advert_admin_page" value = "<?= $_POST['advert_admin_page']?>"/>
														<?//fields for page state saving END?>
												
												
														<input type = "hidden" name = "update_advert_record_id" value = "<?= $row['id_ad']?>"/>
													
														<div class = "update_advert_date_field">
															<label class = "update_advert_date_label">Дата:</label>
															<input type = "date" name = "update_advert_record_date" value = "<?= $row['date']?>"/>
														</div>
														<div class = "update_announsment_announsment_field">
															<? //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa : ".$row['ann'];?>
															<label class = "update_advert_advert_label">Анонс:</label>
															<textarea name = "update_advert_record_advert" value = "<?= $row['ad']?>" cols = "40" rows = "3" style = "resize: none;"><?php echo $row['ad'];?></textarea>
														</div>
														<div class = "update_advert_subject_field">
															<label class = "update_advert_subject_label">Предмет:</label>
															<select name = "update_advert_record_subject">
																<option value = "<?= $row['class']?>"><?php echo $row['class'];?></option>
																<?php
																$get_subject_list_request = "Select name from schedule.class where (faculty = '".$_POST['choosen_faculty']."') and (name != '".$row['class']."');";
																$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
																while($row_fourth = $get_subject_list->fetch(PDO::FETCH_ASSOC))
																{
																?>
																	<option value = "<?= $row_fourth['name'];?>"><?php echo $row_fourth['name'];?></option>
																<?php
																}
																?>
															</select>
														</div>
														<br/>
														<input type = "submit" name = "update_advert_button" value = "Изменить"/>
													</form>
												</div>
											<?php
											}
											else
											{
											?>
												<form name = "advert_admin_change_post" action = "" method = "POST">
													<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
													
													<input type = "hidden" name = "advert_admin_page" value = "<?= $_POST['advert_admin_page']?>"/>
													
													<input type = "hidden" name = "change_advert_field" value = "<?= $row['id_ad']?>"></input>
													<input type = "submit" name = "change_advert_button" value = "Открыть форму для изменения"/>
												</form>	
												<?php
												}
												?>
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
							<?php //<form name = "add_new_advert_form" action = "" method = "POST"> ?>
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
											$get_subject_list_request = "Select name from schedule.class where faculty = '".$_POST['choosen_faculty']."';";
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
							<?php //</form>?>
						</div>
		<?php
					}
					else if(isset($_POST['class_admin_page']))
					{
						$db_info_getter_request = "Select * from schedule.class where faculty = '".$_POST['choosen_faculty']."';";
						$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
		?>
						<div class = "table_content_list">
							<table border = '1'>
								<tr>
									<td align = 'center'>Название</td>
									<td align = 'center' colspan = '2'>Функции</td>
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
											<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
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
						<br/>
						<div class = "add_new_class_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>
							<?php //<form name = "add_new_class_form" action = "" method = "POST"> ?>
								<div class = "new_class_name_field">
									<label class = "new_class_name_label">Название:</label>
									<input type = "text" name = "new_class_record_name" value = ""/>
								</div>
								<br/>
								<input type = "submit" name = "add_new_class_button" value = "Добавить"/>
							<?php //</form>?>
						</div>
		<?php
					}
					else if(isset($_POST['department_admin_page']))
					{
						$db_info_getter_request = "Select * from schedule.department where faculty = '".$_POST['choosen_faculty']."';";
						$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
		?>
						<div class = "table_content_list">
							<table border = '1'>
								<tr>
									<td align = 'center'>Название</td>
									<td align = 'center' colspan = '2'>Функции</td>
								</tr>
		<?php
								while($row = $db_info_getter->fetch(PDO::FETCH_ASSOC))
								{
		?>
								<tr>
									<td>
										<?php echo $row['department'];?>
									</td>
									<td>
										<form name = "department_admin_remove_post" action = "" method = "POST">
											<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
											<input type = "hidden" name = "remove_department_field" value = "<?= $row['department']?>"></input>
											<input type = "submit" name = "remove_department_button" value = "Удалить"/>
										</form>
									</td>
								</tr>
		<?php
								}
		?>
							</table>
						</div>
						<br/>
						<div class = "add_new_department_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>
							<?php //<form name = "add_new_department_form" action = "" method = "POST"> 					
							?>
								<div class = "new_department_name_field">
									<label class = "new_department_name_label">Название:</label>
									<input type = "text" name = "new_department_record_name" value = ""/>
								</div>
								<br/>
								<input type = "submit" name = "add_new_department_button" value = "Добавить"/>
							<?php //</form>?>
						</div>
		<?php	
					}
					else if(isset($_POST['group_admin_page']))
					{
						$db_info_getter_request = "Select * from schedule.group where faculty = '".$_POST['choosen_faculty']."';";
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
									<td align = 'center' colspan = '2'>Функции</td>
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
												<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
												<input type = "hidden" name = "remove_group_field" value = "<?= $row['id_group']?>"></input>
												<input type = "submit" name = "remove_group_button" value = "Удалить"/>
											</form>
										</td>
										<td>							
										<?php
											if((isset($_POST['change_group_button']))&&($row['id_group'] == $_POST['change_group_field']))
											{
										?>
												<div class = "update_user_place" style = "border: ridge 1px black;">
													<label>Форма изменения записи:</label>
													<br/>
													<form name = "update_user_form" action = "" method = "POST">
														<?//fields for page state saving BEGIN?>
														<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>				
														<input type = "hidden" name = "group_admin_page" value = "<?= $_POST['group_admin_page']?>"/>
														<?//fields for page state saving END?>												
												
														<input type = "hidden" name = "update_group_record_id" value = "<?= $row['id_group']?>"/>
														
														<div class = "update_group_speciality_field">
															<label class = "update_group_speciality_label">Специализация: </label>
															<select name = "update_group_record_speciality">
																<option value = "<?= $row['speciality']?>"><?php echo $row['speciality'];?></option>
																<?php
																	$get_subject_list_request = "Select name_spec from schedule.speciality where (faculty = '".$_POST['choosen_faculty']."') and (name_spec != '".$row['speciality']."');";
																	$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
																	while($row_secound = $get_subject_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $row_secound['name_spec'];?>"><?php echo $row_secound['name_spec'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<div class = "update_group_course_field">
															<label class = "update_group_course_label">Курс: </label>
															<select name = "update_group_record_course">
																<option value = "<?= $row['course']?>"><?php echo $row['course'];?></option>
																<?php
																	$all_vars = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
																	for($i = 0; $i < count($all_vars); $i++)
																	{
																		if($row['course'] != $all_vars[$i])
																		{
																?>
																			<option value = "<?= $all_vars[$i];?>"><?php echo $all_vars[$i];?></option>
																<?php
																		}
																	}
																?>
															</select>
														</div>
														<div class = "update_group_name_field">
															<label class = "update_group_name_label">Группа: </label>
															<input type = "text" name = "update_group_record_name" value = "<?= $row['group_name']?>"/>
														</div>
											
														<br/>
														<input type = "submit" name = "update_group_button" value = "Изменить"/>
													</form>
												</div>
											<?php
											}
											else
											{
											?>
												<form name = "advert_admin_change_post" action = "" method = "POST">
													<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
													
													<input type = "hidden" name = "group_admin_page" value = "<?= $_POST['group_admin_page']?>"/>
													
													<input type = "hidden" name = "change_group_field" value = "<?= $row['id_group']?>"></input>
													<input type = "submit" name = "change_group_button" value = "Открыть форму для изменения"/>
												</form>	
												<?php
												}
												?>
										</td>
									</tr>
		<?php
								}
		?>
							</table>
						</div>
						<br/>
						<div class = "add_new_faculty_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>
							<?php //<form name = "add_new_faculty_form" action = "" method = "POST"> ?>
								<div name = "new_group_speciality_name_field">
									<label>Специальность: </label>
									<select name = "new_group_record_speciality">
										<?php
										$get_all_speciality_names_request = "Select name_spec from schedule.speciality where faculty = '".$_POST['choosen_faculty']."';";
										$get_all_speciality_names = $server_connect_pdo->query($get_all_speciality_names_request);
										while($row = $get_all_speciality_names->fetch(PDO::FETCH_ASSOC))
										{
		?>
											<option value = "<?= $row['name_spec']?>"><?php echo $row['name_spec'];?></option>
		<?php
										}
		?>
									</select>
								</div>
								<div name = "new_group_course_name_field">
									<label>Курс: </label>
									<select name = "new_group_record_course">
		<?php
										for($i = 1; $i < 11; $i++)
										{
		?>
										<option value = "<?= $i?>"><?php echo $i;?></option>
		<?php
										}
		?>
									</select>
								</div>
								<div name = "new_group_name_field">
									<label>Имя группы: </label>
									<input type = "text" name = "new_group_record_name"></input>
								</div>
								<br/>
								<input type = "submit" name = "add_new_group_button" value = "Добавить"/>
							<?php //</form>?>	
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
									<td align = 'center' colspan = '2'>Функции</td>
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
												<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
												<input type = "hidden" name = "remove_lecturer_field" value = "<?= $row['id_user']?>"></input>
												<input type = "submit" name = "remove_lecturer_button" value = "Удалить"/>
											</form>
										</td>
										<td>
										
											<?php
											if((isset($_POST['change_lecturer_button']))&&($row['id_user'] == $_POST['change_lecturer_field']))
											{
											?>
												<div class = "update_user_place" style = "border: ridge 1px black;">
													<label>Форма изменения записи:</label>
													<br/>
													<form name = "update_user_form" action = "" method = "POST">
														<?//fields for page state saving BEGIN?>
														<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>				
														<input type = "hidden" name = "lecturer_admin_page" value = "<?= $_POST['lecturer_admin_page']?>"/>
														<?//fields for page state saving END?>
														
														
														<input type = "hidden" name = "update_lecturer_record_id" value = "<?= $row['id_user']?>"/>
															
														<div class = "update_lecturer_account_field">
															<label class = "update_lecturer_account_label">Имя учетной записи преподавателя:</label>
															<select name = "update_lecturer_record_account">
																<?php
																	$selecter_lecturer_request = "Select id_user, login from schedule.user where id_user = '".$row['id_user']."';";
																	$selecter_lecturer = $server_connect_pdo->query($selecter_lecturer_request);
																	while($secound_row = $selecter_lecturer->fetch(PDO::FETCH_ASSOC))
																	{
																		?>
																			<option value = "<?= $secound_row['id_user'];?>"><?php echo $secound_row['login'];?></option>
																		<?php
																		//echo $secound_row['fio']." (".$secound_row['department'].")";
																	}
																	
																	$get_lecturer_list_request = "Select id_user, login from schedule.user where id_user != '".$row['id_user']."';";
																	$get_lecturer_list = $server_connect_pdo->query($get_lecturer_list_request);
																	while($secound_row = $get_lecturer_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $secound_row['id_user']?>"><?php echo $secound_row['login'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<div class = "update_lecturer_name_field">
															<label class = "update_lecturer_name_label">ФИО:</label>
															<input type = "text" name = "update_lecturer_record_name" value = "<?= $row['fio']?>"></input>
														</div>
														<div class = "update_lecturer_degree_field">
															<? //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa : ".$row['ann'];?>
															<label class = "update_lecturer_degree_label">Ученая степень: </label>
															<input type = "text" name = "update_lecturer_record_degree" value = "<?= $row['degree']?>"/>
														</div>
														<div class = "update_lecturer_department_field">
															<label class = "update_lecturer_department_label">Кафедра:</label>
															<select name = "update_lecturer_record_department">
																<option value = "<?= $row['department']?>"><?php echo $row['department'];?></option>
																<?php
																	$get_subject_list_request = "Select department from schedule.department where (faculty = '".$_POST['choosen_faculty']."') and (department != '".$row['department']."');";
																	$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
																	while($row_fourth = $get_subject_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $row_fourth['department'];?>"><?php echo $row_fourth['department'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<br/>
														<input type = "submit" name = "update_lecturer_button" value = "Изменить"/>
													</form>
												</div>
											<?php
											}
											else
											{
											?>
												<form name = "user_admin_change_post" action = "" method = "POST">
													<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
													
													<input type = "hidden" name = "lecturer_admin_page" value = "<?= $_POST['lecturer_admin_page']?>"/>
													
													<input type = "hidden" name = "change_lecturer_field" value = "<?= $row['id_user']?>"></input>
													<input type = "submit" name = "change_lecturer_button" value = "Открыть форму для изменения"/>
												</form>	
												<?php
												}
												?>
										</td>
									</tr>
		<?php
								}
		?>
							</table>
						</div>
						<br/>
						<div class = "add_new_lecturer_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>
							<?php //<form name = "add_new_lecturer_form" action = "" method = "POST"> ?>
							<div class = "new_lecturer_id_field">
								<label class = "new_lecturer_id_label">Имя учетной записи лектора:</label>
								<br/>
								<select name = "new_lecturer_record_id">
								<?php
									$get_lecturer_user_info_request = "Select id_user, login from schedule.user;";
									$get_lecturer_user_info = $server_connect_pdo->query($get_lecturer_user_info_request);
									while($row = $get_lecturer_user_info->fetch(PDO::FETCH_ASSOC))
									{
								?>
									<option value = "<?= $row["id_user"]?>"><?php echo $row["login"];?></option>
								<?php
									}
								?>
								</select>
							</div>
							<div class = "new_lecturer_name_field">
								<label class = "new_lecturer_name_label">ФИО:</label>
								<br/>
								<input type = "text" name = "new_lecturer_record_name" value = ""></input>
							</div>
							<div class = "new_lecturer_degree_field">
								<label class = "new_lecturer_degree_label">Ученая степень:</label>
								<br/>
								<input type = "text" name = "new_lecturer_record_degree" value = ""></input>
							</div>
							<div class = "new_lecturer_department_field">
								<label class = "update_lecturer_department_label">Введите кафедру:</label>
								<select name = "update_lecturer_record_department">
									<?php
									$get_all_lecturer_department_request = "Select department from schedule.department where faculty = '".$_POST['choosen_faculty']."';";
									$get_all_lecturer_department = $server_connect_pdo->query($get_all_lecturer_department_request);
									while($row = $get_all_lecturer_department->fetch(PDO::FETCH_ASSOC))
									{
		?>
										<option value = "<?= $row['department']?>"><?php echo $row['department'];?></option>
		<?php
									}
		?>
								</select>
							</div>
							<br/>
							<input type = "submit" name = "add_new_lecturer_button" value = "Добавить"/>
					<?php //</form>?>
						</div>
				<?php
					}
					else if(isset($_POST['lesson_admin_page']))
					{
						/*$db_group_name_getter_request = "Select id_group from schedule.group where faculty = '".$_POST['choosen_faculty']."';";
						$db_group_name_getter = $server_connect_pdo->query($db_group_name_getter_request);*/
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
									<td align = 'center' colspan = '2'>Функции</td>
								</tr>
		<?php
								/*while($group_ids = $db_group_name_getter->fetch(PDO::FETCH_ASSOC))
								{*/
									echo "<br/>".$group_ids['id_group']."<br/>";
									
									$db_info_getter_request = "Select * from schedule.lesson Inner Join schedule.group where (schedule.lesson.group =schedule.group.id_group) AND (schedule.group.faculty = '".$_POST['choosen_faculty']."');";
									
									/*
									$db_info_getter_request = "Select * from schedule.lesson;";
									*/
									
									/*
									echo "<br/>".$group_ids['group_name']."<br/>";
									$db_info_getter_request = "Select * from schedule.lesson where group = 'group_name';";
									*/
									
									/*
									echo "<br/>".$group_ids['id_group']."<br/>";
									$db_info_getter_request = "Select * from schedule.lesson where group=1;";
									*/
									
									/*
									$db_info_getter_request = "Select * from schedule.lesson where group = ".$group_ids['id_group'].";";
									*/
									$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
									
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
												$get_group_request = "Select group_name from schedule.group where id_group = '".$row['group']."';";
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
													echo "всегда";
												}
												else if($row['parity'] == 1)
												{
													echo "нечетная";
													//echo $row['Нечетная'];
												}
												else if($row['parity'] == 2)
												{
													echo "четная";
													//echo $row['Четная'];
												}
											?>
										</td>
										<td>
												<form name = "lesson_admin_remove_post" action = "" method = "POST">
													<input type = "hidden" name = "remove_lesson_field" value = "<?= $row['id_lesson']?>"></input>
													<input type = "submit" name = "remove_lesson_button" value = "Удалить"/>
												</form>
										</td>
										<td>										
											<?php
											if((isset($_POST['change_lesson_button']))&&($row['id_lesson'] == $_POST['change_lesson_field']))
											{
											?>
												<div class = "update_user_place" style = "border: ridge 1px black;">
													<label>Форма изменения записи:</label>
													<br/>
													<form name = "update_user_form" action = "" method = "POST">
														<?//fields for page state saving BEGIN?>
														<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>				
														<input type = "hidden" name = "lesson_admin_page" value = "<?= $_POST['lesson_admin_page']?>"/>
														<?//fields for page state saving END?>
														
														
														<input type = "hidden" name = "update_lesson_record_id" value = "<?= $row['id_lesson']?>"/>
														
														<div class = "update_lesson_day_field">
															<label class = "update_lesson_day_label">День недели пары:</label>
															<?php
															$all_vals = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
															?>
															<select name = "update_lesson_record_day">
																<option value = "<?= $row['day']?>"><?php echo $row['day'];?></option>
																<?php
																for($i = 0; $i < count($all_vals); $i++)
																{
																	if($all_vals[$i] != $row['day'])
																	{
																?>
																		<option value = "<?= $all_vals[$i]?>"><?php echo $all_vals[$i];?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>
														<div class = "update_lesson_pair_num_field">
															<label class = "update_lesson_pair_num_label">Номер пары:</label>
															<?php
															$all_vals = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
															?>
															<select name = "update_lesson_record_pair_num">
																<option value = "<?= $row['class_num']?>"><?php echo $row['class_num'];?></option>
																<?php
																for($i = 0; $i < count($all_vals); $i++)
																{
																	if($all_vals[$i] != $row['class_num'])
																	{
																?>
																		<option value = "<?= $all_vals[$i]?>"><?php echo $all_vals[$i];?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>
														<div class = "update_lesson_group_field">
															<label class = "update_lesson_group_label">Группа:</label>
															<select name = "update_lesson_record_group">
																<?php
																
																$get_group_request = "Select group_name from schedule.group where id_group = '".$row['group']."';";
																$get_group = $server_connect_pdo->query($get_group_request);
																while($second_row = $get_group->fetch(PDO::FETCH_ASSOC))
																{
																?>
																	<option value = "<?= $row['group']?>"><?php echo $second_row['group_name'];?></option>
																<?php
																}																
																	$get_lesson_group_list_request = "Select id_group, group_name from schedule.group where (schedule.group.faculty = '".$_POST['choosen_faculty']."') and (schedule.group.id_group != ".$row['group'].");";
																	
																	$get_lesson_group_list = $server_connect_pdo->query($get_lesson_group_list_request);
																	while($row_secound = $get_lesson_group_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																		<option value = "<?= $row_secound['id_group'];?>"><?php echo $row_secound['group_name'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<div class = "update_lesson_subject_field">
															<label class = "update_lesson_subject_label">Предмет:</label>
															<select name = "update_lesson_record_subject">
																<option value = "<?= $row['class']?>"><?php echo $row['class'];?></option>
																<?php
																$get_subject_list_request = "Select name from schedule.class where (faculty = '".$_POST['choosen_faculty']."') and (name != '".$row['class']."');";
																$get_subject_list = $server_connect_pdo->query($get_subject_list_request);
																while($row_fourth = $get_subject_list->fetch(PDO::FETCH_ASSOC))
																{
																?>
																	<option value = "<?= $row_fourth['name'];?>"><?php echo $row_fourth['name'];?></option>
																<?php
																}
																?>
															</select>
														</div>
														<div class = "update_lesson_lector_field">
															<label class = "update_lesson_lector_label">Преподаватель:</label>
															<select name = "update_lesson_record_lector">
																<?php
																	$selecter_lecturer_request = "Select fio from schedule.lecturer where id_user = '".$row['lecturer']."';";
																	$selecter_lecturer = $server_connect_pdo->query($selecter_lecturer_request);
																	while($secound_row = $selecter_lecturer->fetch(PDO::FETCH_ASSOC))
																	{
																		?>
																			<option value = "<?= $row['lecturer'];?>"><?php echo $secound_row['fio'];?></option>
																		<?php
																		//echo $secound_row['fio']." (".$secound_row['department'].")";
																	}
																	
																	$get_lecturer_list_request = "Select id_user, fio from schedule.lecturer where id_user != '".$row['lecturer']."';";
																	$get_lecturer_list = $server_connect_pdo->query($get_lecturer_list_request);
																	while($secound_row = $get_lecturer_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $secound_row['id_user']?>"><?php echo $secound_row['fio'];?></option>
																<?php
																	}
																?>
															</select>
														</div>														
														<div class = "update_lesson_type_num_field">
															<label class = "update_lesson_type_label">Тип пары:</label>
															<?php
																$all_vals = array("лекция", "практика");
															?>
															<select name = "update_lesson_record_type">
																	<option value = <?= $row['type']?>><?php echo $row['type'];?></option>
																	<?php
																	for($i = 0; $i< count($all_vals); $i++)
																	{
																		if($row['type'] != $all_vals[$i])
																		{
																	?>
																			<option value = "<?= $all_vals[$i]?>"><?php echo $all_vals[$i];?></option>
																	<?php
																		}
																	}
																	?>
															</select>
														</div>
														<div class = "update_lesson_classroom_field">
															<label class = "update_lesson_classroom_label">Аудитория: </label>
															<input type = "text" name = "update_lesson_record_classroom" value = "<?= $row['classroom']?>"></input>
														</div>
														<div class = "update_lesson_subgroup_field">
															<label class = "update_lesson_subgroup_label">Кол-во групп на паре: </label>
															<input type = "text" name = "update_lesson_record_subgroup" value = "<?= $row['subgroup']?>"/>
														</div>
														<div class = "update_lesson_parity_field">
															<label class = "update_lesson_parity_label">Четность: </label>
															<?php
															$all_val_keys = array("0", "1", "2");
															$all_vals = array("0" => "Всегда", "1" => "Нечетная", "2" => "Четная",);
															//$row['parity']
															?>
															<select name = "update_lesson_record_parity">
																<option value = "<?= $row['parity']?>"><?php echo $all_vals[$row['parity']];?></option>
																<?php
																for($i = 0; $i < count($all_val_keys); $i++)
																{
																	if($all_vals[$i] != $all_vals[$row['parity']])
																	{
																?>
																	<option value = "<?= $i?>"><?echo $all_vals[$i];?></option>
																<?
																	}		
																}
																?>
															</select>
														</div>
														<br/>
														<input type = "submit" name = "update_lesson_button" value = "Изменить"/>
													</form>
												</div>
											<?php
											}
											else
											{
											?>
												<form name = "user_admin_change_post" action = "" method = "POST">
													<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
													
													<input type = "hidden" name = "lesson_admin_page" value = "<?= $_POST['lesson_admin_page']?>"/>
													
													<input type = "hidden" name = "change_lesson_field" value = "<?= $row['id_lesson']?>"></input>
													<input type = "submit" name = "change_lesson_button" value = "Открыть форму для изменения"/>
												</form>	
												<?php
												}
												?>
										</td>
									</tr>
		<?php
									}
								/*}*/
		?>
							</table>
						</div>
						<br/>
						<div class = "add_new_lesson_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>							
							<div class = "new_lesson_day_field">
								<label class = "new_lesson_day_label">День недели пары:</label>
								<select name = "new_lesson_record_day">
									<option value = "Понедельник">Понедельник</option>
									<option value = "Вторник">Вторник</option>
									<option value = "Среда">Среда</option>
									<option value = "Четверг">Четверг</option>
									<option value = "Пятница">Пятница</option>
									<option value = "Суббота">Суббота</option>
									<option value = "Воскресенье">Воскресенье</option>
								</select>
							</div>
							<div class = "new_lesson_pair_num_field">
								<label class = "new_lesson_pair_num_label">Номер пары:</label>
								<select name = "new_lesson_record_pair_num">
										<option value = "1">1</option>
										<option value = "2">2</option>
										<option value = "3">3</option>
										<option value = "4">4</option>
										<option value = "5">5</option>
										<option value = "6">6</option>
										<option value = "7">7</option>
										<option value = "8">8</option>
										<option value = "9">9</option>
										<option value = "10">10</option>
								</select>
							</div>
							<div class = "new_lesson_group_field">
								<label class = "new_lesson_group_label">Группа:</label>
								<select name = "new_lesson_record_group">
									<?php
										$get_group_list_request = "Select id_group, group_name from schedule.group where schedule.group.faculty = '".$_POST['choosen_faculty']."';";
										
										$get_group_list = $server_connect_pdo->query($get_group_list_request);
										while($row = $get_group_list->fetch(PDO::FETCH_ASSOC))
										{
									?>
										<option value = "<?= $row['id_group'];?>"><?php echo $row['group_name'];?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class = "new_lesson_subject_field">
								<label class = "new_lesson_subject_label">Предмет:</label>
								<select name = "new_lesson_record_subject">
									<?php
										$get_subject_list_request = "Select name from schedule.class where faculty = '".$_POST['choosen_faculty']."';";
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
							<div class = "new_lesson_lector_field">
								<label class = "new_lesson_lector_label">Преподаватель:</label>
								<select name = "new_lesson_record_lector">
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
							<div class = "new_lesson_type_num_field">
								<label class = "new_lesson_type_label">Тип пары:</label>
								<select name = "new_lesson_record_type">
										<option value = "лекция">Лекция</option>
										<option value = "практика">Практика</option>
								</select>
							</div>
							<div class = "new_lesson_classroom_field">
								<label class = "new_lesson_classroom_label">Номер аудитории: </label>
								<input type = "text" name = "new_lesson_record_classroom" value = ""/>
							</div>
							<div class = "new_lesson_group_amount_field">
								<label class = "new_lesson_group_amount_label">Кол-во групп на паре: </label>
								<input type = "text" name = "new_lesson_record_group_amount" value = ""/>
							</div>
							<div class = "new_lesson_parity_field">
								<label class = "new_lesson_parity_label">Четность: </label>
								<select name = "new_lesson_record_parity">
									<option value = "0">Всегда</option>
									<option value = "1">Нечетная</option>
									<option value = "2">Четная</option>
								</select>
							</div>
							<br/>
							<input type = "submit" name = "add_new_lesson_button" value = "Добавить"/>
							<?php //</form>?>
						</div>
		<?php
					}
					else if(isset($_POST['speciality_admin_page']))
					{
						$db_info_getter_request = "Select * from schedule.speciality where faculty = '".$_POST['choosen_faculty']."';";
						$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
		?>
						<div class = "table_content_list">
							<table border = '1'>
								<tr>
									<td align = 'center'>Название специальности</td>
									<td align = 'center'>Факулькутет</td>
									<td align = 'center' colspan = '2'>Функции</td>
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
												<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
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
						<br/>
						<div class = "add_new_speciality_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>
							<?php //<form name = "add_new_speciality_form" action = "" method = "POST"> ?>
								<div class = "new_speciality_name_field">
									<label class = "new_speciality_name_label">Название специальности:</label>
									<input type = "text" name = "new_speciality_record_name" value = ""/>
								</div>
								<br/>
								<input type = "submit" name = "add_new_speciality_button" value = "Добавить"/>
							<?php //</form>?>
						</div>
		<?php
					}
					else if(isset($_POST["student_admin_page"]))
					{
						$db_info_getter_request = "Select * from schedule.student where faculty = '".$_POST['choosen_faculty']."';";
						$db_info_getter = $server_connect_pdo->query($db_info_getter_request);
		?>
						<div class = "table_content_list">
							<table border = '1'>
								<tr>
									<td align = 'center'>Ид</td>
									<td align = 'center'>ФИО</td>
									<td align = 'center'>Группа</td>
									<td align = 'center'>Факулькутет</td>
									<td align = 'center' colspan = '2'>Функции</td>
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
											<?php 
											$get_student_group_request = "Select group_name from schedule.group where id_group = '".$row['group']."';";
											$get_student_group = $server_connect_pdo->query($get_student_group_request);
											while($row_secound = $get_student_group->fetch(PDO::FETCH_ASSOC))
											{
												echo $row_secound['group_name'];
											}
											?>
										</td>
										<td>
											<?php echo $row['faculty'];?>
										</td>
										<td>
											<form name = "student_admin_remove_post" action = "" method = "POST">
												<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
												<input type = "hidden" name = "remove_student_field" value = "<?= $row['id_user']?>"></input>
												<input type = "submit" name = "remove_student_button" value = "Удалить"/>
											</form>
										</td>
										<td>										
											<?php
											if((isset($_POST['change_student_button']))&&($row['id_user'] == $_POST['change_student_field']))
											{
											?>
												<div class = "update_user_place" style = "border: ridge 1px black;">
													<label>Форма изменения записи:</label>
													<br/>
													<form name = "update_user_form" action = "" method = "POST">
														<?//fields for page state saving BEGIN?>
														<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>				
														<input type = "hidden" name = "student_admin_page" value = "<?= $_POST['student_admin_page']?>"/>
														<?//fields for page state saving END?>
														
														
														<input type = "hidden" name = "update_student_record_id" value = "<?= $row['id_user']?>"/>
															
														<div class = "update_student_account_field">
															<label class = "update_student_account_label">Имя учетной записи студента:</label>
															<select name = "update_student_record_account">
																<?php
																	$selecter_student_request = "Select id_user, login from schedule.user where id_user = '".$row['id_user']."';";
																	$selecter_student = $server_connect_pdo->query($selecter_student_request);
																	while($secound_row = $selecter_student->fetch(PDO::FETCH_ASSOC))
																	{
																		?>
																			<option value = "<?= $secound_row['id_user'];?>"><?php echo $secound_row['login'];?></option>
																		<?php
																		//echo $secound_row['fio']." (".$secound_row['department'].")";
																	}
																	
																	$get_student_list_request = "Select id_user, login from schedule.user where id_user != '".$row['id_user']."';";
																	$get_student_list = $server_connect_pdo->query($get_student_list_request);
																	while($secound_row = $get_student_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																	<option value = "<?= $secound_row['id_user']?>"><?php echo $secound_row['login'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<div class = "update_student_name_field">
															<label class = "update_student_name_label">ФИО:</label>
															<input type = "text" name = "update_student_record_name" value = "<?= $row['fio']?>"></input>
														</div>
														<div class = "update_student_group_field">
															<label class = "update_student_group_label">Группа:</label>
															<select name = "update_student_record_group">
																<?php
																
																$get_group_request = "Select group_name from schedule.group where id_group = '".$row['group']."';";
																$get_group = $server_connect_pdo->query($get_group_request);
																while($second_row = $get_group->fetch(PDO::FETCH_ASSOC))
																{
																?>
																	<option value = "<?= $row['group']?>"><?php echo $second_row['group_name'];?></option>
																<?php
																}																
																	$get_student_group_list_request = "Select id_group, group_name from schedule.group where (schedule.group.faculty = '".$_POST['choosen_faculty']."') and (schedule.group.id_group != ".$row['group'].");";
																	
																	$get_student_group_list = $server_connect_pdo->query($get_student_group_list_request);
																	while($row_secound = $get_student_group_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																		<option value = "<?= $row_secound['id_group'];?>"><?php echo $row_secound['group_name'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<?/*?><div class = "update_student_group_field">
															<label class = "update_student_group_label">Группа:</label>
															<select name = "update_student_record_group">
																<?php
																	$get_student_group_list_request = "Select id_group, group_name from schedule.group where schedule.group.faculty = '".$_POST['choosen_faculty']."';";
																	
																	$get_student_group_list = $server_connect_pdo->query($get_student_group_list_request);
																	while($row = $get_student_group_list->fetch(PDO::FETCH_ASSOC))
																	{
																?>
																		<option value = "<?= $row['id_group'];?>"><?php echo $row['group_name'];?></option>
																<?php
																	}
																?>
															</select>
														</div>
														<?*/?>
														<br/>
														<input type = "submit" name = "update_student_button" value = "Изменить"/>
													</form>
												</div>
											<?php
											}
											else
											{
											?>
												<form name = "user_admin_change_post" action = "" method = "POST">
													<input type = "hidden" name = "choosen_faculty" value = "<?= $_POST['choosen_faculty']?>"/>
													
													<input type = "hidden" name = "student_admin_page" value = "<?= $_POST['student_admin_page']?>"/>
													
													<input type = "hidden" name = "change_student_field" value = "<?= $row['id_user']?>"></input>
													<input type = "submit" name = "change_student_button" value = "Открыть форму для изменения"/>
												</form>	
												<?php
												}
												?>
										</td>
									</tr>
		<?php
								}
		?>
							</table>
						</div>
						<br/>
						<div class = "add_new_student_place" style = "border: ridge 1px black;">
							<label>Добавление новой записи:</label>
							<br/>
							<div class = "new_student_id_field">
								<label class = "new_student_id_label">Имя учетной записи студента:</label>
								<select name = "new_student_record_id">
								<?php
									$get_student_user_info_request = "Select id_user, login from schedule.user;";
									$get_student_user_info = $server_connect_pdo->query($get_student_user_info_request);
									while($row = $get_student_user_info->fetch(PDO::FETCH_ASSOC))
									{
								?>
									<option value = "<?= $row["id_user"]?>"><?php echo $row["login"];?></option>
								<?php
									}
								?>
								</select>
							</div>
							<div class = "new_student_name_field">
								<label class = "new_student_name_label">ФИО:</label>
								<input type = "text" name = "new_student_record_name" value = ""/>
							</div>
							<div class = "new_student_group_field">
								<label class = "new_student_group_label">Группа:</label>
								<select name = "new_student_record_group">
									<?php
										$get_student_group_list_request = "Select id_group, group_name from schedule.group where schedule.group.faculty = '".$_POST['choosen_faculty']."';";
										
										$get_student_group_list = $server_connect_pdo->query($get_student_group_list_request);
										while($row = $get_student_group_list->fetch(PDO::FETCH_ASSOC))
										{
									?>
											<option value = "<?= $row['id_group'];?>"><?php echo $row['group_name'];?></option>
									<?php
										}
									?>
								</select>
							</div>
							<br/>
							<input type = "submit" name = "add_new_student_button" value = "Добавить"/>
						</div>						
		<?php
					}
		?>
				</form>
		<?php
		}
		?>
		</div>

	</div>	

	<div class="footer" style=" width:100%; height: 10%; background-color: white; margin-top:10%;padding:1% 0 0 0;">
                <label style = "font-size:12pt; margin-left:35%;">© 2017 | </label>
                <a href = "https://vk.com/id70585011">Сидак В. |</a>
                <a href = "https://vk.com/id65914030">Гарная М. |</a> 
                <a href = "https://vk.com/id35156376">Синицын Д. |</a> 
                <a href = "https://vk.com/i140641209">Поричанский В.</a>  
	</div>
	</body>
</html>