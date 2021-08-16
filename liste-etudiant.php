<?php
include('connection.php');
   /*requete de selection des donnée*/
 $donnee1=$connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `classe`.`id_classe`=?  ');
 $res1=$donnee1->execute(array(@$_GET['etud']));
 $res1=$donnee1->fetchAll();
  $donnee2=$connect->prepare('SELECT * FROM `classe`  WHERE  `id_classe`=? ');
 $res2=$donnee2->execute(array(@$_GET['etud']));
 $res2=$donnee2->fetch();
 $_SESSION['classe']=$res2['nom_classe'];
  $donnee3=$connect->prepare('SELECT * FROM `etudiant`  WHERE  `id_etud`=? ');
 $res3=$donnee3->execute(array(@$_GET['detail']));
 $res3=$donnee3->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Page de l'administrateur</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="bureaus.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>1</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="bureaus.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Bureau Admin</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link" href="promotion.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Promotions</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link" href="ajout-filiere.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Filieres</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link" href="ajout-classe.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Classes</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link" href="ajout-UE.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>U - E</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link" href="ajout-prof.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Professeurs</span></a>
      </li>
     <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Utilisateurs</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
    <div class="container "   class="sidebar-toggle-box" >
   <div class="row">
    <!-- begin modal insertion etudiant -->
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Ajouter un étudiant</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                 <form action="valid-ajout.php" method="POST" id="form-add-classe">
              <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Prénom</label>
                  <div class="col-sm-10">
                <input type="text" class="form-control"  name ="pren_etud" id="prenom" required>
                </div>
             </div>
             <!--  -->
             <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Nom</label>
                 <div class="col-sm-10">
                <input type="text" class="form-control"  name ="nom_etud" id="nom" required>
                </div>
              </div>
              <!--  -->
             <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Naissance</label>
                <div class="col-sm-10">
                <input type="date" class="form-control"  name ="date_etud" id="date" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Lieu</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  name ="lieu_etud" id="lieu" required>
                </div>
                </div>
                <!--  -->
             <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  name ="adresse_etud" id="adresse" required>
                </div>
                </div>
                <!--  -->
             <div class="form-group row">
                  <label for="recipient-name" class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  name ="tel_etud" id="telephone" required>
                </div>
               </div>
               <!--  -->
             <div class="form-group row">
                  <label for="recipient-name" class="col-sm-2 col-form-label">E - mail</label>
                 <div class="col-sm-10">
                <input type="text" class="form-control"  name ="email_etud" id="email" required>
                <input type="hidden" name="classe" id="nom_classe">
                <input type="hidden" name="id_classe" id="id_classe">
                </div>
                </div>

              <div class="modal-footer">
              <button type="submit" class="btn btn-primary"  name="etd" >VALIDER</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">FERMER</button>
            </div>
            </form>
            </div>

          </div>
        </div>
      </div>
    <!-- end modal insertion etudiant -->
    <!-- modal detail / Debut -->
    <div class="modal fade" id="detailmod">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-primary text-white " style="text-align:center;">
           <h4 class="modal-title" >Informations détaillées d'une U E</h4>
            <button type="button" class="close white" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">

          <!--  -->
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col"> <center> Infos Personnelles </center></th>
                <th scope="col"> <center> Infos Scolaire </center></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                <div class="text-center">
                  <img src="img/mee.png" class="rounded " alt="Doudou leye diakhate" width="150">
                </div>
                <hr>
                   <div class="form-group row">
                      <label for="recipient-name" class="col-sm col-form-label">Prénom : <span id="prenom_etud" style="color:blue;"></span></label>
                   </div>
                   <!--  -->
                   <div class="form-group row">
                      <label for="recipient-name" class="col-sm col-form-label">Nom :  <span id="nom_etud" style="color:blue;"></span></label>
                    </div>
                    <!--  -->
                   <div class="form-group row">
                      <label for="recipient-name" class="col-sm col-form-label">Naissance : <span id="naissance_etud" style="color:blue;"></span></label>
                    </div>
                    <!--  -->
                    <div class="form-group row">
                      <label for="recipient-name" class="col-sm col-form-label">Lieu : <span id="lieu_etud" style="color:blue;"></span></label>
                    </div>
                      <!--  -->
                   <div class="form-group row">
                      <label for="recipient-name" class="col-sm col-form-label">Adresse : <span id="adresse_etud" style="color:blue;"></span></label>
                    </div>
                      <!--  -->
                   <div class="form-group row">
                          <label for="recipient-name" class="col-sm col-form-label">Téléphone : <a  style="text-decoration:none;color:blue;" href="tel:+"> <span id="telephone_etud"></span> </a></label>
                    </div>
                     <!--  -->
                     <div class="form-group row">
                      <label for="recipient-name" class="col-sm col-form-label">E-mail : <a href="mailto:" style="text-decoration:none;color:blue;"> <span id="email_etud"></span> </label>
                    </div>
                </th>
                <td>
                     <?php
                     $a=0;
                     while ($a <= 10) {
                      echo " Relevé de note N° : ".$a.'</br> </br>';
                      $a++;
                     }

                     ?>
                </td>

              </tr>
            </tbody>
          </table>

          <!--  -->
          </div>


        </div>
      </div>
    </div>
    <!-- modal detail / Fin -->
    <!-- begin modal update etudiant -->
      <!-- The Modal -->
      <div class="modal fade" id="editmodal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modifier un étudiant</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                 <form action="valid-ajout.php" method="POST" id="form-update-classe">
              <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Prénom</label>
                  <div class="col-sm-10">
                <input type="text" class="form-control"  name ="pren_etud" id="prenom_etud" >
                <input type="hidden" class="form-control"  name ="id_etud" id="id_etud">
                </div>
             </div>
             <!--  -->
             <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Nom</label>
                 <div class="col-sm-10">
                <input type="text" class="form-control"  name ="nom_etud" id="nom_etud">
                </div>
              </div>
              <!--  -->
             <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Naissance</label>
                <div class="col-sm-10">
                <input type="date" class="form-control"  name ="date_etud" id="date_etud" required >
                </div>
              </div>
              <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Lieu</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  name ="lieu_etud" id="lieu_etud" >
                </div>
                </div>
                <!--  -->
             <div class="form-group row">
                <label for="recipient-name" class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  name ="adresse_etud" id="adresse_etud" >
                </div>
                </div>
                <!--  -->
             <div class="form-group row">
                  <label for="recipient-name" class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  name ="tel_etud" id="telephone_etud">
                </div>
               </div>
               <!--  -->
             <div class="form-group row">
                  <label for="recipient-name" class="col-sm-2 col-form-label">E - mail</label>
                 <div class="col-sm-10">
                <input type="text" class="form-control"  name ="email_etud" id="email_etud" >
                <input type="hidden" name="id_classe" id="id_classe">
                <input type="hidden" name="classe" id="classe">
                </div>
                </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary"  name="etd_update" >VALIDER</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">FERMER</button>
            </div>
            </form>
            </div>

          </div>
        </div>
      </div>
    <!-- end modal update etudiant -->
    <!-- modal delete-->
    <div class="modal fade" id="deletemodal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-danger text-white">
            <h4 class="modal-title">Supprimer d'étudiant</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form action="valid-ajout.php" method="POST" id="form-delete-module">
              <div class="form-group row">
                <div class="col-sm-10">
                <h5> Voulez vous vraiment supprimer ?</h5>
                   <input type="hidden" name="id" >
                   <input type="hidden" name="id_classe" id="id_classe">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ANNULER</button>
                <button type="submit" form="form-delete-module" class="btn btn-primary" name="delete_etudiant">OUI, SUPPRIMER</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!--  -->


  </div>
   </div>
  <!--  -->
