<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');



    if (!empty($vendeurs_articles->result())) {
        foreach ($vendeurs_articles->result() as $row) :
            ?>
            <div class="vendeurs">
                <?php

                echo $row->quantity;    
                   
                echo $row->user_name;
                echo $row->user_surname;
                ?>
                <div>
                    
                    <a class="btn btn-primary" href="<?= base_url().'usr/'.$row->user_id ?>">Details sur le vendeurs</a>
                </div>
              
            </div>
   
            <?php
            endforeach;
     } else {
            echo 'Pas de vendeur pour cette article';
     }
    ?>

</div>



