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

    function get_cart($exemplaires=array(),$order=false) {
        $prixTotal = 0;
        $html = '
            
        
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

                    <td>';
                    if(!$order){
                    $html.='<span class="glyphicon glyphicon-minus-sign" aria-hidden="true" onclick="delete_sample_article($(this));"></span>';
                    }
                    $html.='<input type="text" value="'.$_SESSION['panier'][$exemplaires[$i]->user_article_id]  .'/' .$exemplaires[$i]->quantity. '" data-qty="'.$_SESSION['panier'][$exemplaires[$i]->user_article_id].'" data-qty-max="'.$exemplaires[$i]->quantity.'" size="3" maxlength="20" disabled="disabled" style="display:inline;text-align:center;"/>';
                    if(!$order){    
                    $html.='<span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="add_article($(this));"></span><br>
                            <div class="glyphicon glyphicon-trash" aria-hidden="true" style="width:20px;margin:0 auto;"></div>';
                    }
            $prix = floatval($_SESSION['panier'][$exemplaires[$i]->user_article_id]) * $exemplaires[$i]->price;        
            $html.='</td>
                    <td> ' .  $prix. ' €
                    <br><span style="font-size:11px">prix unitaire : </span>' . $exemplaires[$i]->price . '€
                    </td>
                 </tr>';
            $prixTotal+=$prix;
        endfor;

       
        $html.='
                    </tbody>
                    <tfoot>
                        <tr>
                          <td colspan="3"></td>  
                          <td><h5>Total :'.$prixTotal.' €</h5> </td>  
                        </tr>
                    </tfoot>
                </table>
            </div>';
    if(!$order){  
    $html.='<div>
                <a href="' . base_url() . 'panier/order" data-role="1" class="btn_base">Valider la commande</a>
                <a class="btn btn-default" id="empty-cart" onclick="empty_cart();">Vider panier</a>
            </div>';
    }

        
         // Test si Panier vide
        if (count($exemplaires) == 0):

            $html='
                <center><h3>  <span class="label label-info" onclick="empty_cart();">Votre panier est vide</span> </h3></center>
           
            ';
        
        endif;
            return $html;
    }

}
