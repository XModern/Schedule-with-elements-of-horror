<?
session_start();

echo $_SESSION['error'];
    if ($_SESSION['error'] == 1){ 
        $err = "Пароли должны совпадать, повторите ввод.";
        $_SESSION['error'] = 0;
    } else {
    if ($_SESSION['error'] == 0){ 
        $err = "";
    }  else {
        if ($_SESSION['error'] == 2){ 
        $_SESSION['error'] = 0;
        $err = "Данный логин уже занят, используйте другой.";
    }
}
}
?>
<head>
<title>CheckIT</title>
<meta charset="cp-1251">
<link type="text/css" rel="stylesheet" href="styles/styles.css" />
<script src="/js/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){  
        PopUpHide();
    });
    function PopUpShow(){
        $("#f1").show();
    }
    function PopUpHide(){
        $("#f1").hide();
    }
</script>
</head>
<body class="home">


<form class="auth" id="f1" action="auth.php" method = "POST">
    
    <label style="margin-left:20%;">Форма авторизации</label>
    <a href="javascript:PopUpHide()"><img src="images/crest.png" width=7% style="float:right;background-color:rgba(46,66,254,0.5);">  </a>
    <p>    
        <input type="text" name="login" placeholder="Login" required >
    </p>
    <p>
        <input type="password" name='password' placeholder="Password" required >
    </p>
    <p>
        <input type="submit" name="submit" value="Авторизоваться" style="height:60%;background-color:rgba(46,66,254,0.8);color:white;border:none;">
    </p>      
</form>

<div class="footer" action="exit.php">
   
    <div class="image">
        <img src="images/logo11.png" alt="CHECKIT" width=100%/>
    </div> 

    <div class="panel">
        
    <a href = "javascript:PopUpShow()" style="text-decoration:none;">Войти</a>
    </div>
    <img src="images/prostr1.jpg" alt="------" width=100% style="margin-top:-1%;"/>

    </div>


<div class="sydebar">
	<?php
		require("\assets\php\calendar.php");
	?>

</div>

<div class="content">
<?If (isset($_SESSION['category'])){
	echo "Вы уже зарегестрированы";	

} else {?>

<fieldset>
    <? if ($_SESSION['error'] != 4) {?>
	<legend>Регистрация</legend>
	<form action = "reg.php" method = "POST" >

        <input type="text" name="login" placeholder="Логин" required/>
        <input type="password" name="pass" placeholder="Пароль" required/>
        <input type="password" name="repass" placeholder="Повторите пароль" required/>        

        <input type = "submit" name = "regesrtation" value="Зарегстрироваться"/> 

	</form>
    <label> <?
        echo $err;

        ?> </label>
    <? } else {
        ?> <label> <?        
        echo "Вы успешно зарегистрировались. Передайте логин в деканат для подключения к курсу.";
        ?> </label> <?
    }



      ?>
</fieldset>

<?
}

?> 


    </div>
</div>
</body>