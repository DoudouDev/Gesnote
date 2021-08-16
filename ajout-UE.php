<?php
include('connection.php');
$donnee1=$connect->prepare('SELECT * FROM `coef`');
   $res1= $donnee1->execute();
   $res1=$donnee1->fetchAll();

   $donnee3=$connect->prepare('SELECT * FROM `u_e`');
   $res3= $donnee3->execute();
   $res3=$donnee3->fetchAll();

   $donnee2 = $connect->prepare('SELECT count(*) FROM `u_e`');
   $res2 = $donnee2->execute();
   $res2 = $donnee2->fetch();
   @$nbr2 = $res2[0];

  //  $donnee11=$connect->prepare('SELECT * FROM `coef`');
  //  $res11= $donnee11->execute();
  //  $res11=$donnee11->fetchAll();

  //   $donnee12=$connect->prepare('SELECT * FROM `coef`');
  //  $res12= $donnee12->execute();
  //  $res12=$donnee12->fetchAll();

  //  $donnee2=$connect->prepare('SELECT * FROM `u_e`');
  //  $res2= $donnee2->execute();
  //  $res2=$donnee2->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

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



  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une Unité d'enseignement</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
             <form action="valid-ajout.php" method="POST">
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label">U E</label>
              <div class="col-sm-9">
            <input type="text" class="form-control"  name ="libue" id="libue">
            </div>
         </div>
         <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label">Code UE</label>
             <div class="col-sm-9">
            <input type="text" class="form-control"  name ="codeue" id="codeue">
            </div>
          </div>

          <div class="form-group row">
               <label for="recipient-name" class="col-sm-3 col-form-label">COEFFICIENT</label>
                <div class="col-sm-9">
             <select name="coefue" id="" class="custom-select" >
                      <?php foreach ($res1 as $res1):?>
                  <option value="<?= $res1['id_coef'] ?>"> <?= $res1['coef'] ?></option>
                      <?php endforeach;?>
                      </select>
                      </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" value=" envoyer"  name="ajout_ue" >VALIDER</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">FERMER</button>
        </div>
        </form>
        </div>

      </div>
    </div>
  </div>



            <!--  -->


            <!-- modal update / Debut -->
            <div class="modal fade" id="editmodal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modifier une Unité d'enseignement</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                       <form action="valid-ajout.php" method="POST" id="form-update-module">
                    <div class="form-group row">
                      <label for="recipient-name" class="col-sm-3 col-form-label">U E</label>
                        <div class="col-sm-9">
                      <input type="text" class="form-control"  name ="libue" id="libue">
                      <input type="hidden" name="id_ue" id="id_ue"  class="form-control" >
                      </div>
                   </div>
                   <div class="form-group row">
                      <label for="recipient-name" class="col-sm-3 col-form-label">Code UE</label>
                       <div class="col-sm-9">
                      <input type="text" class="form-control"  name ="codeue" id="codeue">
                      </div>
                    </div>

                    <div class="form-group row">
                         <label for="recipient-name" class="col-sm-3 col-form-label">Coefficient</label>
                          <div class="col-sm-9">
                       <select name="coefue" id="coefue" name="coefue" class="custom-select" >
                                <?php
                                $donnee1=$connect->prepare('SELECT * FROM `coef`');
                                $res1= $donnee1->execute();
                                $res1=$donnee1->fetchAll();
                                foreach ($res1 as $res1):?>
                            <option value="<?= $res1['id_coef'] ?>"> <?= $res1['coef'] ?></option>
                                <?php endforeach;?>
                                </select>
                                </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  name="ue_update">VALIDER</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">FERMER</button>
                  </div>
                  </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- modal update / Fin -->

            <!-- modal detail / Debut -->
            <div class="modal fade" id="detailmod">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Informations détaillées de l'UE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                       <!-- <form action="valid-ajout.php" method="POST" id="form-detail-module"> -->
                    <div class="form-group row">
                      <label for="recipient-name" class="col-sm-3 col-form-label">U E</label>
                        <div class="col-sm-9" >
                          <label  class="" id="nom_detail"></label>
                       </div>
                   </div>
                    <div class="form-group row">
                         <label for="recipient-name" class="col-sm-3 col-form-label">CODE UE</label>
                          <div class="col-sm-9">
                          <label  class="col-sm-3 col-form-label" id="ue_detail"></label>
                                </div>
                    </div>
                   <div class="form-group row">
                         <label for="recipient-name" class="col-sm-3 col-form-label">COEF</label>
                          <div class="col-sm-9">
                          <label  class="col-sm-3 col-form-label" id="coef_detail"> </label>
                          </div>
                    </div>

                  <!-- </form> -->

                  </div>


                </div>
              </div>
            </div>
            <!-- modal detail / Fin -->

            <!-- modal delete-->
            <div class="modal fade" id="deletemodal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Supprimer une U E</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="valid-ajout.php" method="POST" id="form-delete-module">
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="delete_id" id="delete_id" required>
                          <h5> Voulez vous vraiment supprimer ce U E ?</h5>
                          <input type="hidden" name="id" >
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ANNULER</button>
                        <button type="submit" form="form-delete-module" class="btn btn-primary" name="delete_ue">OUI, SUPPRIMER</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!--  -->
          </div>
          <!-- debut  -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="container">
             <div class="row">
                  <div class="col-sm-2 bg-dark">
                  <center><a class="btn" data-toggle="modal" data-target="#myModal" > <i class="fa fa-plus-square" style="color:white"> Ajouter </i></a> </center>
                  </div>
                  <div class="col-sm-10"> <center>
                   <h3 class="m-0 font-weight-bold text-primary">Les informations concernant <?php echo @$nbr2;  ?> U E</h3> </center>
                  </div>
              </div>
          </div>
            </div>
            <?php
            if (isset($_GET['echec'])) {
            ?>
              <div class="alert alert-success" role="alert">
                <center class="test">
                  <h5> U E enregistrée </h5>
                </center>
              </div>
            <?php
            }
            ?>

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
            if (isset($_GET['upd'])) {
            ?>
              <div class="alert alert-success" role="alert">
                <center class="test">
                  <i class="fa fa-edit" ></i> <h5> Modification réussie  </h5>
                </center>
              </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['verif'])) {
            ?>
              <div class="alert alert-warning" role="alert">
                <center class="test">
                  <h5> Ce module est deja enregistré </h5>
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
                      <th style="text-align:center;">Details </th>
                      <th style="text-align:center;">U E</th>
                      <th style="text-align:center;">Modifier</th>
                       <th style="text-align:center;">Supprimer</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($res3 as $res3) :?>
                      <tr>
                      <td style="text-align:center;"> <a type="button" class="btn "  data-nom-detail="<?= @$res3['lib_UE'] ?>" data-nom-ue="<?= @$res3['code_UE'] ?>"  data-coef="<?= @$res3['coef_UE'] ?>" onclick="Details(this);"> <i class="fa fa-eye" style="color:blue" data-toggle="tooltip" title="Infos"> </i>  </a></td>
                        <td style="text-align:center;"><?= @$res3['lib_UE'] ?> </td>
                        <td style="text-align:center;"> <a type="button" class="btn " data-id-ue ="<?= @$res3['id_UE'] ?>" data-nom-ue="<?= @$res3['lib_UE'] ?>"  data-code-ue="<?= @$res3['code_UE'] ?>"  data-coef-ue="<?= @$res3['coef_UE']  ?>"  onclick="confirmUpdate(this);"> <i class="fa fa-edit" style="color:green" data-toggle="tooltip" title="Modifier"> </i>  </a></td>
                       <td style=" text-align:center;"><a type="button" class="btn " data-id ="<?= @$res3['id_UE'] ?>" onclick="confirmDelete(this);"><i class="fa fa-trash" style="color:red" data-toggle="tooltip" title="Supprimer"> </i> </a> </td>
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
   function confirmDelete(self) {
      var id = self.getAttribute("data-id");
      document.getElementById("form-delete-module").id.value = id;
      $("#deletemodal").modal("show");

   }
   function confirmUpdate(self) {
      var id_ue = self.getAttribute("data-id-ue");
      var libue = self.getAttribute("data-nom-ue");
      var codeue = self.getAttribute("data-code-ue");
      var coefue = self.getAttribute("data-coef-ue");


      document.getElementById("form-update-module").id_ue.value = id_ue ;
      document.getElementById("form-update-module").libue.value = libue;
      document.getElementById("form-update-module").codeue.value = codeue;
      document.getElementById("form-update-module").coefue.value = coefue;

      $("#editmodal").modal("show");

   }

   function Details(self) {

        var nom_detail = self.getAttribute("data-nom-detail");
         var ue =  self.getAttribute("data-nom-ue");
        var coef = self.getAttribute("data-coef");

        document.getElementById("nom_detail").innerHTML = nom_detail;
        document.getElementById("ue_detail").innerHTML = ue;
        document.getElementById("coef_detail").innerHTML = coef;


        $("#detailmod").modal("show");

     }
   </script>

</body>

</html>
