<?php
session_start();
/*connexion a la base de donnée*/
$bd  = new PDO('mysql:host=localhost;dbname=gesnote', 'root', '');
// /*preparation de la requete insert*/
// echo "note ". $_POST[$i].'<br>';
echo "etudiant ".$_POST['etud'];
//  $true=0;
// echo " Bonjour doudou ";
$donnée1 = $bd->prepare('SELECT * FROM `etudiant` WHERE `id_classe`=?');
$res1 = $donnée1->execute(array($_SESSION['classe']));
$i = 1;
while ($res1 = $donnée1->fetch()) { //1
    $donnée2 = $bd->prepare('SELECT * FROM `note` ');
    $res2 = $donnée2->execute();
    while ($res2 = $donnée2->fetch()) { //a
        if ($res2['id_etud'] == $res1['id_etud'] && $res2['id_evalu'] == $_SESSION['eval'] && $res2['mod'] == $_POST['mod']) {
            $true = 1;
        }
    } //a
    if ($true == 1) { //b
        header('location:releve.php?ver=true');
    } //b
    else { //b


        $donnée = $bd->prepare('INSERT INTO `note`(`note`, `id_etud`, `id_evalu`, `mod`)  VALUES (?,?,?,?)');
        $res = $donnée->execute(array($_POST[$i], $res1['id_etud'], $_SESSION['eval'], $_POST['mod']));
        var_dump($res);
        if ($res) {
            $test = 1;
        }
        else {
            echo " Echec de l'insertion ";
        }
        $i++;
        if ($test == 1) {
            header('location:releve.php?echec=true');
        }
    } //b
}//1
        
    
        
//    $i=0;
//    whhile($i<$_POST[$cpt])
//    {
//        echo $_POST[$i];
//        $i++;
//    }

/*insertion de la filieres*/
//    $donnée = $bd->prepare('INSERT INTO `filiere`( `libfil`, `codefil`) values(?,?)');
//        $res = $donnée->execute(array(@$_POST['libfil'],@$_POST['codefil']));
// //    if($res)
// //    {
// //        echo' operation reussie';
// //    }
// //    else
// //    {
// //        echo " echec de l'operation";
// //    }
//    /*insertion de la classe*/

//       $donnée1=$bd->prepare('INSERT INTO `classe`(`nom_classe`, `id_fil`) VALUES (?,?)');
//    $res1=$donnée1->execute(array(@$_POST['nomclasse'],@$_POST['filiere']));

//  /*insertion du professeur*/
//    if(isset($_POST['prof']))
//    {


//       $donnée2=$bd->prepare('INSERT INTO `professeur`(`nom_prof`, `pren_prof`, `tel_prof`, `adresse`, `email_prof`) VALUES (?,?,?,?,?)');
//    $res2=$donnée2->execute(array(@$_POST['nom_prof'],@$_POST['pren_prof'],@$_POST['tel_prof'],@$_POST['adresse_prof'],@$_POST['email_prof']));   
//        //
//          $donnée21=$bd->prepare('SELECT * FROM `professeur`');
//          $res21=$donnée21->execute();
//           while($res21=$donnée21->fetch())
//            {
            
//                     if ($_POST['pren_prof']==$res21['pren_prof'] && $_POST['nom_prof']==$res21['nom_prof'] && $_POST['email_prof']==$res21['email_prof']) 
//                     {
//                          $id = $res21['id_prof'];
//                     } 
//            }
//        //
//     $donnée22=$bd->prepare('INSERT INTO  `prof_mod`(`id_prof`, `id_mod`)  VALUES (?,?)');
//    $res22=$donnée22->execute(array(@$id,@$_POST['matricule']));
//    //
//     $donnée23=$bd->prepare('INSERT INTO `prof_classe`(`id_prof`, `id_classe`)  VALUES (?,?)');
//    $res23=$donnée23->execute(array(@$id,@$_POST['classe']));
   
//  }

//  /*insertion de l'unite d'enseignement*/
   
//       $donnée3=$bd->prepare('INSERT INTO `u_e`(`lib_UE`, `code_UE`, `coef_UE`) VALUES (?,?,?)');
//    $res3=$donnée3->execute(array(@$_POST['libue'],@$_POST['codeue'],@$_POST['coefue']));

// /* verification de la connexion pour les formateurs*/

//  if(isset($_POST['VALIDER']))
//  { 
//      $donnée4=$bd->prepare('SELECT * FROM `professeur`');
//    $res4=$donnée4->execute();
//    while($res4=$donnée4->fetch())
//    {
//        if ($_POST['prenom']==$res4['pren_prof'] && $_POST['nom']==$res4['nom_prof'] && $_POST['matricule']==$res4['id_prof']) 
//        {
//            $verif=1;
//        } 
//    }
//    if(@$verif==1)
//    {
//        $_SESSION['pren-form']=$_POST['prenom'];
//        $_SESSION['nom-form']=$_POST['nom'];
//        $_SESSION['id-form']=$_POST['matricule'];
//    header('location:choix.php');
//    }
//    else
//    {
//        header('location:connect.php?echec=true');
//    }
//  }
//   /* requete d'adjonction d'un etudiant*/
//     $donnée5=$bd->prepare('INSERT INTO `etudiant`( `nom_etud`, `pren_etud`, `adress_etud`, `datenaiss_etud`, `lieu_etud`, `email_etud`, `tel_etud`, `id_classe`) VALUES (?,?,?,?,?,?,?,?)');
//    $res5=$donnée5->execute(array(@$_POST['nom_etud'],@$_POST['pren_etud'],@$_POST['adresse_etud'],@$_POST['date_etud'],@$_POST['lieu_etud'],@$_POST['email_etud'],@$_POST['tel_etud'],@$_POST['classe']));
//  //var_dump($res5);
//  /*requete d'adjonction d'une module */
  
//  if(isset($_POST['module']))
//  {

//     $donnée6=$bd->prepare('INSERT INTO `module`(`lib_mod`, `id_ue`, `id_coef`, `id_sem`) VALUES (?,?,?,?)');
//    $res6=$donnée6->execute(array(@$_POST['modu'],@$_POST['ue'],@$_POST['coef'],@$_POST['semestre']));
//    if($res6)
//    {
//        echo " c'est tres bien";
//    }
//     echo " module  :". $_POST['modu'].'<br>'; 
//     echo " coefficient  :". $_POST['coef'].'<br>';
//      echo " U - E   :" .$_POST['ue'].'<br>';
//      echo " SEMESTRE  : ". $_POST['semestre'].'<br>';
//  }
//  //requete de verification des choix des professeurs
// if(isset($_POST['choix']))
// {
//      $_SESSION['cours']=$_POST['cours'] ;
//      $_SESSION['classe']=  $_POST['classe'];
//      $_SESSION['eval']=  $_POST['eval'];
//    header('location: releve.php');

// }