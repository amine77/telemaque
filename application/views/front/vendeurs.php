<?php

defined('BASEPATH') OR exit('No direct script access allowed');





foreach ($vendeurs->result() as $row) {
    echo '<div>';
    echo $row->user_id;
    echo $row->user_name;
    echo $row->user_surname;
    echo '</div>';
}
?>

