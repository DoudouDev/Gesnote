<?php require('./fpdf.php');
// require('connection.php');



// $etd = $_GET['etud'];
$etd = 15;

$donnee3 = $connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
$res3 = $donnee3->execute(array(@$_GET['etud']));
$donnee3->execute();
$res3 = $donnee3->fetch();
$donnee31 = $connect->prepare('SELECT * FROM `etudiant`  JOIN `classe`  WHERE `etudiant`.`id_classe`=`classe`.`nom_classe` AND `etudiant`.`id_etud`=?  ');
$donnee31->execute(array(@$_GET['etud']));
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
        $this->Cell(203, 10, ' Année  académique: ' . $anprec . '-' . $annee, 0, 0, 'C');
        $this->ln(5);
        $this->Cell(120, 10, '__________________________________________________________________________________________________________________________', 0, 0, 'C');
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
}

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new PDF();

//Ajouter une nouvelle page
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);



$pdf->Write(7, " Numero : " . @$res3[0] . " \n");
$pdf->Write(7, " Nom : " . @$res3[1] . " \n");
$pdf->Write(7, " Prenom : " . @$res3[2] . " \n");
$pdf->Write(7, " lieu de naissance : " . @$res3[3] . " \n");
$pdf->Write(7, " Date de naissance : " . @$res3[4] . " \n");
$pdf->Write(7, " Adresse : " . @$res3[5] . " \n");
$pdf->Write(7, " Email : " . @$res3[6] . " \n");
$pdf->Write(7, " Telephone : " . @$res3[7] . " \n");
$pdf->Write(7, " Classe : " . @$res3[8] . " \n");
$pdf->Write(7, " Numero classe : " . @$res3[9] . " \n");
$pdf->Write(7, " Numero classe : " . @$res3[10] . " \n");
$pdf->Write(7, " Numero classe : " . @$res3[11] . " \n");
$pdf->Write(7, " Numero classe : " . @$res3[12] . " \n");



// releve de note debut

$donnee = $connect->prepare('SELECT * FROM `u_e`');
$donnee->execute();
$c = 10;
$d = 0;

$cpt = 100;
$tcredit = 0;
while ($res31 = $donnee->fetch()) {
    // var_dump($res31);
    $c++;
    $d++;
    $e = 1;
    $cpt = $c;
    $credit = 0;
    $pdf->Write(7, " Numero classe : " . @$res3[12] . " \n");

    // 
?>

<tr>
    <td colspan="2" style="text-align:center;font-weight:bolder"> <?= @$res31['code_UE'] . " - " .  @$c . " - " ?>
        <?= @$res31['lib_UE'] ?></td>
    <td></td>
    <td colspan="3"></td>
    <td></td>
</tr>
<?php
    @@$not = 0;

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
    ?>
<tr>
    <th scope="row" style="text-align:center"><?php echo  @$cpt . "" . @$e; ?></th>
    <td style="text-align:center"><?php echo  @$res5['lib_mod']; ?></td>
    <td style="text-align:center"><?php echo  @$res5['id_coef']; ?></td>
    <td style="text-align:center"> <?php echo  @@$notedev; ?></td>
    <td style="text-align:center"> <?php echo  @@$notexa; ?></td>
    <td style="text-align:center"> <?php @$mue = (@@$notexa * 0.6 * @$res5['id_coef'] + @@$notedev * 0.4 * @$res5['id_coef']) / @$res5['id_coef'];
                                                            echo number_format(@@$mue, 2);
                                                            @@$MU = @$MU + @$mue * @$res5['id_coef'];
                                                            @@$CO = @$CO + @$res5['id_coef'];
                                                            ?></td>
    <td style="text-align:center"><?= @$res5['credit'] ?></td>
</tr>
<?php
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
    ?>

<td colspan="2" style="text-align:center;font-weight:bolder"> MOYENNE UE <?= @$d ?></td>
<td style="text-align:center;font-weight:bolder"> <?= @$res31['coef_UE'] ?></td>
<td colspan="3" style="text-align:center;font-weight:bolder"> <?php echo @number_format(@@$MU / @@$CO, 2); ?></td>
<td style="text-align:center;font-weight:bolder"> <?= @$credit ?> C</td>
</tr>
<?php
    @$tcredit = @$tcredit + @$credit;
}
//  echo @$not;
?>
<tr>
    <td colspan="6" style="text-align:center;font-weight:bolder"> TOTAL CREDIT </td>
    <td style="text-align:center;font-weight:bolder"> <?= $tcredit ?> C</td>
</tr>




<?php

//signature du directeur
$pdf->SetXY(152, -70);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, ' Le Directeur des Etudes', 'B', 1, 'R');
$pdf->SetXY(152, -36);
$pdf->Cell(0, 8, ' ' . date('d / m / Y'), 0, 1, 'C');

$pdf->Output();



//Afficher le pdf
$pdf->Output('', '', true);

?>