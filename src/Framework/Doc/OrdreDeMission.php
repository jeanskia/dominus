<?php
ob_start();
?>
<style type="text/css">
    table{width: 100%;font-size:12pt;line-height:6mm;font-family:helvetica;}
    strong{color: #000;}
    em{font-size: 9pt;color:#717375;}
</style>

 <page backtop="70mm" backleft="10mm" backright="10mm" backbottom="30mm"> 
    <page_header> 
        <table style="font-size: 9pt;line-height:4mm;">
            <tr>
                <td style="width:5% ;text-align: center;">
                    <img  src="<?php echo dirname(dirname(dirname(__DIR__))).'/public/assets/images/ande_ci.png'; ?>" alt="logo" height="55" width="55">
                </td>
                <td style="width:35% ;text-align: center"><strong>MINISTERE DE L'ENVIRONNEMENT ET DU <br>
                    DEVELOPPEMENT DURABLE<br>
                    .....................<br>
                    Agence Nationale De l'Environnement<br>
                    .....................<br>
                    SOUS-DIRECTION DES AFFAIRES <br>
                    ADMINISTRATIVES ET FINANCIERES<br>
                    .....................<br>
                    Service des Ressources Humaines<br> et Formations<br><br>
                    Le Directeur <br> <br>
                    N° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  MINEDD/ANDE/DIR/SDAAF/SRHF
                    </strong>
                </td>
                <td style="width:25% ;text-align: center;line-height:6mm;"><strong>
                        <label style="font-size: 13pt">ORDRE DE MISSION</label> <br>
                   Sur le territoire national
                   </strong>
                </td>
                <td style="width:35% ;text-align: center;vertical-align: top"><strong>
                   REPUBLIQUE DE COTE D'IVOIRE<br>
                   <label style="font-size: 7pt"><i>UNION - DISCIPLINE - TRAVAIL</i></label><br>
                   ---------------------------<br>
                   <img  src="<?php echo dirname(dirname(dirname(__DIR__))).'/public/assets/images/republique_ci.png'; ?>" alt="logo" height="70" width="70">
                   </strong>
                </td>
            </tr>
        </table>       
    </page_header> 
     <table style="vertical-align: top">
         <tr>
             <td style="width: 35%;height: 30px"><strong>Donne l'ordre à</strong></td>
             <td style="width: 65%">: <?= (isset($agent->name) && isset($agent->first_name))?strtoupper($agent->name) .' '.strtoupper($agent->first_name) : '' ;?> </td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Fonction</strong></td>
             <td style="width: 65%">: <?= (isset($agent->fonction))? $agent->fonction: '' ;?> </td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Matricule</strong></td>
             <td style="width: 65%">: <?= (isset($agent->registration))? $agent->registration : '';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>De se rendre en mission à</strong></td>
             <td style="width: 65%">: <?= (isset($mission->location))? $mission->location : '';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Objet de la mission</strong></td>
             <td style="width: 65%;padding-bottom: 20px">: <?= (isset($mission->name))? $mission->name :'';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Moyen de transport</strong></td>
             <td style="width: 65%">: <?= (isset($mission->transport))? $mission->transport : '';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Immatriculation</strong></td>
             <td style="width: 65%">: </td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Date de départ</strong></td>
             <td style="width: 65%">: <?= (isset($date_deb))? $date_deb : '';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Date de retour</strong></td>
             <td style="width: 65%">: <?= (isset($date_fin))? $date_fin : '';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Durée de la mission</strong></td>
             <td style="width: 65%">: <?= (isset($mission->duration_mission) && $mission->duration_mission <= 1)?$mission->duration_mission.' jour':$mission->duration_mission.' jours';?></td>
         </tr>
         <tr>
             <td style="width: 35%;height: 30px"><strong>Imputation budgétaire</strong></td>
             <td style="width: 65%">: <?= (isset($mission->budget_allocation))?$mission->budget_allocation : '';?></td>
         </tr>
          <tr>
             <td style="width: 35%;height: 30px"></td>
             <td style="width: 65%;text-align: center">Abidjan,le</td>
         </tr>
         
     </table>
     
     <table style="vertical-align: top">
         <tr>
             <td style="width: 60%">
                 <strong>AMPLIATIONS :</strong><br>
                    - ANDE ..........................1<br>
                    - S/DAAF .......................1 <br>
                    - Service RHF ................1 <br>
                    - Intéressé(e) .................1 <br>
             </td>
             <td style="width: 40%">
                    <?php if ($upper_hierarchy->fonction != 'Directeur Générale') : ?>
                 <strong>Pour le Directeur<br>
                 et P.O le S/DAAF </strong>
                    <?php endif; ?>
                <br><br><br><br><br>
                <?php if ($upper_hierarchy->fonction == 'Directeur Générale') : ?>
                <strong><u><?= (isset($upper_hierarchy->name) && isset($upper_hierarchy->first_name))? strtoupper($upper_hierarchy->name.' '.$upper_hierarchy->first_name)  : '' ;?></u></strong><br>
                <?php else : ?>
                        <strong><?= (isset($upper_hierarchy->name) && isset($upper_hierarchy->first_name))? strtoupper($upper_hierarchy->name.' '.$upper_hierarchy->first_name)  : '' ;?></strong><br>
                <?php endif; ?>                
                 <em><?= (isset($upper_hierarchy->profession) )? $upper_hierarchy->profession: '' ;?></em>
             </td>
         </tr>
     </table>

    <page_footer style='text-align: center'> 
        <hr>
        Agence Nationale de l'Environnement (ANDE)<br>
        <strong>COCODY Vallon - Rue des Jardins - rue J93 non loin de Super Hayat<br>
        08 BP 09 Abidjan 08 Tél. :22 41 17 04 - Fax: 22 41 17 07 - Site Web: <u>www.ande-ci.com </u></strong>
    </page_footer> 
 </page>

<?php
$content = ob_get_clean();
try {
    $pdf = new \Spipu\Html2Pdf\Html2Pdf('p', 'A4', 'fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->output('mission.pdf');
} catch (\Spipu\Html2Pdf\Exception\Html2PdfException $ex) {
    die($ex);
}
