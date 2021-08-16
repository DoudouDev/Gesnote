<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="new-admin.css" />
    <script src="main.js"></script>
</head>
<body>
    
     <div class="container">
      <?php
        //include('header.php');
        ?>
        
        <div class="row">
               <div class="admin">
    
             <ul>
             <h1 style="color:white">  <img src="image/logo.jpg" alt="" width="150" class="logo"></h1> 
              <hr>
                 <h1 style="color:white"> <a href="admin.php" style="text-decoration:none"><img src="image/admin.png" alt="" width="70"> <span> ADMIN </span></a> </h1> 
                <li> <img src="image/box.png" alt="" width="20"> <a href="ajout-filiere.php"> FILIERES </a></li>
                <li><img src="image/box.png" alt="" width="20"> <a href="ajout-classe.php"> CLASSES </a></li>
                <li> <img src="image/box.png" alt="" width="20"> <a href="lclasse.php"> PROMOTIONS </a></li>
                <li><img src="image/box.png" alt="" width="20"> <a href="ajout-prof.php"> PROFESSEURS </a></li>
                <li> <img src="image/box.png" alt="" width="20"> <a href="ajout-UE.php">   U - E </a></li>
                <li><img src="image/box.png" alt="" width="20"> <a href="list-mod.php"> MODULES </a></li>

                <li> <a href="deconnect.php">  DECONNECTION  </a></li>
                
                
                
             </ul>
      
    </div>
        
        </div>
       
      
   
     </div>
</body>
</html>