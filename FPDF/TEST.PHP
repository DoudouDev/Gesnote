<?php
require('./fpdf.php');



$etd = $_GET['etud'];
$donnee3 = $connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
$res3 = $donnee3->execute(array(@$etd));
$donnee3->execute();
$res3 = $donnee3->fetch();
$donnee31 = $connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
$donnee31->execute(array(@$etd));
$res31 = $donnee31->fetchAll();
$donnee4 = $connect->prepare('SELECT * FROM `classe` WHERE `nom_classe`=? ');
$donnee4->execute(array(@$_SESSION['classe']));
$res4 = $donnee4->fetch();
$id = $res4['id_classe'];



class PDF extends FPDF
{
  function Header()
  {
    $this->Image('logo.png', 10, 7, 30, 30);

    $this->SetFont('Arial', '', 18);
    $this->ln();
    $this->Cell(200, 10, 'IPD THOMAS SANKARA  ', 0, 0, 'C');
    $this->SetFont('Arial', '', 14);
    $this->ln(10);
    $this->Cell(200, 10, 'L\'UNIVERSITE PROFESSIONNELLE AFRICAINE  ', 0, 0, 'C');
    $this->SetFont('Arial', '', 12);
    $this->ln(7);
    $annee = date(' Y ');
    $anprec = date(' Y ', strtotime('-1 year'));
    $this->Cell(203, 10, ' Année  Académique: ' . $anprec . '-' . $annee, 0, 0, 'C');
    $this->ln(5);
    // $this->Cell(120, 10, '__________________________________________________________________________________________________________________________', 0, 0, 'C');
    $this->SetFont('Times', '', 14);
    $this->ln();
  }

  function Footer()
  {
    $this->SetXY(100, -35);
    $this->SetFont('Arial', '', 12);
    $this->ln();
    $this->Cell(0, 8, 'IPD, L\'Université Professionnelle Africaine', 'T', 1, 'C');
    $this->Cell(0, 8, 'Sud Foire n° 8477,BP 5771 Dakar || Téléphone : 33 367 90 45 ', '', 1, 'C');
    $this->Cell(0, 8, 'Email: admin@ipd.sn || Site: www.ipd.sn', 'B', 1, 'C');
    $this->Image('qripd.png', 165, 270.5, 23, 23);
  }
  function headerTable1()
  {
    $h = 7;
    $this->SetFont('Times', 'B', 12);
    $this->Cell(17, $h, 'Codes', 'LT', 0, 'C');
    $this->Cell(50, $h, 'Modules', 'LTR', 0, 'C');
    $this->Cell(20, $h, 'Coef', 'LTR', 0, 'C');
    $this->Cell(85, $h, 'Notes', 1, 0, 'C');

    $this->Cell(22, $h, 'Crédit', 1, 0, 'C');
    $this->Ln();
  }
  function  Appreciation($mg): string
  {

    if ($mg >= 10) {
      return " Assez Bien";
    } else {
      return  " Passable";
    }
  }
  function Niveau($n): string
  {
    if ($n == 1) {
      return ' Licence 1';
    } elseif ($n == 2) {
      return 'Licence 2 ';
    } elseif ($n == 3) {
      return ' Licence 3';
    } elseif ($n == 4) {
      return 'Master 1';
    } elseif ($n == 5) {
      return ' Master 2';
    }
  }
  function headerTable2()
  {
    $h = 7;
    $this->SetFont('Times', 'B', 12);
    $this->Cell(17, $h, '', 'LBR', 0, 'C');
    $this->Cell(50, $h, '', 'BR', 0, 'C');
    $this->Cell(20, $h, '', 'LB', 0, 'C');
    $this->Cell(28, $h, 'Devoir', 1, 0, 'C');
    $this->Cell(28, $h, 'Examen', 1, 0, 'C');
    $this->Cell(29, $h, 'Moyenne', 1, 0, 'C');
    $this->Cell(22, $h, '', 'LBR', 0, 'C');

    $this->Ln();
  }

