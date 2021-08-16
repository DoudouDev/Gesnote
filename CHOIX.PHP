<?php

include("connection.php");
$prenom = @$_SESSION['pren-form'];
$nom = @$_SESSION['nom-form'];
$id = @$_SESSION['id-form'];

$donnee4 = $connect->prepare('SELECT * FROM `type_evaluation` WHERE 1 ');
$donnee4->execute();
$res4 = $donnee4->fetchAll();
$donnee5 = $connect->prepare('SELECT * FROM `semestre` WHERE 1 ');
$donnee5->execute();
$res5 = $donnee5->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .background {
        background-image: url("image/ipd.png");
        background-size: 340px;
        background-repeat: no-repeat;
        position: relative;
        left: 35px;
        top: 20px;
    }
    </style>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <br><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"> </div>
            <div class="col-xl-10 col-lg-12 col-md-9">
                <!--  -->
                <div class="card o-hidden border-0 shadow-primary my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-3">
                                    <div class="text-center">
                                        <center>
                                            <h2>Bienvenue : <?php echo ' ' . $prenom . ' ' . $nom; ?></h2>
                                        </center>
                                        <hr>
                                        <center>
                                            <h4>Veuillez préciser la Classe,la Matiére,le type d'évaluation et le
                                                semestre </h4>
                                        </center>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block background"> </div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> MATIERE & CLASSE</h1>
                                        <?php
                    if (isset($_GET['echec'])) {
                    ?>

                                        <center class="alert alert-warning"> Veuillez verifier vos choix </center>
                                        <?php

                    }
                    ?>
                                    </div>
                                    <form action="valid-ajout.php" method="POST" class="user">

                                        <div class="form-group">
                                            <!-- choix de la classe debut -->
                                            <select name="classe" id="" class=" custom-select mr-sm-5 test"
                                                id="inlineFormCustomSelect">
                                                <option selected>CLASSES </option>
                                                <?php
                        $donnee2 = $connect->prepare('SELECT * FROM `prof_classe` WHERE 1');
                        $donnee2->execute();
                        while ($res2 = $donnee2->fetch()) {
                          if (@$_SESSION['id-form'] == $res2['id_prof']) {
                            $donnee = $connect->prepare('SELECT * FROM `classe` WHERE `id_classe`=? ');
                            $donnee->execute(array($res2['id_classe']));
                            $res = $donnee->fetchAll();
                            foreach ($res as $res) : ?>
                                                <option value="<?= $res['id_classe'] ?>"> <?= $res['nom_classe'] ?>
                                                </option>
                                                <?php endforeach;
                          }
                        }
                        ?>
                                            </select>
                                        </div>
                                        <!-- choix de la classe fin -->
                                        <!-- choix de la matiere debut -->
                                        <div class="form-group">
                                            <select name="cours" id="" class="custom-select mr-sm-5 test"
                                                id="inlineFormCustomSelect">
                                                <option selected> MATIERES </option>
                                                <?php
                        $donnee1 = $connect->prepare('SELECT * FROM `prof_mod`');
                        $donnee1->execute();
                        while ($res1 = $donnee1->fetch()) {
                          if (@$_SESSION['id-form'] == $res1['id_prof']) {
                            $donnee3 = $connect->prepare('SELECT * FROM `module` WHERE `id_mod`=? ');
                            $donnee3->execute(array($res1['id_mod']));
                            $res3 = $donnee3->fetchAll();
                            foreach ($res3 as $res3) : ?>
                                                <option value="<?= $res3['id_mod'] ?>"> <?= $res3['lib_mod'] ?></option>
                                                <?php endforeach;
                          }
                        }
                        ?>
                                            </select>
                                        </div>
                                        <!-- choix de la matiere fin -->
                                        <div class="form-group">


                                            <select name="eval" id="" class="custom-select mr-sm-5 test "
                                                id="inlineFormCustomSelect">
                                                <option selected> EVALUATIONS</option>
                                                <?php foreach ($res4 as $res4) : ?>
                                                <option value="<?= $res4['nom_ev'] ?>"> <?= $res4['nom_ev'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">


                                            <select name="sem" id="" class="custom-select mr-sm-5 test "
                                                id="inlineFormCustomSelect">
                                                <option selected>SEMESTRE</option>
                                                <?php foreach ($res5 as $res5) : ?>
                                                <option value="<?= $res5['id_sem'] ?>"> <?= $res5['code_sem'] ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <input type="submit" value=" VALIDER" name="choix"
                                            class="btn btn-primary btn-user btn-block">

                                </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

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