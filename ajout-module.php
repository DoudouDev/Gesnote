<?php
include('connection.php');
   /*requete de selection des donnée pour les U-E*/
  $donnee=$connect->prepare('SELECT * FROM `u_e`');
 $res=$donnee->execute();
 $res=$donnee->fetchAll();
 //var_dump($res);
  /*requete de selection des donnée pour les coefficients*/
  $donnee1=$connect->prepare('SELECT * FROM `coef`');
 $res1=$donnee1->execute();
 $res1=$donnee1->fetchAll();
//var_dump($res);
  /*requete de selection des donnée pour les semestres*/
  $donnee2=$connect->prepare('SELECT * FROM `semestre`');
 $res2=$donnee2->execute();
 $res2=$donnee2->fetchAll();

 

 


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php  include('sidebar.php');?>
 <div>
    <center>
    <h1> ajouter un module </h1>
    <form action="valid-ajout.php" method="POST">
           Libelle module <input type="text" name="modu" id="nomclasse">
           <select name="ue" id="">
                 <option > U - E </option>
                      <?php foreach ($res as $res):?>
                  <option value="<?= $res['id_UE'] ?>"> <?= $res['lib_UE'] ?></option> 
                      <?php endforeach;?>
                               </select>
          <!--  -->
          <select name="coef" id="">
                 <option > COEF </option>
                      <?php foreach ($res1 as $res1):?>
                  <option value="<?= $res1['coef'] ?>"> <?= $res1['coef'] ?></option> 
                      <?php endforeach;?>
                               </select>
                               <!--  -->
                               <select name="semestre" id="">
                 <option > SEMESTRE </option>
                      <?php foreach ($res2 as $res2):?>
                  <option value="<?= $res2['code_sem'] ?>"> <?= $res2['code_sem'] ?></option> 
                      <?php endforeach;?>
                               </select>
           
          
           <input type="submit" value=" envoyer" name ="module"><br> <br>

            <?php
           if(isset($_GET['echec']))
         {
             ?>
               <center class="test"><h1> module enregistré </h1></center>
         <?php    
         }
        ?>
         
           </form>
           </center>
    </div>
    
</body>
</html>