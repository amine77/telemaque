<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 50%;
        margin: auto;
    }
    #myCarousel{
        height: 400px;
        margin-bottom: 15px;
    }
</style>
<div id="bloc_contenu">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>
    <!-- carousel -->
    <?php if (isset($carousel_articles)) { ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <a href="<?= base_url('articles/1') ?>"><img src="<?= base_url('assets/img/carousel/img1.jpg') ?>" alt="Chania" width="460" height="345"></a>
                    <div class="carousel-caption">
                        <h3>Informatique</h3>
                        <p>Ordinateur de bureau ASUS 700 euros</p>
                    </div>
                </div>

                <div class="item">
                    <a href="<?= base_url('articles/1') ?>"><img src="<?= base_url('assets/img/carousel/img2.jpg') ?>" alt="Chania" width="460" height="345"></a>
                    <div class="carousel-caption">
                        <h3>Téléphonie</h3>
                        <p>iPhone 5c 600 euros</p>
                    </div>
                </div>

                <div class="item">
                    <a href="<?= base_url('articles/1') ?>"><img src="<?= base_url('assets/img/carousel/img3.jpg') ?>" alt="Flower" width="460" height="345"></a>
                    <div class="carousel-caption">
                        <h3>Voitures</h3>
                        <p>Audi R8 RT noire 40 000 euros</p>
                    </div>
                </div>

                <div class="item">
                    <a href="<?= base_url('articles/1') ?>"><img src="<?= base_url('assets/img/carousel/img4.jpg') ?>" alt="Mercedes cls" width="460" height="345"></a>
                    <div class="carousel-caption">
                        <h3>Voitures</h3>
                        <p>Une belle mercedes cls 38 500 euros</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
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
