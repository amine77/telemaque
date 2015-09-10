<?php
        //$this->articles_model->
	/**********************************************
	VARIABLES ET DONNÉES À INSERER DANS LE DOCUMENT
	**********************************************/
	
	/*	Côté société	*/
	$Societe = 'Nom de la société';
	$CommercialNom = 'Nom';
	$CommericalPrenom = 'Prénom';
	$SocieteAdresse = 'Numéro et adresse';
	$SocieteCodePostal = 'XXXXX';
	$SocieteVille = 'Ville';
	$SocieteTelephone = 'XX XX XX XX XX';
	
	/*	Encart Lieu et Date	*/
	$DevisVille = 'Ville';
	$DevisDate = 'XX / XX / XXXX';
	$DevisNumero = 'XXXXXXXX-XXXXX';
	
	/*	Encart Client	*/
	$ClientCivilite = 'Civ';
	$ClientNom = 'Nom';
	$ClientPrenom = 'Prénom';
	$ClientAdresse = 'Numéro et adresse';
	$ClientCodePostal = 'XXXXX';
	$ClientVille = 'Ville';
	$ClientTelephone = 'XX XX XX XX XX';
	
	/**********************************************
	**********************************************/
	
	
	/*****************************************
	CONTENU HTML ET CSS DE BASE POUR LE PDF
	*****************************************/
	ob_start();
?>

<style>
	table{	width:100%;	font-size: 10pt; line-height: 12pt; border-collapse:collapse; }	
	table td { padding:3px; }
	table .head {	background:#F0F0F0;	height:8mm; border:1px solid #000000;}
	table .total_des {	background:#F0F0F0;	height:5mm; border:1px solid #000000;}
	table .total {	text-align:right;	}
	table .final { border:1px solid #000000;}
</style>

<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
	
	<table>
		<tr>
			<td style="width:75%;">
				<?php echo $Societe; ?>
				<br>
				<?php echo 'Votre conseiller :'; ?>
				<?php echo $CommercialNom; ?>
				<?php echo $CommericalPrenom; ?>
				<br>
				<?php echo $SocieteAdresse; ?>
				<br>
				<?php echo $SocieteCodePostal; ?>
				<?php echo $SocieteVille; ?>
				<br>
				<?php echo 'N°Tel : ' . $SocieteTelephone; ?>
			</td>
			<td style="width:25%;">
			</td>
		</tr>
	</table>
	
	<br><br><br><br><br><br>
	
	<table>
		<tr>
			<td style="width:60%; vertical-align:top;">
				<?php echo 'A ' . $DevisVille . ', le ' . $DevisDate; ?>
				<br>
				<?php echo 'N° de devis : ' . $DevisNumero;?>
			</td>
			
			<td style="width:40%; vertical-align:top;">
				<?php echo $ClientCivilite; ?>
				<?php echo $ClientNom; ?>
				<?php echo $ClientPrenom; ?>
				<br>
				<?php echo $ClientAdresse; ?>
				<br>
				<?php echo $ClientCodePostal; ?>
				<?php echo $ClientVille; ?>
				<br>
				<?php echo 'N°Tel : ' . $ClientTelephone; ?>
			</td>
		</tr>
	</table>
	
	<br><br><br><br><br><br><br><br>
	
	<table style="border-spacing: 0;">
		<tr>
			<td class="head" style="width:48%;" >
				Description
			</td>
			<td class="head" style="width:10%;" >
				Quantité
			</td>
			<td class="head" style="width:17%;" >
				Prix unitaire H.T
			</td>
			<td class="head" style="width:10%;" >
				TVA
			</td>
			<td class="head" style="width:15%;" >
				Total T.T.C
			</td>
		</tr>
		<tr>
			<td>Designation du produit</td>
			<td>XX</td>
			<td>XXX,XX €</td>
			<td>XX,XX %</td>
			<td class="total">XXX,XX €</td>
		</tr>
		<tr>
			<td>Designation du produit</td>
			<td>XX</td>
			<td>XXX,XX €</td>
			<td>XX,XX %</td>
			<td class="total">XXX,XX €</td>
		</tr>
		<tr>
			<td>Designation du produit</td>
			<td>XX</td>
			<td>XXX,XX €</td>
			<td>XX,XX %</td>
			<td class="total">XXX,XX €</td>
		</tr>
		
	</table>
	
	<br><br><br>
	
	<table style="border-spacing: 0;">
		<tr>
			<td style="width:58%;">
			</td>
			<td style="width:42%;">
				<table style="border-spacing: 0;">
					<tr>
						<td class="total_des" style="width:65%;" >
							Montant H.T.
						</td>
						<td class="total final" style="width:35%;" >
							XXX,XX€
						</td>
					</tr>
					<tr>
						<td class="total_des" style="width:65%;" >
							Montant TVA
						</td>
						<td class="total final" style="width:35%;" >
							XXX,XX€
						</td>
					</tr>
					<tr>
						<td class="total_des" style="width:65%;" >
							Montant TTC
						</td>
						<td class="total final" style="width:35%;" >
							XXX,XX€
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<br><br><br><br><br>
	
	<table style="border-spacing: 0;">
		<tr>
			<td style="width:15%;">
			</td>
			<td style="width:30%;">
				Bon pour accord.<br>
				Signature du commercial :
			</td>
			<td style="width:10%;">
			</td>
			<td style="width:30%;">
				Bon pour commande.<br>
				Signature du client :
			</td>
			<td style="width:15%;">
			</td>
		</tr>
	</table>
	
	
	
</page>

<?php
	/*****************************************
	*****************************************/


	/*****************************************
	CONFIGURATION POUR CONVERSION EN PDF
	*****************************************/
	$content = ob_get_clean();
	    require_once  (APPPATH."libraries/html2pdf/html2pdf.class.php");
	try{
		$pdf = new HTML2PDF('P', 'A4', 'fr');			// ici, on détermine le format de base du pdf. Portrait, Format A4, et en langue française.
		$pdf->pdf->SetDisplayMode('fullpage');			// Ici, on détermine le zoom de base sur le pdf. Là, on veut le voir en page entière.
		$pdf->writeHTML($content);
		$pdf->Output('test.pdf');
	}
	catch(HTML2PDF_exception $e){
		die($e);
	}
	/*****************************************
	*****************************************/
?>