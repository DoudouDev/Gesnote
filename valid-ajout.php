<?php

/*connexion a la base de donnée*/
include("connection.php");
/*preparation de la requete insert*/
// echo $_POST['libfil'];
//echo $_POST['codefil'];
/*insertion de la filieres*/
$donnée = $connect->prepare('INSERT INTO `filiere`( `libfil`, `codefil`) values(?,?)');
$res = $donnée->execute(array(@$_POST['libfil'], @$_POST['codefil']));
if ($res) {
    header('location:ajout-filiere.php?echec=true');
}

/*insertion de la classe*/

$donnée1 = $connect->prepare('INSERT INTO `classe`(`nom_classe`, `id_fil`, `id_niv`) VALUES (?,?,?)');
$res1 = $donnée1->execute(array(@$_POST['nomclasse'], @$_POST['filiere'], @$_POST['niveau']));
if ($res1) {
    header('location:ajout-classe.php?echec=true');
}


/*insertion du professeur*/
if (isset($_POST['prof'])) {
    $donnée2 = $connect->prepare('INSERT INTO `professeur`(`nom_prof`, `pren_prof`, `tel_prof`, `adresse`, `email_prof`) VALUES (?,?,?,?,?)');
    $res2 = $donnée2->execute(array(@$_POST['nom_prof'], @$_POST['pren_prof'], @$_POST['tel_prof'], @$_POST['adresse_prof'], @$_POST['email_prof']));
    //
    $donnée21 = $connect->prepare('SELECT * FROM `professeur`');
    $res21 = $donnée21->execute();
    while ($res21 = $donnée21->fetch()) {

        if ($_POST['pren_prof'] == $res21['pren_prof'] && $_POST['nom_prof'] == $res21['nom_prof'] && $_POST['email_prof'] == $res21['email_prof']) {
            $id = $res21['id_prof'];
        }
    }
    //
    $donnée22 = $connect->prepare('INSERT INTO  `prof_mod`(`id_prof`, `id_mod`)  VALUES (?,?)');
    $res22 = $donnée22->execute(array(@$id, @$_POST['matricule']));
    //
    $donnée23 = $connect->prepare('INSERT INTO `prof_classe`(`id_prof`, `id_classe`)  VALUES (?,?)');
    $res23 = $donnée23->execute(array(@$id, @$_POST['classe']));
    if ($res22) {
        header('location:ajout-prof.php?echec=true');
    }
    //
    $donnée24 = $connect->prepare('INSERT INTO  `mod_classe`(`id_mod`, `id_classe`)  VALUES (?,?)');
    $res24 = $donnée24->execute(array(@$_POST['matricule'], @$_POST['classe']));
}

/*insertion de l'unite d'enseignement*/
if (isset($_POST['ajout_ue'])) {
    $donnée3 = $connect->prepare('INSERT INTO `u_e`(`lib_UE`, `code_UE`, `coef_UE`) VALUES (?,?,?)');
    $res3 = $donnée3->execute(array(@$_POST['libue'], @$_POST['codeue'], @$_POST['coefue']));
    if ($res3) {
        header('location:ajout-UE.php?echec=true');
    }
}


/* verification de la connexion pour les formateurs*/

if (isset($_POST['VALIDER'])) {
    $donnée4 = $connect->prepare('SELECT * FROM `professeur`');
    $res4 = $donnée4->execute();
    while ($res4 = $donnée4->fetch()) {
        if ($_POST['prenom'] == $res4['pren_prof'] && $_POST['nom'] == $res4['nom_prof'] && $_POST['matricule'] == $res4['id_prof']) {
            $verif = 1;
        }
        if ($_POST['prenom'] == "admin" && $_POST['nom'] == "diakhate" && $_POST['matricule'] == 5) {
            $oui = 1;
        }
    }
    if ($oui == 1) {
        header('location:bureaus.php');
    } else {
        if (@$verif == 1) {
            $_SESSION['pren-form'] = $_POST['prenom'];
            $_SESSION['nom-form'] = $_POST['nom'];
            $_SESSION['id-form'] = $_POST['matricule'];
            header('location:choix.php');
        } else {
            header('location:index.php?echec=true');
        }
    }
}
if (isset($_POST['etd'])) {
    /* requete d'adjonction d'un etudiant*/
    $donnée7 = $connect->prepare('INSERT INTO etudiant ( `nom_etud`, `pren_etud`, `adress_etud`, `datenaiss_etud`, `lieu_etud`, `email_etud`, `tel_etud`, `id_classe`) VALUES (?,?,?,?,?,?,?,?) ');
    $res7 = $donnée7->execute(array($_POST['nom_etud'], $_POST['pren_etud'], $_POST['adresse_etud'], $_POST['date_etud'], $_POST['lieu_etud'], $_POST['email_etud'], @$_POST['tel_etud'], @$_POST['classe']));
    if ($res7) {
        header('location:liste-etudiant.php?etud=' . $_POST['id_classe'] . '&amp;echec=true');
    } else {
        echo "c'est pas bon";
    }
}
/*requete d'adjonction d'une module */

