
<head>
<title>schedule</title>
<meta charset="cp1251">
<link href="styles.css" rel="stylesheet">
</head>

<body >

<div style="width:100%;margin:0 auto;">

  <?php
require_once('MyConfig.php');
$days = array("�����������","�������","�����","�������", "�������");
foreach ($days as $value1){
  $i = 0;
  unset($arr);
  $arr = array();
 ?>
 <table border="2" style = "width:90%;">  
    <tr>
      <td rowspan=6 style = "transform:rotate(270deg); border:none;padding:0;margin:0; width:5%; height:5%;"><?echo $value1;?></td>
      <td style="width:5%;">����� ����</td>
      <? $stmt = $pdo->query('SELECT group_name,id_group FROM schedule.group 
            WHERE (group.course=3) AND (group.faculty='.'"��������� ������������ ����"'.') ORDER BY group_name ASC');
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
        $stmt = $pdo->query('SELECT id_lesson,class,fio, type, classroom, degree, parity,subgroup  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') ORDER BY parity');
        if ($stmt->rowCount() == 0){ ?>
           <td>
                     <br/>
                     <br/>
                     <br/>
                     <br/>                     
          </td> <?
        }
        while ($row = $stmt->fetch()){
          if ($row['degree'] == "������"){
            $deg = substr($row['degree'], 0,3);

          } else {
            if ($row['degree'] == "������� �������������"){
              $deg = substr($row['degree'], 0,2).".".substr($row['degree'], 8,4);
            } else { 
              if ($row['degree'] == "���������"){
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
        if ($row['parity'] == 0 || $row['parity'] == 2){
        ?>

        
          <?if ($row['parity'] == 0)   { ?> 


          <? 
          ;
            if ($row['subgroup'] == 0){ ?>
                    <td>
          <div class = "tableValue" style="width:100%;height:100%">
          <h5><?echo $row['class'];?></h5>
          <p> <?echo  $row['type'];?> </p>
          <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'?> </p>
          <div class = "aud">
          <label> <?echo  $row['classroom'];?> </label>
          </div>
          </div>             </td>    <?  

          } else if ($row['subgroup'] == 1){
            $id = $row['id_lesson'];
            //echo $id." ".$value1." ".$j." ".$value." ";
            ?> <td> <?
              $stmt5 = $pdo->query('SELECT id_lesson,class,fio, type, classroom, degree, parity  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') AND (parity = 0) AND (subgroup=2) ORDER BY subgroup ASC');
              if ($stmt5->rowCount() == 0){ ?>
              
           <div class = "tableValue" style="width:100%;height:100%;float:left;top:0;">
          <h5><?echo $row['class'].'/ -';?></h5>
          <p> <?echo  $row['type'].'/ -';?> </p>
          <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'.'/ -';?> </p>
          <div class = "aud">
          <label> <?echo  $row['classroom'].'/ -';?> </label>
          </div>
         
                    <?} else if ($stmt5->rowCount() == 1){
                        while ($row5 = $stmt5->fetch()){ 
                                        $fio1 = $row5['fio'];
                                        $i1 = strripos($fio1," ");
                                        $patr1 = substr($fio1, $i1+1,1);
                                        $fio1[$i1] = "1";
                                        $i1 = strripos($fio1," ");
                                        $name1 = substr($fio1, $i1+1,1);
                                        $surname1 = substr($fio1, 0,$i1+1);
                                  if ($row5['degree'] == "������"){
                                    $deg1 = substr($row5['degree'], 0,3);

                                  } else {
                                    if ($row5['degree'] == "������� �������������"){
                                      $deg1 = substr($row5['degree'], 0,2).".".substr($row5['degree'], 8,4);
                                    } else { 
                                      if ($row5['degree'] == "���������"){
                                        $deg1 = substr($row5['degree'], 0,4);
                                      } 
                                    }
                                  }                                          

                              ?>
                              <div class = "tableValue" style="width:100%;height:100%;float:left;top:0;">
                              <h5><?echo $row['class'].'/'. $row5['class'];?></h5>
                              <p> <?echo  $row['type'].'/'.$row5['type'];?> </p>
                              <p> <?echo  $deg.'.'.$surname.$name.'.'.$patr.'.'.'/'.$deg1.'.'.$surname1.$name1.'.'.$patr1.'.';?> </p>
                              <div class = "aud">
                              <label> <?echo  $row['classroom'].'/'.$row5['classroom'];?> </label>
                              </div>
                        <?

                        }



              ?> </td>  <?

                    }


          } else if($row['subgroup'] == 2) {

           $stmt6 = $pdo->query('SELECT id_lesson,class,fio, type, classroom, degree, parity  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') AND (parity = 0) AND (subgroup=1) ORDER BY subgroup ASC');
           if ($stmt6->rowCount() == 0){
                           ?><td>
                              <div class = "tableValue" style="width:100%;height:100%;float:left;top:0;">
                              <h5><?echo '-/'.$row['class'];?></h5>
                              <p> <?echo '-/'.$row['type'];?> </p>
                              <p> <?echo  '-/'.$deg.'.'.$surname.$name.'.'.$patr.'.';?> </p>
                              <div class = "aud">
                              <label> <?echo  '-/'.$row['classroom'];?> </label>
                              </div> 
                            </td>
                              <?

                
          }


          }?>

          <? } else

          if ($row['parity'] == 2)   {   ?> 
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
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') AND (parity = 1)');
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
                      <div style="width:100%;float:right;height:50%;border-top:1px solid black;border-bottom:1px solid black;">
                     <br/>
                     <br/>
                     <br/>
                      </div> 
                      </td><?}
        } 
      }
        else if ($row['parity'] == 1){
                 $stmt3 = $pdo->query('SELECT class,fio, type, classroom, degree, parity  FROM allclasses 
            WHERE (allclasses.day="'.$value1.'") AND (num='.$j.') AND (id_group='.$value.') AND (parity = 2)');
                 if ($stmt3->rowCount() == 0){
                    
                       $fio = $row['fio'];
                      $i = strripos($fio," ");
                      $patr = substr($fio, $i+1,1);
                      $fio[$i] = "1";
                      $i = strripos($fio," ");
                      $name = substr($fio, $i+1,1);
                      $surname = substr($fio, 0,$i+1);?>

                      <td> 
                      <div style="width:100%;height:50%;float:right;border-bottom:1px solid black;">
                     <br/>
                     <br/>
                     <br/>
                      </div> 

                      <div class = "tableValue" style="width:100%;height:50%;float:right;">
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

