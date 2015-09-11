<script>
    $(function () {
        $('form[name="commentform"]').submit(function (e) {
            e.preventDefault();
            var comment_val = $('[name="txt_comment"]').val(), pseudo_val = $('[name="txt_pseudo"]').val();
            var article_id_val = <?= $article->article_id ?>;

            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "<?= base_url('home/add_comment') ?>",
                data: {article_id: article_id_val, comment: comment_val, pseudo: pseudo_val}

            }).success(function (message) {
                console.log(message);
                if (message.state === 'OK') {
                    $('#add_comment_success').css("display", "inline").delay(7000).fadeOut();
                    $('#add-comment').hide();

                } else {
                    $('#add_comment_failed').css("display", "inline").delay(7000).fadeOut();
                }
            }).error(function () {
                console.log("erreur ajax");
            });

        });
    });
</script>
<style>
    #comments {
        padding: 10px;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        width: 100%;
    }
    .comment {
        padding: 10px;
        width: 100%;
    }
    #add-comment{
        padding: 10px;
    }
    .pseudo{
        color: #003250;
        font-weight: bold;
    }


</style>
<div id="bloc_contenu">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche les articles
    ?>

    <h3><?= $article->article_label ?></h3>


    <div id="bloc_details_article">
        <div id="image_article">
            <?= $article->img['imsrc'] ?>
        </div>

        

        <div class="clear"></div>

        <div id="description">
            <h4><b>Description</b></h4>
            <?= $article->description ?>
        </div>
    </div>

    <h3>Exemplaires en vente</h3>   
    <?php
    if (count($vendeurs_articles) > 0) {
        foreach ($vendeurs_articles as $row) :
            ?>
            <div class="vendeurs" style="margin-bottom: 5px">






                <div class="encadre_vendeur">
                    <div class="title">
                        <h4>  <?= ucfirst($row->title) ?> </h4>
                    </div>

                    <table id="tableau_liste_exemplaires">
                        <tr>
                            <td class="image_mini col_1"><?= $row->img ?></td>

                            <td class="carac col_2" style="width:155px">
                                Etat : <?=($row->state==1) ? "Neuf" :"Occasion" ; ?>
                                
                            </td>
                            <td class="col_3">
                                Mis en vente par :
                                <a href="<?= base_url() . 'usr/' . $row->user_id ?>">
                                    <strong><?= $row->user_name . ' ' . $row->user_surname; ?>
                                    </strong>
                                </a>
                            </td>
                            <td class="col_4">
                                <?php
                                echo '<span style="font-size:15px;">' . $row->quantity . '</span> exemplaire';
                                echo (intval($row->quantity) > 1) ? 's' : ''
                                ?>
                            </td>
                            <td class="col_5">
                                <h3><?= $row->price ?>€</h3>
                            </td>
                            <td class="col_6">
                                <a class="btn_base" href="<?= base_url() . 'articles/' . $row->article_id . '/' . $row->user_article_id ?>">Voir le produit</a>
                            </td>
                        </tr>
                    </table>


                </div>



            </div>
            <?php
        endforeach;
    } else {
        echo 'Pas de vendeur pour cette article';
    }
    ?>
    <?php if (isset($comments)) { ?>
        <br> <br><h3> <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Commentaires</h3>  
        <div class="row">
            <span id="add_comment_success" class="label label-success" style="display: none; font-size: 12px">Merci pour ce commentaire, il sera affiché après la validation par nos administrateurs </span>
                    <span id="add_comment_failed" class="label label-danger" style="display: none;font-size: 12px">Votre commentaire n'a pas pu être envoyé. veuillez réessayer plus tard, ou contacter notre webmaster</span>
                    <div id="add-comment">
                        <form class="form-horizontal" id="commentform" name="commentform" method="post" accept-charset="utf-8">

                            <fieldset>

                                <div class="form-group">
                                    <div class="row colbox">
                                        <div class="col-lg-1 col-sm-2">
                                            <label for="txt_pseudo" class="control-label">Pseudo</label>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <input class="form-control" id="txt_pseudo" name="txt_pseudo" type="text"/>
                                        </div>
                                    </div>
                                </div>              


                                <div class="form-group">
                                    <div class="row colbox">
                                        <div class="col-lg-1 col-sm-2">
                                            <label for="txt_comment" class="control-label">Commentaire</label>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <textarea class="form-control" id="txt_comment" name="txt_comment" rows="3" cols="20"></textarea>
                                        </div>
                                    </div>
                                </div>      


                                <div class="form-group">
                                    <div class="col-lg-3 col-sm-3 text-center">
                                        <input id="btn_add" name="btn_add" type="submit" class="btn btn-success" value="Ajouter" />
                                    </div>
                                </div>
                            </fieldset>

                        </form>
                    </div>
        </div>
        <div class="row">
            <?php if ($comments != false) { ?>


                <div id="comments" class=".col-xs-12 .col-md-8">
                    

                    <?php foreach ($comments as $comment) {
                        if ($comment['is_published'] == 1) {
                            ?>
                            <div class="comment">
                                <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<span class="pseudo"><?= $comment['pseudo'] ?></span>&nbsp;
                                <?= $comment['created_at'] ?><br>

                                <?= $comment['comment_text'] ?>

                            </div>
                        <?php }
                    } ?>
                    <?php
                } else {
                    echo '   <div id="comments" class=".col-xs-12 .col-md-8">'
                    . '<div>Aucun commentaire trouvé.</div></div>';
                }
                ?>
            </div>
        </div>
<?php } ?>


</div>