if (isset($_POST['module'])) {
    $donnée6 = $connect->prepare('INSERT INTO `module`(`lib_mod`, `id_ue`, `id_coef`, `credit`) VALUES (?,?,?,?)');
    $res6 = $donnée6->execute(array(@$_POST['modu'], @$_POST['ue'], @$_POST['coef'], @$_POST['credit']));
    if ($res6) {
        header('location:ajout-UE.php?echec=true');
    }
}
//requete de verification des choix des professeurs
if (isset($_POST['choix'])) {
    $test = 0;
    $donnee = $connect->prepare('SELECT * FROM `mod_classe` ');
    $res = $donnee->execute();
    while ($res = $donnee->fetch()) {
        if ($res['id_mod'] == $_POST['cours'] && $res['id_classe'] == $_POST['classe']) {
            $test = 1;
        }
    }

    if ($test != 1) {
        header('location:choix.php?echec=true');
    } else {
        $_SESSION['cours'] = $_POST['cours'];
        $_SESSION['classe'] =  $_POST['classe'];
        $_SESSION['eval'] =  $_POST['eval'];
        $_SESSION['mod'] =  $_POST['cours'];
        header('location: releve.php');
    }
}
// delete module

if (isset($_POST['delete'])) {

    $donnée2 = $connect->prepare('DELETE FROM `module` WHERE  `id_mod`=?');
    $res2 = $donnée2->execute(array(@$_POST['id']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        // header('location:modules.php?del=true');
    } else {
        header('location:modules.php?del=true');
    }
}
// update module

if (isset($_POST['module_update'])) {

    $donnée2 = $connect->prepare('UPDATE `module` SET `id_mod`=?,`lib_mod`=?,`id_ue`=?,`id_coef`=?,`credit`=? WHERE `id_mod`=?');
    $res2 = $donnée2->execute(array(@$_POST['id_modul'], @$_POST['modu'], @$_POST['ue'], @$_POST['coef'], @$_POST['credit'], @$_POST['id_modul']));
    $res2 = $donnée2->fetch();
    if ($res2) {

        // header('location:modules.php?del=true');
    } else {

        header('location:modules.php?upd=true');
    }
}
// delete u e

if (isset($_POST['delete_ue'])) {

    $donnée2 = $connect->prepare('DELETE FROM `u_e` WHERE  `id_UE`=?');
    $res2 = $donnée2->execute(array(@$_POST['id']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        // header('location:modules.php?del=true');
    } else {
        header('location:ajout-UE.php?del=true');
    }
}
// update ue

if (isset($_POST['ue_update'])) {

    $donnée2 = $connect->prepare('UPDATE  `u_e` SET `id_UE`=?,`lib_UE`=?,`code_UE`=?,`coef_UE`=? WHERE `id_UE`=?');
    $res2 = $donnée2->execute(array(@$_POST['id_ue'], @$_POST['libue'], @$_POST['codeue'], @$_POST['coefue'], @$_POST['id_ue']));
    $res2 = $donnée2->fetch();
    if ($res2) {

        // header('location:modules.php?del=true');
    } else {
        header('location:ajout-UE.php?upd=true');
    }
}

// delete u e

if (isset($_POST['delete_classe'])) {

    $donnée2 = $connect->prepare('DELETE FROM `classe` WHERE  `id_classe`=?');
    $res2 = $donnée2->execute(array(@$_POST['id']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        // header('location:modules.php?del=true');
    } else {
        header('location:ajout-classe.php?del=true');
    }
}
// delete u e

if (isset($_POST['delete_etudiant'])) {

    $donnée2 = $connect->prepare('DELETE FROM `etudiant` WHERE  `id_etud`=?');
    $res2 = $donnée2->execute(array(@$_POST['id']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        // header('location:modules.php?del=true');
    } else {
        header('location:liste-etudiant.php?etud=' . $_POST['id_classe'] . '&amp;del=true');
    }
}
// delete professeur

if (isset($_POST['delete_prof'])) {

    $donnée2 = $connect->prepare('DELETE FROM `professeur` WHERE  `id_prof`=?');
    $res2 = $donnée2->execute(array(@$_POST['id']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        // header('location:ajout-prof.php.php?del=true');
    } else {
        header('location:ajout-prof.php?del=true');
    }
}
// update ue

if (isset($_POST['etd_update'])) {

    $donnée2 = $connect->prepare('UPDATE  `etudiant` SET  `id_etud`=?,`nom_etud`=?,`pren_etud`=?,`adress_etud`=?,`datenaiss_etud`=?,`lieu_etud`=?,`email_etud`=?,`tel_etud`=?,`id_classe`=? WHERE `id_etud`=?');
    $res2 = $donnée2->execute(array(@$_POST['id_etud'], $_POST['nom_etud'], $_POST['pren_etud'], $_POST['adresse_etud'], $_POST['date_etud'], $_POST['lieu_etud'], $_POST['email_etud'], @$_POST['tel_etud'], @$_POST['id_classe'], @$_POST['id_etud']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        echo "c'est pas bon";
        // header('location:modules.php?del=true');
    } else {
        header('location:liste-etudiant.php?etud=' . $_POST['classe'] . '&amp;upd=true');
    }
}

// update ue

if (isset($_POST['update_prof'])) {

    $donnée2 = $connect->prepare('UPDATE  `professeur` SET  `id_prof`=?,`nom_prof`=?,`pren_prof`=?,`tel_prof`=?,`adresse`=?,`email_prof`=? WHERE `id_prof`=?');
    $res2 = $donnée2->execute(array(@$_POST['id_prof'], @$_POST['nom_prof'], @$_POST['pren_prof'], @$_POST['tel_prof'], @$_POST['adresse_prof'], @$_POST['email_prof'], @$_POST['id_prof']));
    $res2 = $donnée2->fetch();
    if ($res2) {
        echo "c'est pas bon";
        // header('location:modules.php?del=true');
    } else {
        header('location:ajout-prof.php?upd=true');
    }
}