  function tableView($connect)
  {
    $h = 7;
    $h1 = 7;

    // $etd = $_GET['etud'];
    $etd = 33;
    $donnee3 = $connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
    $res3 = $donnee3->execute(array(@$etd));
    $donnee3->execute();
    $res3 = $donnee3->fetch();
    $donnee31 = $connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
    $donnee31->execute(array(@$etd));
    $res31 = $donnee31->fetchAll();
    $donnee4 = $connect->prepare('SELECT * FROM `classe` WHERE `nom_classe`=? ');
    $donnee4->execute(array(@$_SESSION['classe']));
    $res4 = $donnee4->fetch();
    $id = $res4['id_classe'];


    $donnee = $connect->prepare('SELECT * FROM `u_e`');
    $donnee->execute();
    $c = 10;
    $d = 0;
    @$TMU = 0;
    @$TCO = 0;

    $cpt = 100;
    $tcredit = 0;
    while ($res31 = $donnee->fetch()) {

      $c++;
      $d++;
      $e = 1;
      $cpt = $c;
      $credit = 0;



      $this->Cell(194, $h, $res31['code_UE'] . ' - ' . @$c . '-' . @$res31['lib_UE'], 1, 0, 'C');
      $this->Ln();


      @@$not = 0;
      @@$notedev = 0;

      @$donnee1 = @$connect->prepare('SELECT * FROM `mod_classe` WHERE `id_classe`=?  ');
      @$donnee1->execute(array(@$id));
      @@$MU = 0;
      @@$CO = 0;
      while (@$res1 = @$donnee1->fetch()) {

        @$donnee5 = @$connect->prepare('SELECT * FROM `module`  WHERE `id_mod`=? AND `id_ue`=? ');
        @$donnee5->execute(array(@$res1['id_mod'], @$res31['id_UE']));
        @$res5 = @$donnee5->fetch();
        if (@$res5) {

          @$donnees = @$connect->prepare('SELECT * FROM `note`  WHERE `id_etud`=? AND `mod`=? ');
          @$donnees->execute(array(@$etd, @$res5['lib_mod']));

          while (@$etu = @$donnees->fetch()) {

            if (@@$etu['id_etud'] == @$etd) {
              @$not++;
              if (@$etu['id_evalu'] == "EXAMEN-THEORIQUE" || @$etu['id_evalu'] == "EXAMEN-PRATIQUE") {
                @$notexa = @$etu['note'];

                $this->SetFont('Times', 'B', 10);
                $this->Cell(17, $h1, @$cpt, 'LBR', 0, 'C');
                $this->Cell(50, $h1, @$res5['lib_mod'], 'LBR', 0, 'C');
                $this->Cell(20, $h1, @$res5['id_coef'], 'B', 0, 'C');
                $this->Cell(28, $h1, @@$notedev, 1, 0, 'C');
                $this->Cell(28, $h1, @@$notexa, 1, 0, 'C');

                @$mue = (@@$notexa * 0.6 * @$res5['id_coef'] + @@$notedev * 0.4 * @$res5['id_coef']) / @$res5['id_coef'];
                $this->Cell(29, $h1, number_format(@@$mue, 2), 1, 0, 'C');
                // echo number_format(@@$mue, 2);
                @@$MU = @$MU + @$mue * @$res5['id_coef'];
                @@$CO = @$CO + @$res5['id_coef'];
                $this->Cell(22, $h1, @$res5['credit'], 'LBR', 0, 'C');
                $this->Ln();


                @$e++;
                @$credit = @$credit + @$res5['credit'];
              } elseif (@$etu['id_evalu'] == "DEVOIR") {
                @$notedev = @$etu['note'];
              } else {
                @$notedev = " -- ";
              }
            }
          }
        }
      }
      $this->SetFont('Times', 'B', 10);
      $this->Cell(67, $h1, 'MOYENNE UE' . @$d, 'LBR', 0, 'C');
      $this->Cell(20, $h1, @$res31['coef_UE'], 'LBR', 0, 'C');
      $this->Cell(85, $h1, @@number_format(@@$MU / @@$CO, 2), 'LBR', 0, 'C');
      $this->Cell(22, $h1, @$credit . ' C ', 'LBR', 0, 'C');
      $this->Ln();
      @$TMU = @$TMU + @$MU;
      @$TCO = @$TCO + @$CO;
      $MG =  @@number_format(@$TMU / @$TCO, 2);

      @$tcredit = @$tcredit + @$credit;
    }
    //  echo @$not;
    $this->Cell(67, 10, 'TOTAL CREDIT : ' . $tcredit . ' C ', 'LBR', 0, 'C');
    $this->Ln();
    $this->Cell(67, 10, ' Moyenne : ' . @$MG . ' / 20', 'LBR', 0, 'C');

    $this->Ln();
    $this->Cell(67, 10, 'Appreciation :  ' . $this->Appreciation($MG), 'LBR', 0, 'C');
  }
}
// }

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new PDF();

//Ajouter une nouvelle page
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);

$w = 60;
$h = 7;

$pdf->Cell($w, $h, 'Numéro : ' . @$res3[0], 'LRT', 0, 'L');
$pdf->Cell(68, $h, 'Né(e) le : ' . @$res3[4], 'LRT', 0, 'L');
$pdf->Cell(66, $h, 'Filiére  : ' . @$res3[11], 'LBRT', 0, 'L');
$pdf->Ln();
$pdf->Cell($w, $h, 'Prenom : ' . @$res3[2], 'LR', 0, 'L');
$pdf->Cell(68, $h, 'Lieu : ' . @$res3[5], 'LR', 0, 'L');
$pdf->Cell(66, $h, 'Niveau : ' . $pdf->Niveau(@$res4[4]), 'LBR', 0, 'L');
$pdf->Ln();
$pdf->Cell($w, $h, 'Nom : ' . @$res3[1], 'LBR', 0, 'L');
$pdf->Cell(68, $h, 'Adresse : ' . @$res3[3], 'LBR', 0, 'L');
$pdf->Cell(66, $h, 'Classe  : ' . @$res4[1], 'LBR', 0, 'L');
$pdf->Ln();




$pdf->headerTable1();
$pdf->headerTable2();
$pdf->tableView($connect);



//signature du directeur
$pdf->SetXY(152, -70);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, ' Le Directeur des Etudes', 'B', 1, 'R');
$pdf->SetXY(152, -36);
$pdf->Cell(0, 8, ' ' . date('d / m / Y'), 0, 1, 'C');


// //Afficher le pdf
$pdf->Output('', '', true);