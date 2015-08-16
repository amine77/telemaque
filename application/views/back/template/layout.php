<?php  //var_dump($site) 
?>
<?php $this->load->view('back/template/entete'); ?>

<?php

if ($show_header == true){
    $this->load->view('back/template/header');
}
if ($show_nav == true){
    $this->load->view('back/template/nav');
}
?>


<?php $this->load->view($view); ?>
<?php $this->load->view('back/template/footer'); ?>