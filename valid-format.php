<?php
session_start();
$prenom = $_SESSION['pren-form'];
$nom = $_SESSION['nom-form'];
$id = $_SESSION['id-form'];
/*connexion a la base de donnée*/
$connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
$donnee = $connect->prepare('SELECT `id-mod`, `id-classe`, `vol-hor`, `id-user`, `id-cours`, `date-deb`, `date-fin` FROM `module` WHERE `id-user`=? ');
$donnee1 = $connect->prepare('SELECT `id-mod`, `id-classe`, `vol-hor`, `id-user`, `id-cours`, `date-deb`, `date-fin` FROM `module` WHERE `id-user`=? ');
$donnee->execute(array($id));
$donnee1->execute(array($id));
$res = $donnee->fetchAll();
$res1 = $donnee1->fetchAll();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="valid-new-index.css" />
    <script src="main.js"></script>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <center>
        <h1>Bienvenue <?php echo ' ' . $prenom . ' ' . $nom; ?></h1>
    </center>
    <form action="valid-formateur.php" method="POST">
        <fieldset>
            <legend>
                MATIERE & CLASSE
            </legend>
            <div class="format">


                <select name="cours" id="">
                    <option> MATIERE</option>
                    <?php foreach ($res as $res) : ?>
                    <option value="<?= $res['id-cours'] ?>"> <?= $res['id-cours'] ?></option>
                    <?php endforeach; ?>


                </select>
                <select name="classe" id="">
                    <option> CLASSE </option>
                    <?php foreach ($res1 as $res1) : ?>
                    <option value="<?= $res1['id-classe'] ?>"> <?= $res1['id-classe'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value=" VALIDER">
            </div>
        </fieldset>
    </form>

</body>

</html>