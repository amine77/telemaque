
<div id="bloc_contenu">
    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        

    ?>
    <?php if(isset($site) && $site['legal_notice'] !='') ?>
    <br><h3>Mentions légales</h3>
    <div class="well">
        
        <?=  $site['legal_notice'] ?>
    </div>
    <?  } ?>

</div>