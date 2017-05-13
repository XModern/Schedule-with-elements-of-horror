<?
session_start();?>
<head>
<title>CheckIT</title>
<meta charset="cp-1251">
<link type="text/css" rel="stylesheet" href="styles/styles.css" />

</head>
<body class="home">

<?// If (isset($_SESSION['category'])){?>


<?// } ?>


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


<div class="sydebar">
	<?php
		require("\assets\php\calendar.php");
	?>

</div>

<div class="content">




<? require_once('MyConfig.php');
 
 if(!isset($_SESSION['login'])){
	$login=$_POST['login'];
	 $pass=$_POST['password'];
} else {
	$login=$_SESSION['login'];
 	$pass=$_SESSION['password'];
}

 $stmt = $pdo->query('SELECT * FROM user WHERE (login="'.$login.'" and password="'.$pass.'")');

 if ($stmt->rowCount() != 0){
 	 while ($row = $stmt->fetch()){

		 $_SESSION['login'] = $login;
		 $_SESSION['password'] = $pass;
		 $_SESSION['category'] = $row['user_category'];
		 //echo $_SESSION['login'];

		 if ($row['user_category'] == "lecturer" || $row['user_category'] == "decanat" ){
		 	
		 	?> <label> Вы авторизовались как <? if ($row['user_category'] == "lecturer"){echo "преподаватель" ;}

		 			else {echo "деканат";}   ?></label> <br/>

		 		<form action = "lessonView.php" method = "POST" style="margin:1%;">
		 			<fieldset>
		 			<legend>Просмотр расписания</legend>
					<select name = "faculty">
						<?php 
						$stmt = $pdo->query('SELECT * FROM faculty');
						
						while ($row = $stmt->fetch())
						{
								?>
								<option value="<?php echo $row['name'] ?>"><?php echo $row['name']?></option>

							<?php 
						}

						?>
			
					</select>

					<select name = "course">
						<?php 
						$i = 1;
						while ($i < 7)
						{
								?>
								<option value="<?php echo $i ?>"><?php echo $i?></option>

							<?php 
							$i++;
						}

						?>
			
					</select>

					<input type = "submit" value="Просмотреть расписания"/><br/>
					</fieldset>
		 		</form>
		 		
		 		<fieldset style="margin:1%;">
		 			<legend>Управление</legend>

		 			<? if ($_SESSION['category'] == "decanat"){ ?>
		 		<a href = "\assets\php\admin_page.php">Страница администрирования</a><br/>  
		 		<? } else {
		 			if ($_SESSION['category'] == "lecturer"){?>
		 				<a href = "">Анонсы</a><br/>  
		 			<?}
		 		}?>
		 		</fieldset> <?
		 	
		 } else {
		 if($row['user_category'] == "student"){
		 		 
		 	 $stmt1 = $pdo->query('SELECT * FROM student WHERE (id_user="'.$row['id_user'].'")');
		 	 if ($stmt->rowCount() == 0){
		 	 while ($row1 = $stmt1->fetch()){
		 	 		
		 		 $_SESSION['group']=$row1['group'];
		 		 $_SESSION['user_category'] = "student";
		 		 //echo $_SESSION['group'];

		 		 //echo $_SESSION['group'];
		 		 ?> <label> Вы авторизовались как студент</label> <br/>
		 		 <a href="lessonView.php">Просмотр расписания</a><br/>
		 		 <?
		 		} 
		 	} else {
		 		echo "Вы не подключены к курсу. Обратитесь в деканат.";
		 	}
		 }
		}

 	}
} else {echo  "Неверно введены данные.";}
?> 


    </div>
</div>
</body>