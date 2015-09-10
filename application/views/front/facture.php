<?php 
    $nameAdresse = $this->db->get_where('address', array('address_id' => $cmd['address_id']))->row_array();
    $nameAdresseSociete = $this->db->get_where('address', array('address_id' => $site_identity['address_id']))->row_array();
    $dateCmd = $cmd['created_at'];
    $date = date_create($dateCmd);
    $date = date_format($date, 'd/m/y');
    /*     * ********************************************
      VARIABLES ET DONNÉES À INSERER DANS LE DOCUMENT
     * ******************************************** */

    /* 	Côté société	 */
    $Societe = $site_identity['site_name'];
    $CommercialNom = 'Nom';
    $CommericalPrenom = 'Prénom';
    $SocieteAdresse = $nameAdresseSociete['address'];
    $SocieteCodePostal = $nameAdresseSociete['zip_code'];
    $SocieteVille = $nameAdresseSociete['city'];
    $SocieteTelephone = $site_identity['phone'];

    /* 	Encart Lieu et Date	 */
    $DevisVille = ' Paris';
    $DevisDate = $date;
    $DevisNumero = $cmd['command_id'];

    /* 	Encart Client	 */
    $ClientCivilite = ' ';
    $ClientNom = ucfirst($userInfo->user_name);
    $ClientPrenom = ucfirst($userInfo->user_surname);;
    $ClientAdresse = $nameAdresse['address'];
    $ClientCodePostal = $nameAdresse['zip_code'];
    $ClientVille =  $nameAdresse['city'];
    $ClientTelephone = $userInfo->phone;

    /*     * ********************************************
     * ******************************************** */


    /*     * ***************************************
      CONTENU HTML ET CSS DE BASE POUR LE PDF
     * *************************************** */

    

  $html= '<style>
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
                <td style="width:60%;">
                    '.$Societe.'
                    
                    <br>
                    '.$SocieteAdresse.'
                    <br>
                    '.$SocieteCodePostal.'
                   '.$SocieteVille.'
                    <br>
                    N° Tel : ' . $SocieteTelephone;
       $html.=' </td>
                <td style="width:20%;" valign="middle">
                 <div style="background:#F0F0F0;padding:5px 15px;border:1px solid #000000;"><h3>FACTURE</h3></div>   

                </td>
                <td ></td>
            </tr>
        </table>

        <br><br><br><br><br><br>

        <table>
            <tr>
                <td style="width:60%; vertical-align:top;">
                    A' . $DevisVille . ', le ' . $DevisDate;
        $html.='<br>
                    N° de commande : ' . $DevisNumero;
        $html.='</td>

                <td style="width:40%; vertical-align:top;">
                    '.$ClientCivilite.'
                    '.$ClientNom.'
                    '.$ClientPrenom.'
                    <br>
                    '.$ClientAdresse.'
                    <br>
                    '.$ClientCodePostal.'
                    '.$ClientVille.'
                    <br>
                    N° Tel : ' . $ClientTelephone.'
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
            </tr>';
         
         foreach ($cmd as $cmdLine) {
            if (is_array($cmdLine)) {  
                   
          $html.="<tr>
                        <td>".$cmdLine['title']."</td>
                        <td>".$cmdLine['quantity']."</td>
                        <td>".number_format(floatval($cmdLine['price']) - ((floatval($cmdLine['price'])*20)/100),'2','.',' ')." &nbsp;€</td>
                        <td>20%</td>
                        <td class='total'>".number_format(floatval($cmdLine['price']),'2','.',' ')." &nbsp;€</td>
                    </tr>";
                 }
            }
          $html.='</table>

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
                                '.number_format(floatval($Total_Cmd) - ((floatval($Total_Cmd)*20)/100),'2','.',' ').' €
                            </td>
                        </tr>
                        <tr>
                            <td class="total_des" style="width:65%;" >
                                Montant TVA
                            </td>
                            <td class="total final" style="width:35%;" >
                               '.number_format((floatval($Total_Cmd)*20)/100,'2','.',' ').' €
                            </td>
                        </tr>
                        <tr>
                            <td class="total_des" style="width:65%;" >
                                Montant TTC
                            </td>
                            <td class="total final" style="width:35%;" >
                                '.number_format($Total_Cmd, 2, '.', ' ').' €
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br><br><br><br><br>

        <table style="border-spacing: 0;">
            <tr>
                <td style="width:100%;">En votre aimable reglement,<br>Cordialement
                </td>
                
            </tr>
        </table>
        
        
    </page>';

/* * ***************************************
 * *************************************** */


/* * ***************************************
  CONFIGURATION POUR CONVERSION EN PDF
 * *************************************** */

require_once (APPPATH . "libraries/html2pdf/html2pdf.class.php");
try {
    $pdf = new HTML2PDF('P', 'A4', 'fr');   // ici, on détermine le format de base du pdf. Portrait, Format A4, et en langue française.
    $pdf->pdf->SetDisplayMode('fullpage');   // Ici, on détermine le zoom de base sur le pdf. Là, on veut le voir en page entière.
    $pdf->writeHTML($html);
    $pdf->Output('test.pdf');
} catch (HTML2PDF_exception $e) {
    die($e);
}
/* * ***************************************
 * *************************************** */
?>