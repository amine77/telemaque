

<?php $this->load->view('back/template/entete'); ?>


<?php

if ($show_header == true){
    $this->load->view('back/template/header');
}
?>
<?php $this->load->view($view); ?>
<?php $this->load->view('back/template/footer'); ?>