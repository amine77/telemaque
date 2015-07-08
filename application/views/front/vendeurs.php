<div class="center">
<?php

defined('BASEPATH') OR exit('No direct script access allowed');



if (!empty($vendeurs->result())) {
    foreach ($vendeurs->result() as $row) {
        echo '<div>';
        echo $row->user_id;
        echo $row->user_name;
        echo $row->user_surname;
        echo '</div>';
    }
} else {
    echo 'Pas de vendeur pour cette article';
}
?>

</div>