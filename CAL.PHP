<?php
 include('connection.php');

                         $etd = $_GET['etud'];
      $donnee3=$connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
 $res3=$donnee3->execute(array(@$_GET['etud']));
     $donnee3->execute();
   $res3=$donnee3->fetchAll();
 $donnee31=$connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
     $donnee31->execute(array( @$_GET['etud']));
   $res31=$donnee31->fetchAll();
    $donnee4=$connect->prepare('SELECT * FROM `classe` WHERE `nom_classe`=? ');
     $donnee4->execute(array( $_SESSION['classe']));
     $res4=$donnee4->fetch();
      $id=$res4['id_classe'];


?>
  <page>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
 <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="main.js"></script>
</head>
<body>
  <div>


  </div>

<br>
  <div class="container">
   <div class="table-responsive-sm" >


  <table class="table table-bordered  table-sm " >
  <thead class="thead-dark " >
    <tr>
      <th scope="col" rowspan="2" style="text-align:center;" > <span  style="position:relative;top:-20px;" > Codes </span></th>
      <th scope="col" rowspan="2"style="text-align:center" ><span style="position:relative;top:-20px;">  Modules </span></th>
      <th scope="col" rowspan="2"style="text-align:center"> <span style="position:relative;top:-20px;">  Coef </span></th>
      <th scope="col" colspan="3"style="text-align:center">Notes</th>

      <th scope="col"  rowspan="2"style="text-align:center"><span style="position:relative;top:-20px;">  Crédit</span></th>
    </tr>
    <tr>
        <th scope="col"style="text-align:center">Devoir</th>
      <th scope="col"style="text-align:center">Examen</th>
      <th scope="col"style="text-align:center">Moyenne</th>
    </tr>
  </thead>
  <tbody>



  <?php
      $donnee=$connect->prepare('SELECT * FROM `u_e`');
                $donnee->execute();
             $c=10;
             $d=0;
               $cpt=100;
               $tcredit=0;
                while($res31=$donnee->fetch())
                {
                 // var_dump($res31);
                  $c++;
                  $d++;
                 $e=1;
                   $cpt=$c;
                   $credit=0;

                  ?>
                     <tr>
                      <td  colspan="2" style="text-align:center;font-weight:bolder"> <?=  $res31['code_UE']. " - ".  $c ." - "?> <?=  $res31['lib_UE']?></td>
                      <td></td>
                      <td  colspan="3" ></td>
                      <td></td>
                      </tr>
                  <?php
                   @$not=0;

                               $donnee1=$connect->prepare('SELECT * FROM `mod_classe` WHERE `id_classe`=?  ');
                                  $donnee1->execute(array($id));
                                   @$MU=0;
                                   @$CO=0;
                   while($res1=$donnee1->fetch())
                  {

                        $donnee5=$connect->prepare('SELECT * FROM `module`  WHERE `id_mod`=? AND `id_ue`=? ');
                          $donnee5->execute(array($res1['id_mod'], $res31['id_UE']));
                          $res5=$donnee5->fetch();
                            if($res5)
                            {

                              $donnees=$connect->prepare('SELECT * FROM `note`  WHERE `id_etud`=? AND `mod`=? ');
                                  $donnees->execute(array($etd,$res5['lib_mod']));

                                   while($etu=$donnees->fetch() )
                                   {

                                     if(@$etu['id_etud']==$etd)
                                     {
                                         $not++;
                                            if($etu['id_evalu']=="EXAMEN-THEORIQUE" || $etu['id_evalu']=="EXAMEN-PRATIQUE")
                                            {
                                                $notexa = $etu['note'];
                                               ?>
                                                  <tr>
                                                    <th scope="row" style="text-align:center"><?php echo  $cpt."".$e;?></th>
                                                    <td style="text-align:center"><?php echo  $res5['lib_mod'];?></td>
                                                    <td style="text-align:center"><?php echo  $res5['id_coef'];?></td>
                                                    <td style="text-align:center"> <?php echo  @$notedev;?></td>
                                                    <td style="text-align:center"> <?php echo  @$notexa;?></td>
                                                    <td style="text-align:center"> <?php  $mue = (@$notexa*0.6*$res5['id_coef']+@$notedev*0.4*$res5['id_coef'])/$res5['id_coef'];
                                                         echo number_format(@$mue ,2 );
                                                          @$MU=$MU+$mue*$res5['id_coef'];
                                                          @$CO=$CO+$res5['id_coef'];



                                                    ?></td>
                                                    <td style="text-align:center"><?= $res5['credit']?></td>
                                                  </tr>
                                               <?php
                                                    $e++;
                                   $credit=$credit+$res5['credit'];
                                             }
                                            elseif($etu['id_evalu']=="DEVOIR")
                                            {
                                               $notedev = $etu['note'];

                                            }
                                           else
                                                {
                                                    $notedev= " -- ";
                                                }


                                       }

                          }
                     }


                  }
                   ?>
                     <tr>
                      <td  colspan="2"style="text-align:center;font-weight:bolder"> MOYENNE UE <?= $d ?></td>
                      <td style="text-align:center;font-weight:bolder">  <?= @$res31['coef_UE']?></td>
                      <td  colspan="3"style="text-align:center;font-weight:bolder" > <?php echo @number_format(@$MU/@$CO,2 ) ;?></td>
                      <td  style="text-align:center;font-weight:bolder"> <?= @$credit ?> C</td>
                      </tr>
                  <?php
                  $tcredit=$tcredit+$credit;
                }
                //  echo $not;
               ?>
      <tr>
      <td colspan="6"   style="text-align:center;fon   BNB?Bt-weight:bolder"> TOTAL CREDIT </td>
     <td  style="text-align:center;font-weight:bolder"> <?= $tcredit ?> C</td>
      </tr>

  </tbody>
