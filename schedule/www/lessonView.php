
<head>
<title>schedule</title>
<meta charset="cp1251">
</head>

<body >

<div>

  <?php
require_once('MyConfig.php');


$days = array("Понедельник","Вторник","Среда","Четверг", "Пятница");

foreach ($days as $value1){
  $i = 0;
  unset($arr);
  $arr = array();

 ?>
 <table border="2">  
    <tr>
      
      <td rowspan=6 style = "transform:rotate(270deg); border:none;padding:0;"><?echo $value1;?></td>
      <td>Номер пары</td>
      <? $stmt = $pdo->query('SELECT group_name,id_group FROM schedule.group ORDER BY group_name ASC');
      while ($row = $stmt->fetch()){
        $i++;
        $arr[$i] = $row['id_group'];
      ?>
      <td><? echo $row['group_name']?></td>
      <? 
      } 
      ?>
     
    </tr>

    

    <? $j=1;
    for ($j =1;$j < 6;$j++){ ?>
    <tr>
      <td> <? echo $j ?></td>
      <?
      foreach ($arr as $value)
       {
        $stmt = $pdo->query('SELECT class FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.')');
        while ($row = $stmt->fetch()){
        ?>
        <td>
          <p style = "margin:0%;">
          <?
              echo $row['class'];}
          ?>
          </p>
        </td>
        <? 
        } 
        unset($value);
      }
     ?> </tr>  <?
   }
   unset($value1);
      ?>

 </table>

 
</div>
</body>

