<?php
include("connection.php");

/*connexion a la base de donnée*/

$donnee01 = $connect->prepare('SELECT * FROM `classe` WHERE `id_classe`=?');
$donnee01->execute(array(@$_SESSION['classe']));
$res01 = $donnee01->fetch();

$donnee1 = $connect->prepare('SELECT * FROM `etudiant` WHERE `id_classe`=?');
$donnee1->execute(array(@$res01['nom_classe']));
$res1 = $donnee1->fetchAll();

$donnee2 = $connect->prepare('SELECT * FROM `module`');
$donnee2->execute();
while ($res2 = $donnee2->fetch()) {

  if (@$_SESSION['cours'] == @$res2['id_mod']) {
    @$module = $res2['lib_mod'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Releve des notes </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <style>
        .tab
        {
            position:relative;
            top:50px;
            font-size:18px;
            left:27%;
            /* margin:50px; */
        }
        .tab td,th
        {
          padding:-10px;
            font-weight:bold;
            text-align:center;
        }
        .bout
        {
            position:relative;
            top:70px;
            left:70%;
        }
        .val
        {
            position:relative;
            top:5px;
            left:-480px;
        }
        .val1
        {
            position:relative;
            top:-45px;
            left:0px;
        }
    </style> -->

</head>

<body style="color: white;">

    <div class="container">

        <!-- Outer Row -->
        <div>


            <!-- <hr><h1>  <center>page des releves de notes </center> </h1>  <hr> -->
            <!-- <h2> <?php echo @$_SESSION['eval'] . ' : ' . @$res01['nom_classe'];  ?>  </h2> -->
            <!-- <h2> epreuve : <?php echo @$module;  ?>  </h2> -->
            <br><br><br>

            <form action="valid-note.php" method="POST">

                <?php

        if ($_SESSION['eval'] == "EXAMEN-THEORIQUE") {
        ?>
                <!--  -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <center>
                            <h3 class="m-0 font-weight-bold text-primary">
                                <?php echo @$_SESSION['eval'] . ' : ' . @$res01['nom_classe'];  ?> /
                                <?php echo @$module;  ?></h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">ANONYMATS</th>
                                        <th style="text-align:center;">NOTES / 20 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php @$cpt;
                    foreach ($res1 as $res1) : @$cpt++;  ?>
                                    <input type="hidden" name="<?= $cpt ?>" value="<?= $res1['id_etud'] ?>" id="">
                                    <input type="hidden" name="classe" value="<?= $_SESSION['classe'] ?>" id="">
                                    <input type="hidden" name="eval" value="<?= $_SESSION['eval'] ?>" id="">
                                    <input type="hidden" name="mod" value="<?= $module ?>" id="">
                                    <tr>
                                        <td style="text-align:center;">
                                            IPD_<?= $res1['id_etud'] ?> <br>
                                        </td>

                                        <td style="text-align:center;">
                                            <input type="number" min="0" max="20" name=" <?= $cpt ?>" id=""
                                                required="required"> <br>
                                        </td>

                                    </tr>

                                    <?php endforeach; ?>

                                    <?php $_SESSION['compteur'] = @$cpt;  ?>


                                </tbody>

                            </table>
                            <input type="submit" value="VALIDER" name="noter" id="" class="btn btn-primary btn-lg bout">
                        </div>
                    </div>
                </div>
                <!--  -->

                <?php
        } elseif ($_SESSION['eval'] == "DEVOIR" || $_SESSION['eval'] == "TD" || $_SESSION['eval'] == "TP" || $_SESSION['eval'] == "RATTRAPAGE" || $_SESSION['eval'] = "EXAMEN-PRATIQUE") {
        ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <center>
                            <h3 class="m-0 font-weight-bold text-primary">
                                <?php echo @$_SESSION['eval'] . ' : ' . @$res01['nom_classe'];  ?> /
                                <?php echo @$module;  ?></h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">N°</th>
                                        <th style="text-align:center;">Prénoms</th>
                                        <th style="text-align:center;">Noms</th>
                                        <th style="text-align:center;">Notes/20</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php @$cpt;
                    foreach ($res1 as $res1) : @$cpt++;  ?>
                                    <input type="hidden" name="<?= $cpt ?>" value="<?= $res1['id_etud'] ?>" id="">
                                    <input type="hidden" name="classe" value="<?= $_SESSION['classe'] ?>" id="">
                                    <input type="hidden" name="eval" value="<?= $_SESSION['eval'] ?>" id="">
                                    <input type="hidden" name="mod" value="<?= $module ?>" id="">
                                    <tr>
                                        <td style="text-align:center;">
                                            <?= $cpt; ?> <br>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $res1['pren_etud'] ?> <br>
                                        </td>

                                        <td style="text-align:center;">
                                            <?= $res1['nom_etud'] ?> <br>
                                        </td>
                                        <td style="text-align:center;">
                                            <input type="number" min="0" max="20" name=" <?= $cpt ?>" id=""
                                                required="required"> <br>
                                        </td>

                                    </tr>

                                    <?php endforeach; ?>

                                    <?php $_SESSION['compteur'] = @$cpt;  ?>


                                </tbody>

                            </table>

                            <input type="submit" value="VALIDER" name="noter" id=""
                                class="btn btn-primary btn-lg bout ">
                        </div>
                    </div>
                    </td>
                    <?php $_SESSION['compteur'] = @$cpt;  ?>
                    <?php
        }
          ?>
            </form>
            <?php
      if (isset($_GET['echec'])) {
      ?>
            <center class="val">
                <h3> les notes sont bien enregistrées </h3>
            </center>
            <?php
      }
      ?>
            <?php
      if (isset($_GET['echec'])) {
      ?>
            <h2> <a href="deconnect.php" class="val1"> DECONNECTION </a></h2>
            <?php
      }
      ?>
            <?php
      if (isset($_GET['ver'])) {
      ?>
            <center class="val">
                <h3> les notes sont deja enregistrées </h3>
            </center>
            <?php
      }
      ?>

        </div>
    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>