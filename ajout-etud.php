<?php
/*connection a la base de donnée*/
    $bd  =new PDO('mysql:host=localhost;dbname=gesnote','root','');
   /*requete de selection des donnée*/
  $donnee=$bd->prepare('SELECT * FROM `classe`');
 $res=$donnee->execute();
 //var_dump($res);

 $res=$donnee->fetchAll();
//  while($res=$donnee->fetch())
//   {
//       echo $res['codefil'];
//     //   if($res1['id-cours']== $_SESSION['mat-etud'])
//     //   {
//     //     $test = $res1['lib-cours'] ;
//     //     $vrai = $res1['id-cours'] ;
//     //   }
//   }
 


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
<?php  include('header.php');?>
    <div>
     <br><br> <br><br> <br><br>
    <center>
   
        <h1> ajout des étudiants</h1>
    <form action="valid-ajout.php" method="POST">

           <br> <br>
           <table>
               <tr>
                   <td>
                   PRENOM
                   </td>
                   <td>
                   <input type="text" name="pren_etud" id=""> 
                   </td>
               </tr>
               <tr>
                   <td>
                     NOM
                   </td>
                   <td>
                   <input type="text" name="nom_etud" id="">
                   </td>
               </tr>
               <tr>
                   <td>
                   DATE NAISSANCE  
                   </td>
                   <td>
                  <input type="date" name="date_etud" id=""> 
                   </td>
               </tr>
               <tr>
                   <td>
                   LIEU DE NAISSANCE 
                   </td>
                   <td>
                   <input type="text" name="lieu_etud" id="">
                   </td>
               </tr>
               <tr>
                   <td>
                   ADRESSE
                   </td>
                   <td>
                   <input type="tel" name="adresse_etud" id=""> 
                   </td>
               </tr>
               <tr>
                   <td>
                   TELEPHONE 
                   </td>
                   <td>
                   <input type="tel" name="tel_etud" id=""> <br> <br>
                   </td>
               </tr>
               <tr>
                   <td>
                   E-MAIL 
                   </td>
                   <td>
                    <input type="email" name="email_etud" id="">
                   </td>
               </tr>
               <tr>
                   <td>
                   CLASSES
                   </td>
                   <td>
                   
                   <select name="classe" id="">
                 <option > CLASSES </option>
                      <?php foreach ($res as $res):?>
                  <option value="<?= $res['nom_classe'] ?>"> <?= $res['nom_classe'] ?></option> 
                      <?php endforeach;?> <br>
                      </select>
                   </td>
               </tr>
               <tr>
                   <td>
                     

                   </td>
                   <td>
                       <br><br>
                   <input type="submit" value=" envoyer" name="etd">

                   </td>
               </tr>
           </table>
           </form>
           <br> <br>
           <?php
         if(isset($_GET['echec']))
         {
             ?>
               <center class="test"><h1> classe enregistré </h1></center>
         <?php    
         }
        ?>
           </center>
    </div>
    
</body>
</html>