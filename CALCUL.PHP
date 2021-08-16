<?php
session_start();

   /*connexion a la base de donnée*/
   $connect = new PDO('mysql:host=localhost;dbname=gesnote','root','');

    $donnee1=$connect->prepare('SELECT * FROM `note`');
     $donnee1->execute(array(@$_SESSION['classe']));
      while($res1=$donnee1->fetch())
           {
            //    echo $res1['note'].'    -------- > ' . $res1['id_etud'].'-------- >'. $res1['id_evalu'].'<br>';
                     $donnee2=$connect->prepare('SELECT * FROM `module`');
                $donnee2->execute();
                while($res2=$donnee2->fetch())
                    {
                        
                                if ($res1['mod']==$res2['lib_mod'] ) 
                                {
                                $module = $res2['id_coef'];
                                } 
                    }
                    //  echo $res1['note'].'    -------- > ' . $res1['id_etud'].'-------- >'. $res1['id_evalu'].'------->'. $module.'<br>';
           }
          
     //$res1=$donnee1->fetchAll();
   $donnee2=$connect->prepare('SELECT * FROM `classe`');
     $donnee2->execute();
     $res2=$donnee2->fetchAll();

   
   
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
 <form action="etd.php" method="POST"class="form-inline for">
    <div class="shadow-lg p-5 mb-5 bg-white rounded">
                            <fieldset>
                  
                <div class="form-row align-items-center">
                    
                    <div class="col lg">
                            <select name="classes" id="" class=" custom-select mr-sm-5 test" id="inlineFormCustomSelect">
                              <option  selected >CLASSES </option>
                                <?php foreach ($res2 as $res2):?>
                                  <option value="<?= $res2['nom_classe'] ?>"> <?= $res2['nom_classe'] ?></option> 
                                <?php endforeach;?>
                             </select>
                                                <input type="submit" value=" VALIDER" name="choix" class="btn btn-primary btn-lg">
                    </div>
                </div>                                
                                </fieldset>
    </div>
   </form>
   
</body>
</html>