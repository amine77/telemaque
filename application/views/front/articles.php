<div id="bloc_contenu">
    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        // Affiche les articles
        echo '<table id="tableau_articles">';

        foreach ($articles->result() as $row) {

            echo '

                    <tr>
                        <td class="col_1">
                           <img src="'.base_url(). 'assets/img/img_none.jpg" height="80">
                        </td>
                        <td class="col_2">
                            <h3>' . $row->article_label . '</h3>
                        </td>
                        <td class="col_2">

                            <a href="' . base_url() . 'articles/$row->article_id" data-role="' . $row->article_id . '" class="btn_base">Voir les details</a><br/>

                        </td>
                    </tr>
                ';

        }
        echo '</table>';
    ?>

</div>