 <?php 
 
   /*connexion a la base de donnée*/
 include("connection.php");
    
     $donnee=$connect->prepare('INSERT INTO `prof_mod`(`id_prof`, `id_mod`) VALUES (?,?)');
 $res=$donnee->execute(array($_POST['pro'],$_POST['matricule']));
    // $res=$donnee->fetch();
    var_dump($res);
    if($res)
    {
        echo " c'est bon ";
    }
     else
    {
        echo " c'est pas bon ";
    }
 //
  $donnee1=$connect->prepare('INSERT INTO `prof_classe`(`id_prof`, `id_classe`) VALUES (?,?)');
 $res1=$donnee1->execute(array($_POST['pro'],$_POST['classe']));

 if($res1)
    {
        echo " c'est bon ";
    }
    else
    {
        echo " c'est pas bon ";
    }
     echo $_POST['pro'];
      //
  $donnee2=$connect->prepare('INSERT INTO `mod_classe`( `id_mod`, `id_classe`) VALUES (?,?)');
 $res2=$donnee2->execute(array($_POST['matricule'],$_POST['classe']));

 if($res2)
    {
        echo " c'est bon ";
    }
    else
    {
        echo " c'est pas bon ";
    }
     
//  echo $_POST['classe'];
//   echo $_POST['matricule'];
?>