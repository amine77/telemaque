
<div id="bloc_contenu">
    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        

    ?>
    <?php if(isset($site) && $site['cgv'] !='') {?>
    <br><h3>Conditions générales de ventes</h3>
    <div class="well">
        
        <?=  $site['cgv'] ?>
    </div>
    <?php  } ?>

</div>