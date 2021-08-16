<?php 
 include('connection.php');
 
 $_SESSION['classe']= $_POST['classes'];
  
    $donnee3=$connect->prepare('SELECT * FROM `etudiant` WHERE `id_classe`=? ');
     $donnee3->execute(array( $_POST['classes']));
   $res3=$donnee3->fetchAll();
   $donnee31=$connect->prepare('SELECT * FROM `etudiant` WHERE `id_classe`=? ');
     $donnee31->execute(array( $_POST['classes']));
   $res31=$donnee31->fetchAll();
   
  
    $donnee4=$connect->prepare('SELECT * FROM `classe` WHERE `nom_classe`=? ');
     $donnee4->execute(array( $_POST['classes']));
     $res4=$donnee4->fetch();
      $id=$res4['id_classe'];
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
<br><br>
   <form action="cal.php" method="POST"class="form-inline for">
   <input type="hidden" name=" classes" id="" value="<?= $id?>">
    <div class="shadow-lg p-5 mb-5 bg-white rounded">
                            <fieldset>
                  
                <div class="form-row align-items-center">
                    
                    <div class="col lg">
                            <select name="classes" id="" class=" custom-select mr-sm-5 test" id="inlineFormCustomSelect">
                              <option  selected >CLASSES </option>
                                <?php foreach ($res3 as $res3):?>
                                  <option value="<?= $res3['id_etud'] ?>"> <?= $res3['pren_etud'].'    '.$res3['nom_etud']?></option> 
                                <?php endforeach;?>
                             </select>
                                                <input type="submit" value=" VALIDER" name="choix" class="btn btn-primary btn-lg">
                    </div>
                </div>
                                              
                                </fieldset>
    </div>
   </form>
   <div class="container">
   <div class="table-responsive-xl" >
  
  <table class="table table-bordered  table-sm " >
  <thead class="thead-dark " >
    <tr>
      <th scope="col" rowspan="2" style="text-align:center;" > <span  style="position:relative;top:-20px;" > Codes </span></th>
      <th scope="col" rowspan="2"style="text-align:center" ><span style="position:relative;top:-20px;">  Modules </span></th>
      <th scope="col" rowspan="2"style="text-align:center"> <span style="position:relative;top:-20px;">  Coef </span></th>
      <th scope="col" colspan="3"style="text-align:center">Notes</th>
    
      <th scope="col"  rowspan="2"style="text-align:center"><span style="position:relative;top:-20px;">  Crédit</span></th>
    </tr>
    <tr>
        <th scope="col"style="text-align:center">Devoir</th>
      <th scope="col"style="text-align:center">Examen</th>
      <th scope="col"style="text-align:center">Moyenne</th>
    </tr>
  </thead>
  <tbody>

                              
                            
  <?php 
   
      $donnee=$connect->prepare('SELECT * FROM `u_e`');
                $donnee->execute();
             $c=10;
             $d=0;
               $cpt=100;
               $tcredit=0;
                while($res31=$donnee->fetch())
                {
                  $c++;
                  $d++;
                 $e=0;
                   $cpt=$c;
                   $credit=0;
                  
                  ?>
                     <tr>
                      <td  colspan="2" style="text-align:center;font-weight:bolder"> <?=  $res31['code_UE']. " - ".  $c ." - "?> <?=  $res31['lib_UE']?></td>
                      <td></td>
                      <td  colspan="3" ></td>
                      </tr>
                  <?php
                               //  echo $res3['lib_UE'].'<br>';
                              // echo $res31['id_UE'].'<br>';
                               $donnee1=$connect->prepare('SELECT * FROM `mod_classe`WHERE `id_classe`=?');
                                  $donnee1->execute(array($id));
                   while($res1=$donnee1->fetch())
                  {
                       
                        $donnee5=$connect->prepare('SELECT * FROM `module` WHERE `id_mod`=? AND `id_ue`=? ');
                          $donnee5->execute(array($res1['id_mod'], $res31['id_UE']));
                          $res5=$donnee5->fetch();
                          // var_dump($res5);
                            if($res5)
                            {

                            $e++;  
                            $credit=$credit+$res5['credit'];
                             
                          ?>
                          
                   
            
                                          
                <tr>
                  <th scope="row" style="text-align:center"><?php echo  $cpt."".$e;?></th>
                  <td style="text-align:center"><?php echo  $res5['lib_mod'];?></td>
                  <td style="text-align:center"><?php echo  $res5['id_coef'];?></td>
                  <td style="text-align:center"> </td>
                  <td style="text-align:center">Larry</td>
                  <td style="text-align:center">the Bird</td>
                  <td style="text-align:center"><?= $res5['credit']?></td>
                </tr>
                <!-- <tr>
                      
                      <td> MOYENNE</td>
                      </tr> -->
              
                    
                          <?php
                        
                     }  
                       //  echo  $res5['lib_mod'].'<br>';      
                      
                  }
                   ?>
                     <tr>
                      <td  colspan="2"style="text-align:center;font-weight:bolder"> MOYENNE UE <?= $d ?></td>
                      <td style="text-align:center;font-weight:bolder">  <?= $res31['coef_UE']?></td>
                      <td  colspan="3" ></td>
                      <td  style="text-align:center;font-weight:bolder"> <?= $credit ?> C</td>
                      </tr>
                  <?php
                  $tcredit=$tcredit+$credit; 
                } 
               ?>
      <tr>
      <td colspan="6"   style="text-align:center;font-weight:bolder"> TOTAL CREDIT </td>
     <td  style="text-align:center;font-weight:bolder"> <?= $tcredit ?> C</td>
      </tr>
       
  </tbody>
</table>
</div>
</div>
   
</body>
</html>