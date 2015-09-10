<style>
    .require_art{
        display:none
    }
    .rouge{
        color:red;
    }

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

        padding:0; 
    } 
    ul#btselmulti li{ 
        cursor:pointer;     
    } 
    #labelplaylist{ 
        display:block; 
        margin:5px 0 0 0; 
    }
    .bloc_form_connex .glyphicon {
        font-size: 20px;
        vertical-align: middle;
    }

</style>


<div id="bloc_contenu">
    <br><h2>Etape 1 : Ajout d'article</h2><br>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container">
        <div class="row">
            <div class="bloc_form_connex">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "add_article", "name" => "add_article");
                echo form_open("nouvelle-vente-art/2", $attributes);
                ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control input-sm" placeholder="Libellé article" required="required">
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">

                                <select name="select-category" id="select-cat-art" class="form-control input-sm" required="required">
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

                        <div class="col-xs-3 col-sm-3 col-md-3">

                            <span style="font-size: 14px">OU &nbsp;</span><a href="nouvelle-vente"> Creer un nouvelle exemplaire</a>

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
                    <div class="row require_art">
                        <span class="glyphicon glyphicon-random"></span>&nbsp;&nbsp<span style="font-size:15px;vertical-align: middle;">Selectionner des caracteristiques</span>
                    </div>
                    <div class="row require_art">

                        <div id="combo" class="col-xs-6 col-sm-6 col-md-6"> 
                            <select id="chooseplaylist" size="5" multiple="multiple" class="form-control input-sm"> 
                                
                                <?php foreach ($specs as $spec): ?>
                                    <option value="<?= $spec['specification_id'] ?>"><?= $spec['specification_label'] ?></option> 
                                <?php endforeach; ?>
                                        </select> 
                                        <ul id="btselmulti"> 
                            <li id="addall"><img src="<?= base_url() ?>assets/img/ex_1/arrow-right-double.png" alt="select all"/></li> 
                            <li id="addsel"><img src="<?= base_url() ?>assets/img/ex_1/arrow-right.png" alt="select one"/></li> 
                            <li id="quitsel"><img src="<?= base_url() ?>assets/img/ex_1/arrow-left.png" alt="unselect one"/></li> 
                            <li id="quitall"><img src="<?= base_url() ?>assets/img/ex_1/arrow-left-double.png" alt="unselect all"/></li> 
                            </ul> 
                            <select id="selplaylist" size="5" multiple="multiple" class="form-control input-sm"></select> 
                    </div>

                </div>

                <div class="row require_art" style="margin-bottom:10px;">
                    <div class="col-sm-3"> 
                        <input type="text" name="playlist" id="playlist" readonly="readonly" value="" class="form-control input-sm"/> 
                    </div> 
                </div>
                <div class="row require_art">
                    <div style="margin-bottom:10px;"> 
                        <span class="btn btn-primary" id="btn_add_spec" style="cursor:pointer">
                            <span class="glyphicon glyphicon-plus-sign"></span>&nbsp;
                            <span style="font-size:15px;vertical-align: middle;">Ajouter une caracteristique</span>
                        </span>
                    </div>
                </div>


                <div class="row require_art">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group" id="input_spec_add" name="add_spec"> 
                            <table></table>
                        </div>
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
