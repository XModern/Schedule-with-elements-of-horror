
<head>
<title>schedule</title>
<meta charset="cp1251">
<link href="styles.css" rel="stylesheet">
</head>

<body >

<div style="width:100%;margin:0 auto;">

  <?php
require_once('MyConfig.php');
$days = array("Понедельник","Вторник","Среда","Четверг", "Пятница");
foreach ($days as $value1){
  $i = 0;
  unset($arr);
  $arr = array();
 ?>
 <table border="2" style = "width:90%;">  
    <tr>
      <td rowspan=6 style = "transform:rotate(270deg); border:none;padding:0;margin:0; width:5%; height:5%;"><?echo $value1;?></td>
      <td style="width:5%;">Номер пары</td>
      <? $stmt = $pdo->query('SELECT group_name,id_group FROM schedule.group 
            WHERE (group.course=3) AND (group.faculty='.'"Факультет компьютерных наук"'.') ORDER BY group_name ASC');
      while ($row = $stmt->fetch()){
        $i++;
        $arr[$i] = $row['id_group'];
      ?>
      <td style="width:20%;"><? echo $row['group_name']?></td>
      <? 
      } 
      ?>
    </tr>
    <? $j=1;
    for ($j =1;$j < 6;$j++){ ?>
    <tr>
      <td style="text-align:center;height:20%;"> <? echo $j ?></td>
      <?
      foreach ($arr as $value)
       {
        $stmt = $pdo->query('SELECT class,fio, type, classroom, degree, parity  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') GROUP BY day,num,id_group,parity');
        if ($stmt->rowCount() == 0){ ?>
           <td>

          </td> <?
        }
        while ($row = $stmt->fetch()){
          if ($row['degree'] == "доцент"){
            $deg = substr($row['degree'], 0,3);

          } else {
            if ($row['degree'] == "старший преподаватель"){
              $deg = substr($row['degree'], 0,2).".".substr($row['degree'], 8,4);
            } else { 
              if ($row['degree'] == "профессор"){
                $deg = substr($row['degree'], 0,4);
              } 
            }
          }

          $fio = $row['fio'];
          $i = strripos($fio," ");
          $patr = substr($fio, $i+1,1);
          $fio[$i] = "1";
          $i = strripos($fio," ");
          $name = substr($fio, $i+1,1);
          $surname = substr($fio, 0,$i+1);
          /*$pattern = '/(\w+) (\w)\w+ (\w)\w+/iu';
          $replacement = '$1 $2. $3.';
          $string = $row['fio'];
          $nameshort = preg_replace($pattern,$replacement,$string);
          echo $nameshort;*/
        if ($row['parity'] == 0 || $row['parity'] == 1){
        ?>

        
          <?if ($row['parity'] == 0)   {   ?> 
          <td>
          <div class = "tableValue" style="width:100%;height:100%">
          <h5><?echo $row['class'];?></h5>
          <p> <?echo  $row['type'];?> </p>
          <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'?> </p>
          <div class = "aud">
          <label> <?echo  $row['classroom'];?> </label>
          </div>
          </div>
        </td>
          <? } else

          if ($row['parity'] == 1)   {   ?> 
          <td>
          <div class = "tableValue" style="width:100%;height:50%;float:left;top:0;">
          <h5><?echo $row['class'];?></h5>
          <p> <?echo  $row['type'];?> </p>
          <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'?> </p>
          <div class = "aud">
          <label> <?echo  $row['classroom'];?> </label>
          </div>
        </div>
          <?

          $stmt2 = $pdo->query('SELECT class,fio, type, classroom, degree, parity  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') AND (parity = 2)');
          if ($stmt2->rowCount() != 0){
              while ($row1 = $stmt2->fetch()){ 
                          $fio = $row1['fio'];
          $i = strripos($fio," ");
          $patr = substr($fio, $i+1,1);
          $fio[$i] = "1";
          $i = strripos($fio," ");
          $name = substr($fio, $i+1,1);
          $surname = substr($fio, 0,$i+1);?>
          <div class = "tableValue" style="width:100%;height:50%;float:right;bottom:0;">
          <h5><?echo $row1['class'];?></h5>
          <p> <?echo  $row1['type'];?> </p>
          <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'?> </p>
          <div class = "aud">
          <label> <?echo  $row1['classroom'];?> </label>
          </div>
          </div> 
          </div>
          <?
              }

          }  else  if ($stmt2->rowCount() == 0) {
                ?>
                      <div class = "tableValue" style="width:100%;float:right;height:50%;border-top:1px solid black;border-bottom:1px solid black;">
                      <h5><?echo "\n";?></h5>
                      <p> <?echo  " \n";?> </p>
                      <p> <?echo  " \n "?> </p>
                      <div class = "aud" style="background-color:white;">
                      <label> <?echo  "      ";?> </label>
                      </div>
                      </div> 
                      </td><?}
        } 
      }
        else if ($row['parity'] == 2){
                 $stmt3 = $pdo->query('SELECT class,fio, type, classroom, degree, parity  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') AND (parity = 1)');
                 if ($stmt3->rowCount() == 0){
                    
                       $fio = $row['fio'];
                      $i = strripos($fio," ");
                      $patr = substr($fio, $i+1,1);
                      $fio[$i] = "1";
                      $i = strripos($fio," ");
                      $name = substr($fio, $i+1,1);
                      $surname = substr($fio, 0,$i+1);?>

                      <td> 
                      <div class = "tableValue" style="width:100%;height:50%;float:right;">
                      <h5><?echo "";?></h5>
                      <p> <?echo  "";?> </p>
                      <p> <?echo  ""?> </p>
                      <div class = "aud" style="background-color:white;">
                      <label> <?echo  "";?> </label>
                      </div>
                      </div> 

                      <div class = "tableValue" style="width:100%;height:50%;float:right;border-top:1px solid black;box-shadow:none;">
                      <h5><?echo $row['class'];?></h5>
                      <p> <?echo  $row['type'];?> </p>
                      <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'?> </p>
                      <div class = "aud">
                      <label> <?echo  $row['classroom'];?> </label>
                      </div>
                      </div> 
                      </td>
<?
}
                    
                  
                 
          




       }

         /* if ($row['parity'] == 2)   {   ?> 
          <div class = "tableValue" style="width:50%;height:100%;float:right;">
          <h5><?echo $row['class'];?></h5>
          <p> <?echo  $row['type'];?> </p>
          <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'?> </p>
          <div class = "aud">
          <label> <?echo  $row['classroom'];?> </label>
          </div>
          </div>  <? }*/ ?>

        <?}
           
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

