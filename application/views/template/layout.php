

<?php $this->load->view('template/entete'); ?>


<?php

if ($show_header == true){
    $this->load->view('template/header');
}
?>
<?php $this->load->view($content); ?>
<?php $this->load->view('template/footer'); ?>