</table>
</div>

</div>
</body>
</html>

<?php


// require('fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
// $pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
// $pdf->AddPage();

// entete
// $pdf->Image('image/admin.png', 10, 5, 130, 20);

// Saut de ligne
// $pdf->Ln(18);


// Police Arial gras 16
// $pdf->SetFont('Arial', 'B', 16);

// Titre
// $pdf->Cell(0, 10, 'ATTESTATION DE SCOLARITE', 'TB', 1, 'C');
// $pdf->Cell(0, 10, 'N°:', 0, 1, 'C');

// Saut de ligne
// $pdf->Ln(5);

// Début en police Arial normale taille 10

// $pdf->SetFont('Arial', '', 10);
// $h = 7;
// $retrait = "      ";

// $pdf->Write($h, "Je soussigné, Directeur de l'établissement CLEVER SCHOOL 2 PRIVEE EL ATTAOUIA Certifie que : \n");

// $pdf->Write($h, $retrait . "L'élève : ");

// //Ecriture en Gras-Italique-Souligné(U)
// $pdf->SetFont('', 'BIU');
// $pdf->Write($h, @$nom_prenom . "\n");

// //Ecriture normal
// $pdf->SetFont('', '');

// $pdf->Write($h, $retrait . "Né (e) Le : " . @$date_naiss . " À : " . @$lieu_naiss . "\n");

// $pdf->Write($h, $retrait . "CIN N° : " . @$cin . " \n");

// $pdf->Write($h, $retrait . "Inscrit (e) le : " . @$date_insc . " Sous le N° : " . @$num_insc . " \n");

// $pdf->Write($h, $retrait . "Filière :  " . @$filiere . " \n");

// $pdf->Write($h, $retrait . "Niveau de formation :  " . @$niveau . "  \n");

// $pdf->Write($h, $retrait . "Classe :  " . @$classe . " \n");

// $pdf->Write($h, $retrait . "Année de formation :  " . @$as . "  \n");

// $pdf->Write($h, "Poursuit ses étude en  " . @$classe . "   et cela pour l'année scolaire en cours  " . @$as . "  \n");

// $pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

// $pdf->Cell(0, 5, 'Fait à El Attaouia Le :' . date('d/m/Y'), 0, 1, 'C');

// // Décalage de 20 mm à droite
// $pdf->Cell(20);
// $pdf->Cell(80, 8, "Le directeur pédagogique de l'établissement", 1, 1, 'C');

// // Décalage de 20 mm à droite
// $pdf->Cell(20);
// $pdf->Cell(80, 5, "Mr LAHCEN ABOUSALIH", 'LR', 1, 'C');
// @$pdf->Cell(20);
// $pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
// $pdf->Cell(20);
// $pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
// $pdf->Cell(20);
// $pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
// $pdf->Cell(20);
// $pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)

// //Afficher le pdf
// $pdf->Output('', '', true);

?>


