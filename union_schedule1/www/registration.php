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
        
    <form method="POST" action="exit.php">
    <input type = "submit" value="Выйти" style="float:right;margin-right:1%;"/> 
	</form>
    </div>
    <img src="images/prostr1.jpg" alt="------" width=100% style="margin-top:-1%;"/>

        <div class="foot">
    
        </div>
</div>


<div class="sydebar">
	<?php
		require("\assets\php\calendar.php");
	?>

</div>

<div class="content">
<?If (isset($_SESSION['category'])){
	echo "Вы уже зарегестрированы";	
	
 } 

} else {?>

<fieldset>
	<legend>Регистрация</legend>
	<form action = "reg.php" method = "POST" >



	</form>
</fieldset>

<?
}
?> 


    </div>
</div>
</body>