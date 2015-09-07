<style>
    .require_art{
        display:none
    }
    .rouge{
        color:red;
    }
</style>


<div id="bloc_contenu">
    <br><h2>Etape 1 : Nouvelle exemplaire en vente</h2><br>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container">
        <div class="row">
            <div class="bloc_form_connex">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                echo form_open("nouvelle-vente/2", $attributes);
                ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control input-sm" placeholder="Libellé produit" required="required">
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">

                                <select name="select-category" id="select-cat" class="form-control input-sm" required="required">
                                    <option value="0">Selectionner une categorie</option>
                                    <?php
                                    foreach ($souCat as $cat) {

                                        echo "<option value='" . $cat["category_id"] . "'>" . $cat['categorie'] . "</option>";
                                    }
                                    ?>
                                </select>    
                                <span class="text-danger"><?php echo form_error('select-category'); ?></span>
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

                    <div class="row require_art">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="description" placeholder="Description" name="description"></textarea>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="content-select-spec" style="display:none">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <h4>Ajouter des caracteristiques</h4>
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group" id="input-spec" name="add_spec"> 
                                <table></table>
                            </div>
                        </div>


                    </div>

                    <div class="row require_art">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Prix" name="price" min="0" required="required"/> 
                            </div>
                        </div>
                        <span><?php echo form_error('price'); ?></span>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                <span style="font-size:25px">&nbsp;€</span>
                            </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Quantité" name="qty" min="1" required="required"/> 
                            </div>
                            <span><?php echo form_error('qty'); ?></span>
                        </div>
                    </div>   

                    <div class="form-group require_art">
                        <div class="col-lg-6 col-sm-6 text-center ">
                            <input id="btn_signup" name="add_product" type="submit" class="btn btn-success" value="Ajouter article" />

                        </div>
                    </div>
                </fieldset>

            </div>    
        </div>

    </div>
</div>

</div>