<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

            <div class="container">
             <div class="row">
                 <div class="col-sm-3 bg-dark">
                   <center><a class="btn"  data-nom-classe ="<?= @$res2['nom_classe'] ?>"  data-id-classe ="<?= @$res2['id_classe'] ?>" onclick="AddEtudiant(this);" > <i class="fa fa-plus-square" style="color:white"> Ajouter Etudiant</i></a></center>
                  </div>
                  <div class="col-sm-9">
                  <center> <h3 class="m-0 font-weight-bold text-primary">Liste des étudiants de la classe de : <b><?php echo @$res2['nom_classe'];?> </b></h3> </center>
                  </div>
          </div>
        </div>
            </div>
            <?php
            if (isset($_GET['del'])) {
            ?>
              <div class="alert alert-success" role="alert">
                <center class="test">
                  <i class="fa fa-trash" > </i> <h5> Suppression réussie  </h5>
                </center>
              </div>
            <?php
            }
            ?>
             <?php
            if (isset($_GET['echec'])) {
            ?>
              <div class="alert alert-success" role="alert">
                <center class="test">
                  <h5>  Ajout réussi </h5>
                </center>
              </div>
            <?php
            }
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Prénom</th>
                      <th style="text-align:center;">Nom</th>
                      <th style="text-align:center;">Adresse</th>
                      <th style="text-align:center;">+ Détails</th>
                      <th style="text-align:center;">Relevé</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($res1 as $res1):
                    ?>
                <tr>
                      <td style="text-align:center;"><?=$res1['pren_etud']?></td>
                      <td style="text-align:center;"><?=$res1['nom_etud']?></td>
                      <td style="text-align:center;"><?=$res1['adress_etud']?></td>
                        <td style="text-align:center;">
                        <a  type="button" class="btn " data-prenom ="<?=@$res1['pren_etud']?>" data-nom ="<?=@$res1['nom_etud']?>"  data-naissance ="<?=@$res1['datenaiss_etud']?>" data-lieu ="<?=@$res1['lieu_etud']?>"  data-adresse ="<?=@$res1['adress_etud']?>" data-telephone ="<?=@$res1['tel_etud']?>" data-email ="<?=@$res1['email_etud']?>" onclick="Details(this);"><i class="fa fa-eye" style="color:blue" data-toggle="tooltip" title="Infos"> </i> </a>
                        <a type="button" class="btn "  data-id-etud ="<?=@$res1['id_etud']?>" data-id-classe ="<?=@$res2['nom_classe']?>" data-classe ="<?=@$res2['id_classe']?>" data-prenom ="<?=@$res1['pren_etud']?>" data-nom ="<?=@$res1['nom_etud']?>"  data-naissance ="<?=@$res1['datenaiss_etud']?>" data-lieu ="<?=@$res1['lieu_etud']?>"  data-adresse ="<?=@$res1['adress_etud']?>" data-telephone ="<?=@$res1['tel_etud']?>" data-email ="<?=@$res1['email_etud']?>"  onclick="confirmUpdate(this);"> <i class="fa fa-edit" style="color:green" data-toggle="tooltip" title="Modifier"> </i>  </a>
                           <a type="button" class="btn " data-id ="<?= @$res1['id_etud']?>" data-id-classe ="<?=@$_GET['etud']?>" onclick="confirmDelete(this);"><i class="fa fa-trash" style="color:red" data-toggle="tooltip" title="Supprimer"> </i> </a>
                        </td>
                        <td style="text-align:center;"><a href="cal.php?etud=<?=@$res1['id_etud'] ?>"><button class="btn btn-primary"> Notes</button> </a></td>

                       <td style="text-align:center;"><a href="fpdf/test.php?etud=<?=@$res1['id_etud'] ?>"><button class="btn btn-primary"> Notes</button> </a></td>
                    </tr>
                    <?php
                   endforeach;

                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
