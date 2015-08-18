<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 55%;
        margin: auto;
    }
    #myCarousel{
        height: 400px;
        margin-bottom: 15px;
    }
    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
        height: 400px;
    }
</style>
<div id="bloc_contenu">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>
    <!-- carousel -->
    <?php if (isset($carousel_articles) && count($carousel_articles) > 0) { ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < count($carousel_articles); $i++) { ?>
                    <li data-target="#myCarousel" data-slide-to="<?= $i ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
                <?php } ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php for ($i = 0; $i < count($carousel_articles); $i++) { ?>

                    <?php $src = ($carousel_articles[$i]['image_path'] != '') ? base_url($carousel_articles[$i]['image_path']) : base_url('assets/img/img_none.jpg'); ?>
                    <div class="item  <?php if ($i == 0) echo 'active'; ?>">
                        <a href="<?= base_url('articles/' . $carousel_articles[$i]['article_id']) ?>"><img src="<?= $src ?>" alt="<?= $carousel_articles[$i]['article_label'] ?>" width="350" height="400"></a>
                        <div class="carousel-caption">
                            <h3><?= $carousel_articles[$i]['article_label'] ?></h3>
                            <p><?= substr($carousel_articles[$i]['description'], 0, 30) . '...' ?></p>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    <?php } ?>
    <!--  /carousel -->

    <h2>Liste des Articles</h2>
    <div>
        <?php
        // Affiche les articles

        foreach ($articles->result() as $row) {
            echo "<div class='list-article' id='article_" . $row->article_id . "'>
             <div class='bloc_titre'>
                <h3>" . $row->article_label . "</h3>
             </div>
             
             <img src='" . base_url() . "assets/img/img_none.jpg'>";

            // echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mattis, velit vel scelerisque efficitur
            lectus neque facilisis tellus, id scelerisque turpis erat sit amet nunc. Vivamus fringilla posuere.</p><br>';

            echo '<div class="clear"></div>';

            echo "<a href='" . base_url() . "articles/$row->article_id' data-role='" . $row->article_id . "' class='btn_base' >Voir les details</a><br>";

            echo '<br></div>';
        }
        ?>

    </div>    
    <div class="clear"></div>
</div>
