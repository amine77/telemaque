<div id="page">

<?php $this->load->view('front/template/entete'); ?>


<?php

if (isset($show_header)) {
    if ($show_header == true) {
        $this->load->view('front/template/header');
    }
}
?>
<?php
$this->load->view($view);

?>
<?php $this->load->view('front/template/footer'); ?>
</div>