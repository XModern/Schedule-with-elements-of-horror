<?
session_start();

    if ($_SESSION['error'] == 1){ 
        $err = "������ ������ ���������, ��������� ����.";
        $_SESSION['error'] = 0;
    } else {
    if ($_SESSION['error'] == 0){ 
        $err = "";
    }  else {
        if ($_SESSION['error'] == 2){ 
        $_SESSION['error'] = 0;
        $err = "������ ����� ��� �����, ����������� ������.";
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
    
    <label style="margin-left:20%;">����� �����������</label>
    <a href="javascript:PopUpHide()"><img src="images/crest.png" width=7% style="float:right;background-color:rgba(46,66,254,0.5);">  </a>
    <p>    
        <input type="text" name="login" placeholder="Login" required >
    </p>
    <p>
        <input type="password" name='password' placeholder="Password" required >
    </p>
    <p>
        <input type="submit" name="submit" value="��������������" style="height:60%;background-color:rgba(46,66,254,0.8);color:white;border:none;">
    </p>      
</form>

<div class="footer" action="exit.php">
   
    <div class="image">
        <img src="images/logo11.png" alt="CHECKIT" width=100%/>
    </div> 

    <div class="panel">
        
    <a href = "javascript:PopUpShow()" style="text-decoration:none;">�����</a>
    </div>
    <img src="images/prostr1.jpg" alt="------" width=100% style="margin-top:-1%;"/>
        <div class="navig" style = "float:left;height:10%;width:100%"> <a href="index.php"> ������� �������� </a> </div>
    </div>


<div class="sydebar">
	<?php
		require("calendar_just_live.php");
	?>

</div>

<div class="content">
<?If (isset($_SESSION['category'])){
	echo "�� ��� ����������������";	

} else {?>

<fieldset>
    <? if ($_SESSION['error'] != 4) {?>
	<legend>�����������</legend>
	<form action = "reg.php" method = "POST" >

        <input type="text" name="login" placeholder="�����" required/>
        <input type="password" name="pass" placeholder="������" required/>
        <input type="password" name="repass" placeholder="��������� ������" required/>        

        <input type = "submit" name = "regesrtation" value="������������������"/> 

	</form>
    <label> <?
        echo $err;

        ?> </label>
    <? } else {
        ?> <label> <?        
        echo "�� ������� ������������������. ��������� ����� � ������� ��� ����������� � �����.";
        ?> </label> <?
    }



      ?>
</fieldset>

<?
}

?> 


    </div>
</div>

<div class="footer" style=" width:100%; height: 10%; background-color: white; margin-top:65%;padding:1% 0 0 0;">
                <label style = "font-size:12pt; margin-left:35%;">� 2017 | </label>
                <a href = "https://vk.com/id70585011">����� �. |</a>
                <a href = "https://vk.com/id65914030">������ �. |</a> 
                <a href = "https://vk.com/id35156376">������� �. |</a> 
                <a href = "https://vk.com/i140641209">����������� �.</a>  
</div>
</body>