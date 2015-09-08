<style>
    .require_art{
        display:none
    }

</style>


<div id="bloc_contenu">
    <br><h2>Etape 2 : Nouvelle exemplaire en vente </h2><br>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container">
        <div class="row">
            <div class="bloc_form_connex">

                <div class="col-lg-6">
                <?= $form_upload_img; ?>
                </div>    
            </div>

        </div>
        <div>
            <form method="POST" action="nouvelle-vente/2">
                <input type="submit" class="btn_base" name="end_add_product"  value="Metre en vente">
            </form>
            
        </div>
    </div>
    

</div>
