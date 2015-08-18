
<footer>

    <ul id="liens_sociaux">
        <?php   if($site['facebook'] !='') {?>
        <li>
            <a href="<?= $site['facebook']?>" target="blank" title="facebook">
                <?php 
                    echo '<img src="'. base_url().'assets/img/facebook.png" target="blank" alt="Facebook">'
                ?>
            </a>
        </li>
        <?php  }?>
        <?php   if($site['google_plus'] !='') {?>
        <li>
            <a href="<?= $site['google_plus']?>" target="blank" title="Google+">
                <?php 
                    echo '<img src="'. base_url().'assets/img/googleplus.png" target="blank" alt="Google+">'
                ?>
            </a>
        </li>
        <?php  }?>
        <?php   if($site['twitter'] !='') {?>
        <li>
            <a href="<?= $site['twitter']?>" target="blank" title="Twitter">
                <?php
                    echo '<img src="'. base_url().'assets/img/twitter.png" target="blank" alt="Twitter">'
                ?>
            </a>
        </li>
        <?php  }?>
    </ul>

    <ul id="liens_2">
        <li>
            SSII ©2015 - Tous droits réservés
        </li>
        <li>
            <a href="#" target="blank" title="Contact">
                Contact
            </a>
        </li>
        <li>
            <a href="#" target="blank" title="Support">
                Support
            </a>
        </li>
    </ul>
</footer>
        <!--<script src="js/bootstrap.min.js"></script>-->
<script src="<?php echo site_url();?>assets/lib/twitter/js/bootstrap.js"></script>
</body>
</html>