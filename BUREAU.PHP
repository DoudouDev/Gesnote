<?php
       include('connection.php');
       /*recuperation des infos des promotions*/
 $donnee=$connect->prepare('SELECT count(*) FROM `promotion`');
   $res= $donnee->execute();
   $res=$donnee->fetch();
   $nbr= $res[0];
         /*recuperation des infos des filieres*/
 $donnee1=$connect->prepare('SELECT count(*) FROM `filiere`');
   $res1= $donnee1->execute();
   $res1=$donnee1->fetch();
   $nbr1= $res1[0];
  
         /*recuperation des infos des classes*/
 $donnee2=$connect->prepare('SELECT count(*) FROM `classe`');
   $res2= $donnee2->execute();
   $res2=$donnee2->fetch();
   $nbr2= $res2[0];
   
         /*recuperation des infos des u - e */
 $donnee3=$connect->prepare('SELECT count(*) FROM `u_e`');
   $res3= $donnee3->execute();
   $res3=$donnee3->fetch();
   $nbr3= $res3[0];
         /*recuperation des infos des professeurs*/
 $donnee4=$connect->prepare('SELECT count(*) FROM `professeur`');
   $res4= $donnee4->execute();
   $res4=$donnee4->fetch();
   $nbr4= $res4[0];
         /*recuperation des infos des utilisateurs*/
 $donnee5=$connect->prepare('SELECT count(*) FROM `utilisateurs`');
   $res5= $donnee5->execute();
   $res5=$donnee5->fetch();
   $nbr5= $res5[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

 
</head>

<body>
  <section id="container">
  
 <?php include('sidebar.php'); ?>
   
   <div class="container "  style="position:absolute; top:10px; left:250px;" class="sidebar-toggle-box" >

  <div class="row">
    <!-- <a href="promotion.php"> bonjour doudou</a> -->
   
                     <div class="  col-lg-4 ">

                            <div class="card mb-2  py-1 border-left-success ">

                                  <div class="card-body">

                                 <span style="font-size:20px;">  <?php echo $nbr;  ?> Promotion(s)</span>

                                 <a href="promotion.php"> <button class="btn btn-success" style="position:relative;left:40px;"> <span style="font-weight:bold;"> Plus de  Détail </span></button></a>

                             </div>

                         </div>

                      </div>

                     <div class=" col-lg-4 ">

                               <div class="card mb-4 py-3 border-left-success shadow">

                                  <div class="card-body">

                                   <span style="font-size:20px;">   <?php echo $nbr1; ?> Filiére(s)</span> 

                                <a href="ajout-filiere.php"><button class="btn btn-success" style="position:relative;left:30px;"> <span style="font-weight:bold;"> Plus de  Détail </span></button> </a> 

                                  </div>

                              </div>

                            </div>

                        <div class="   col-lg-4 ">

                               <div class="card mb-4 py-3 border-left-success shadow">

                                  <div class="card-body">

                                  <span style="font-size:20px;">  <?php echo $nbr2;  ?> Classe(s) </span>

                                 <a href="ajout-classe.php">  <button class="btn btn-success" style="position:relative;left:10px;"> <span style="font-weight:bold;"> Plus de  Détail </span></button></a>

                                  </div>

                              </div>

                            </div>

                            <div class="   col-lg-4 ">

                               <div class="card mb-4 py-3 border-left-success shadow">

                                  <div class="card-body">

                                   <span style="font-size:20px;" > <?php echo $nbr3;  ?> U - E  </span> 

                                     <a href="ajout-UE.php"> <button class="btn btn-success" style="position:relative;left:40px;"> <span style="font-weight:bold;"> Plus de  Détail </span></button></a>

                                  </div>

                              </div>

                            </div>

                             <div class="   col-lg-4 ">

                               <div class="card mb-4 py-3 border-left-success shadow">

                                  <div class="card-body">

                                    <span style="font-size:20px;"><?php echo $nbr4;  ?> Professeur(s)</span>

                                   <a href="ajout-prof.php"> <button class="btn btn-success" style="position:relative;left:54px;"> <span style="font-weight:bold;"> Plus de  Détail </span></button></a>

                                  </div>

                              </div>

                            </div>

                             <div class="   col-lg-4 ">

                               <div class="card mb-4 py-3 border-left-success shadow">

                                  <div class="card-body">

                                    <span style="font-size:20px;"><?php echo $nbr5; ?> Utilisateur(s)</span>

                                   <a href="video.php?video"> <button class="btn btn-success" style="position:relative;left:80px;"> <span style="font-weight:bold;"> Plus de  Détail </span></button></a> 

                                  </div>

                              </div>

                            </div>
            </div>

  </div>
      
  </section>
  

  
</body>

</html>
