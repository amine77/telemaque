<?php if ($module['module_status'] == 1) { ?>
    <div class="row">
        <div id="slideshow" class=".col-xs-12 .col-md-8">
            <?php
            if (isset($articles) && is_object($articles)) {

                if (count($articles->result()) > 0) {
                    ?>
                    <span id="put_in_slideshow_success" class="label label-success">Les articles ont été ajoutés dans le module SlideShow, vérifiez leur présence sur la page d'accueil. </span>
                    <span id="put_in_slideshow_error" class="label label-danger">Malheureusement un problème est survenu, les articles choisis n'ont pas pu être ajoutés dans le SlideShow</span>
                    <br><br>
                    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        mettre en SlideShow
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div>
                            <!--  form -->
                            <?php
                            $attributes = array("class" => "form-horizontal", "id" => "moduleslideshowupdateform", "name" => "moduleslideshowupdateform");
                            echo form_open("admin/put_in_slideshow", $attributes);
                            ?>
                            <fieldset>
                                <p class="help-block">Veuillez choisir entre 4 et 6 articles à mettre en avant. Ces articles seront alors affichés dans le SlideShow de la page d'accueil.</p>
                                <div class="form-group">
                                    <div class="row colbox">
                                        <div class="col-lg-1 col-sm-1">

                                        </div>
                                        <div class="col-lg-5 col-sm-5">
                                            <?php
                                            foreach ($articles->result() as $row) {
                                                $checked = ($row->in_carousel == 1) ? 'checked' : '';
                                                echo '<input type="checkbox" ' . $checked . ' name="articles[]" value=" ' . $row->article_id . ' " />'
                                                . $row->article_label . '<br>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-lg-2 col-sm-2 text-center">
                                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-success" value="Mettre en avant" />
                                    </div>
                                </div>
                            </fieldset>
                            <?php echo form_close(); ?>
                            <!--   / form -->
                        </div>
                    </div>


                    <?php
                } else {
                    echo '<p>Aucun article trouvé.</p>';
                }
            }
            ?>
            </table>
        </div>
    </div>
    <?php
}
?>