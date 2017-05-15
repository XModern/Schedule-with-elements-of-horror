<?
session_start();?>
<head>
<title>CheckIT</title>
<meta charset="cp-1251">
<link type="text/css" rel="stylesheet" href="styles/styles.css" />

</head>

<body class="home">
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

<div style="width:94%; margin-left:2%;margin-top:3% ;padding:1%;background-color: rgba(200,200,250,0.5);height:70%;" >

<table border=1>
<tr>
	<td>Дата</td> 
	<td>Преподаватель</td> 
	<td>Предмет</td> 
	<td>Факультет</td> 
	<td>Анонс</td> 
	<td>Редактирование</td> 				

</tr>
<? require_once("MyConfig.php");
$stmt =  $pdo->query('SELECT * FROM announcement WHERE (lecturer="'.$_SESSION['id_user'].'")');

while ($row = $stmt->fetch()){
	?>
	<tr>
	<td> <? echo $row['date'] ?></td>

	<? $stmt1 =  $pdo->query('SELECT * FROM lecturer WHERE (id_user="'.$row['lecturer'].'")');
		while ($row1 = $stmt1->fetch()){
		  $fio = $row1['fio'];
          $i = strripos($fio," ");
          $patr = substr($fio, $i+1,1);
          $fio[$i] = "1";
          $i = strripos($fio," ");
          $name = substr($fio, $i+1,1);
          $surname = substr($fio, 0,$i+1);
          $fio = $surname." ".$name.".".$patr.".";
	
		?> 
		<td> <?echo $fio?></td> <?
		} ?>


	<td><? echo $row['class'] ?></td> 
	<td><? echo $row['faculty'] ?></td> 
	<td><? echo $row['ann'] ?></td> 
	<td>
		<a href = "deleteAnn.php?id=<?echo $row['id_ann']?>"><input type="button" value="Удалить"/></a>

	</td>
	

	</tr>
<? } ?>


</table>

<form method="POST" action="addAnn.php">
	<fieldset>
	<legend>Добавление анонса</legend>
	<input type = "date" name="anndate"/> <br/>
	<input type = "hidden" name="lecturer" value="<?echo $_SESSION['id_user']?>" >
	<label> <?echo $fio ?> </label><br/>
	<select name="class" style="width:20%;">
		<? $stmt2 =  $pdo->query('SELECT name FROM class');
			while ($row2=$stmt2->fetch()){
				?>
		<option value="<?echo $row2['name']?>"><?php echo $row2['name'];?> </option>

		<?	} ?>
	</select><br/>

	<select name="faculty" style="width:20%;">
		<? $stmt2 =  $pdo->query('SELECT name FROM faculty');
			while ($row2=$stmt2->fetch()){
				?>
		<option value="<?echo $row2['name']?>"> <?php echo $row2['name'];?></option>
		<?	} ?>
	</select><br/>
	<label>Анонс</label> <br/>
	<input type = "text" name="ann" style="width:60%;height:30%;"/> <br/>
	<input type="submit" value="Добавить" style="margin:1%;"/>
	</fieldset>
</form>

</div>

<div class="footer" style=" width:100%; height: 10%; background-color: white; margin-top:10%;padding:1% 0 0 0;">
                <label style = "font-size:12pt; margin-left:35%;">© 2017 | </label>
                <a href = "https://vk.com/id70585011">Сидак В. |</a>
                <a href = "https://vk.com/id65914030">Гарная М. |</a> 
                <a href = "https://vk.com/id35156376">Синицын Д. |</a> 
                <a href = "https://vk.com/i140641209">Поричанский В.</a>  
</div>
</body>