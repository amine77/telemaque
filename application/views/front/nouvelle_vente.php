<style>

    #combo{ 
        margin:5px 0; 
    } 
    select#chooseplaylist, select#selplaylist{ 
        width:200px; 
        display:inline-block; 
    } 
    ul#btselmulti{ 
        display:inline-block; 
        list-style-type:none; 
        margin:0 5px; 
        padding:0; 
    } 
    ul#btselmulti li{ 
        cursor:pointer;     
    } 
    #labelplaylist{ 
        display:block; 
        margin:5px 0 0 0; 
    }

    .glyphicon {
        font-size: 25px;
    }
</style>


<div id="bloc_contenu">
    <br><h2>Nouvelle exemplaire en vente</h2><br>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container">
        <div class="row">
            <div class="bloc_form_connex">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                echo form_open("inscription/index", $attributes);
                ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="label_produit" id="label_produit" class="form-control input-sm" placeholder="Libellé produit">
                                <span class="text-danger"><?php echo form_error('label_produit'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">

                                <select name="select-category" id="select-cat" class="form-control input-sm" >
                                    <option value="0">Selectionner une categorie</option>
                                    <?php
                                    foreach ($souCat as $cat) {

                                        echo "<option value='" . $cat["category_id"] . "'>" . $cat['categorie'] . "</option>";
                                    }
                                    ?>
                                </select>    
                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-xs-3 col-sm-3 col-md-3" style="display:none;" id="content-select-product">
                            <div class="form-group">


             

                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">

                            <span style="font-size: 14px">OU &nbsp;</span><a href="create-article"> Creer un nouvelle article</a>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" placeholder="Description"></textarea>
                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="content-select-spec" style="display:none">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <h4>Ajouter des caracteristiques</h4>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="glyphicon glyphicon-plus-sign"> </div>
                        </div>  
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group"> 
                                <select id="select-spec" name="select-spec" class="form-control input-sm">
                                    
                                </select>
                            </div>
                        </div>
                          
                        
                    </div>
                    <div class="row" id="content-add-spec" style="display:none">
                        <div class="glyphicon glyphicon-plus-sign"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-success" value="Ajouter objet" />
                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?= $form_upload_img; ?>
            </div>

        </div>
    </div>

</div>
