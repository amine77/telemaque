<?php
ob_start();
?>
<style type="text/css">
<!--
table
{
    width:  100%;
    border:none;
    border-collapse: collapse;
}
th
{
    text-align: center;
    border: solid 1px #eee;
    background: #f8f8f8;
}
td
{
    text-align: center;
    border: solid 1px #eee;
}
-->
</style>
<table>
<col style="width: 33%">
    <col style="width: 33%">
    <col style="width: 33%">
<tr>
<th>Nom</th>
<th>Prénom</th>
<th>Ville</th>
</tr>
<tr>
<td>ENGEL</td>
<td>Olivier</td>
<td>New York</td>
</tr>
<tr>
<td>Batman</td>
<td>Bruce</td>
<td>Gotham</td>
</tr>
</table>
<?php 
    $content = ob_get_clean();
    require_once  (APPPATH."libraries/html2pdf/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "fr");
        $html2pdf->setDefaultFont("Arial");
        $html2pdf->writeHTML($texte);
        $html2pdf->Output("votre_pdf.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