<div class="modal fade" id="myModalclasse">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un étudiant</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <?php echo $_GET['etud'];?>
          lorem
        </div>
      </div>
    </div>
  </div>
      </div>

<!--  -->
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <h6>Copyright &copy; IPD-GCS <?php echo date("Y"); ?> Prod By <b> <a href="#" data-toggle="tooltip" title="Doudou Leye Diakhate: Analyste et Programmeur.
              Vous pouvez me contactez par email: diakhateleye96.gmail.com  ou par téléphone au: 781240307. Merci"> DLD</a> </b></h6>
              </div>
            </div>
          </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php include("foo.php");?>

  <script>
     function AddEtudiant(self) {
        var nom_classe = self.getAttribute("data-nom-classe");
        var id_classe = self.getAttribute("data-id-classe");
        document.getElementById("form-add-classe").nom_classe.value = nom_classe;
        document.getElementById("form-add-classe").id_classe.value = id_classe;
        $("#myModal").modal("show");

     }
     function confirmDelete(self) {
        var id = self.getAttribute("data-id");
        var id_classe = self.getAttribute("data-id-classe");
        document.getElementById("form-delete-module").id.value = id;
        document.getElementById("form-delete-module").id_classe.value = id_classe;
        $("#deletemodal").modal("show");

     }
     function confirmUpdate(self) {
        var id_etud = self.getAttribute("data-id-etud");
        var prenom_etud = self.getAttribute("data-prenom");
         var nom_etud =  self.getAttribute("data-nom");
        // var naissance_etud = self.getAttribute("data-naissance");
        var lieu_etud = self.getAttribute("data-lieu");
         var adresse_etud =  self.getAttribute("data-adresse");
        var telephone_etud = self.getAttribute("data-telephone");
        var email_etud = self.getAttribute("data-email");
        var id_classe = self.getAttribute("data-id-classe");
        var classe = self.getAttribute("data-classe");

        document.getElementById("form-update-classe").id_etud.value = id_etud ;
        document.getElementById("form-update-classe").prenom_etud.value = prenom_etud;
        document.getElementById("form-update-classe").nom_etud.value = nom_etud;
        // document.getElementById("form-update-classe").naissance_etud.value = naissance_etud;
        document.getElementById("form-update-classe").lieu_etud.value = lieu_etud;
        document.getElementById("form-update-classe").adresse_etud.value = adresse_etud;
        document.getElementById("form-update-classe").telephone_etud.value = telephone_etud;
        document.getElementById("form-update-classe").email_etud.value = email_etud;
        document.getElementById("form-update-classe").id_classe.value = id_classe;
        document.getElementById("form-update-classe").classe.value = classe;

        $("#editmodal").modal("show");

     }

     function Details(self) {

          var prenom_etud = self.getAttribute("data-prenom");
           var nom_etud =  self.getAttribute("data-nom");
          var naissance_etud = self.getAttribute("data-naissance");
          var lieu_etud = self.getAttribute("data-lieu");
           var adresse_etud =  self.getAttribute("data-adresse");
          var telephone_etud = self.getAttribute("data-telephone");
          var email_etud = self.getAttribute("data-email");

          document.getElementById("prenom_etud").innerHTML = prenom_etud;
          document.getElementById("nom_etud").innerHTML = nom_etud;
          document.getElementById("naissance_etud").innerHTML = naissance_etud;
          document.getElementById("lieu_etud").innerHTML = lieu_etud;
          document.getElementById("adresse_etud").innerHTML = adresse_etud;
          document.getElementById("telephone_etud").innerHTML = telephone_etud;
          document.getElementById("email_etud").innerHTML = email_etud;

          $("#detailmod").modal("show");

       }
  </script>

</body>

</html>
