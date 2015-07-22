<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Panier_model
 *
 * @author LinkFox
 */
class Panier_model extends CI_Model {

    public function add_article() {
        
    }

    public function delete_article() {
        
    }

    public function vider() {
        $_SESSION['panier'] = "";
    }

    public function get_nb_articles() {

        $nb_article = 0; // car dans le tableau on compte aussi nb_article
        if (count($_SESSION['panier']) > 1) {
            foreach ($_SESSION['panier'] as $key => $value) {
                if ($key != 'nb_article') {

                    $nb_article+=$value;
                }
            }
        }
        $_SESSION['panier']['nb_article'] = $nb_article;

        return $nb_article;
    }

    function get_cart($exemplaires=array()) {
        $html = '
 
        <h3>Panier</h3>
        <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>label</td>
                    <td>Quantité</td>
                    <td>Prix</td>
                </tr>
            </thead>
            <tbody>
            ';

        for ($i = 0; $i < count($exemplaires) && count($exemplaires) > 0; $i++):
            $title = (is_null($exemplaires[$i]->title)) ? $exemplaires[$i]->article_label : $exemplaires[$i]->title;
       
            $html.= '
                <tr data-role="' . $exemplaires[$i]->user_article_id . '">
                    <td>' . $exemplaires[$i]->img . '</td>
                    <td>' . $title . '</td>

                    <td>
                        <span class="glyphicon glyphicon-minus-sign" aria-hidden="true" ></span>
                        <input type="text" value="'.$_SESSION['panier'][$exemplaires[$i]->user_article_id]  .'/' .$exemplaires[$i]->quantity. '" data-qty="'.$_SESSION['panier'][$exemplaires[$i]->user_article_id].'" data-qty-max="'.$exemplaires[$i]->quantity.'" size="3" maxlength="20" disabled="disabled" style="display:inline;text-align:center;"/>

                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" ></span><br>
                        <div class="glyphicon glyphicon-trash" aria-hidden="true" style="width:20px;margin:0 auto;"></div>
                    </td>
                    <td>
                        ' . floatval($exemplaires[$i]->price) * $exemplaires[$i]->quantity . ' €
                        <br>pu : ' . $exemplaires[$i]->price . '€
                    </td>
                 </tr>';

        endfor;

        // Test si Panier vide
        if (count($exemplaires) == 0):

            $html.='
            <tr>
                <td colspan="4" align="center" style="padding: 10px">
                    Panier vide
                </td>
            </tr>';
        endif;
        $html.='
                    </tbody>
                </table>
            </div>
            <div>
                <a href="' . base_url() . 'panier" data-role="1" class="btn_base">Valider la commande</a>
                <a class="btn btn-default" id="empty-cart">Vider panier</a>
            </div>
        </div>';

            return $html;
    }

}
