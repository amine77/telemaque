<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'users_articles_model', 'login_model', 'site_model', 'cmd_model'));

        $this->load->library('session');
    }

    public function index() {



        $this->data['title'] = 'Panier';
        $this->data['site'] = $this->site_model->get_site_configurations();
        $panier_exemplaire = $_SESSION['panier'];

        $this->data['exemplaires'] = array();
        //$this->panier_model->vider();
        unset($panier_exemplaire['nb_article']);
        $panier_exemplaire = array_keys($panier_exemplaire);
        if (count($panier_exemplaire) > 0) {

            $this->data['additional_js'] = array('functions');
            $this->data['exemplaires'] = $this->users_articles_model->exemplaire($panier_exemplaire);

            $this->data['panier'] = $this->panier_model->get_cart($this->data['exemplaires']);
        } else {
            $this->data['panier'] = $this->panier_model->get_cart();
        }
        //  $this->debug($_SESSION['panier']);
        //  $this->debug($this->data['exemplaires']);
        $this->load->view('front/template/layout', $this->data);
    }

    public function add_article($action = "") {
        // ajout un exemplaire d'un article 

        $html = $this->action_cart(json_decode($this->input->post('user_article_id')), "add_article", $action);
        echo $html;
    }

    public function delete_sample_article() {
        // suprimer un exemplaire d'un exemplaire 
        $html = $this->action_cart(json_decode($this->input->post('user_article_id')), "delete_sample_article");
        echo $html;
    }

    public function delete_article() {
        if ($_SESSION['panier'][$this->input->post('user_article_id')] - $_SESSION['panier']['nb_article'] == 0)
            $this->empty_cart();
        else {
            $html = $this->action_cart(json_decode($this->input->post('user_article_id')), "delete_article");
            echo $html;
        }
    }

    public function empty_cart() {
        // Vider le panier
        $this->panier_model->vider();
        echo json_encode($this->panier_model->get_cart());
    }

    public function action_cart($ua_id = "", $type = "", $action = "") {
        //methode commune
        if ($ua_id == "")
            $ua_id = json_decode($this->input->post('user_article_id'));

        if (!isset($_SESSION['panier'][$ua_id]))
            $_SESSION['panier'][$ua_id] = 0;
        if ($type == "add_article")
            $_SESSION['panier'][$ua_id] ++;
        else if ($type == "delete_sample_article")
            $_SESSION['panier'][$ua_id] --;
        else if ($type == "delete_article") {
            unset($_SESSION['panier'][$ua_id]);
        }

        $panier_exemplaire = $_SESSION['panier'];
        unset($panier_exemplaire['nb_article']);
        $panier_exemplaire = array_keys($panier_exemplaire);
        $this->panier_model->get_nb_articles();

        if ($action == "") {

            $exemplaire = $this->users_articles_model->exemplaire($panier_exemplaire);
            $html = json_encode($this->panier_model->get_cart($exemplaire));
        } else
            $html = json_encode($this->panier_model->get_nb_articles());

        return $html;
    }

    public function facture($page = '', $cmd_id = '') {
        if (!$this->session->has_userdata('login')) {
            redirect('connexion');
        }
        $facture = $this->cmd_model->get_cmd($cmd_id, $_SESSION['user_id']);

        $this->data['Total_Cmd'] = $facture['Total_Cmd'];
        unset($facture['Total_Cmd']);
        foreach ($facture as $cmd) {
            $this->data['cmd'] = $cmd;
        }
       

        $this->data['userInfo'] = $this->db->get_where('users', array('user_id' => $_SESSION['user_id']))->result()[0];
        $this->data['site_identity'] = $this->db->get_where('site_identity', array('id' => '1'))->row_array();
        //$this->debug($this->data['facture']);
        $this->load->view('front/facture', $this->data);
    }

    //Page commande 
    public function order($etape = '', $cmd_id = '') {
        if (!$this->session->has_userdata('login')) {
            redirect('connexion');
        }
        $panier_exemplaire = $_SESSION['panier'];
        if ($etape == 'etape-3') {


            $this->data['site'] = $this->site_model->get_site_configurations();
            $this->data['view'] = 'front/order_etape_3';
            $this->data['command_id']=$cmd_id;
        } else if ($etape == 'etape-2') {

            if ($this->input->post('valid-cart') == "Valider") {

                $this->form_validation->set_rules("card_number", "N° carte", "trim|required|min_length[16]|max_length[16]|integer");
                $this->form_validation->set_rules("security_code", "Cryptogramme", "trim|required|min_length[3]|max_length[3]|integer");
                if ($this->form_validation->run() == TRUE) {
                    $tmppanier = $_SESSION['panier'];
                    unset($tmppanier['address_id']);
                    unset($tmppanier['nb_article']);
                    $oData = array(
                        'user_id' => $_SESSION['user_id'],
                        'address_id' => $_SESSION['address_id'],
                        'products' => $tmppanier
                    );
                    $info_user = $this->login_model->get_user_by_id($_SESSION['user_id']);


                    $cmd_id = $this->cmd_model->add_cmd($oData);
                    $this->panier_model->vider();
                    $content = $info_user['user_surname'] . "" . $info_user['user_name'] . "<br>"
                            . "Votre Commande a bien été validé ";

                    $subject = "Commande Bien réussi";

                    //$this->utils_model->send_mail('admin.telemaque@gmail.com', 'yoniattlane555@gmail.com', $subject, $content);

                    redirect(base_url() . "panier/order/etape-3/" . $cmd_id);
                } else {
                    $this->session->set_flashdata('msg-cartnumber', '<div class="alert alert-danger text-center">Votre saisie est incorrect, veuillez recommencez </div>');
                    $this->debug($this->form_validation->error_array);
                    if (in_array("security_code", $this->form_validation->error_array))
                        $this->session->set_flashdata('msg-crypto', '<div class="alert alert-danger text-center">Veuillez taper les 3 chiffres </div>');
                    redirect(base_url() . "panier/order/etape-2");
                }
            }

            //$this->data['additional_js'] = array('functions');
            $this->data['lib_js'] = array('datepicker/js/bootstrap-datepicker', 'datepicker/locales/bootstrap-datepicker.fr.min');

            $this->data['site'] = $this->site_model->get_site_configurations();
            $this->data['view'] = 'front/order_etape_2';
        } else {
            if ($this->input->post('add_adress') == "Valider") {
                $this->form_validation->set_rules("num-voie", "N°", "trim|required");
                $this->form_validation->set_rules("type-voie", "Rue,bd,voie", "trim|required");
                $this->form_validation->set_rules("nom-voie", "Libellé", "trim|required");
                $this->form_validation->set_rules("zip_code", "Code Postal", "trim|required");
                $this->form_validation->set_rules("ville", "Ville", "trim|required");
                $this->form_validation->set_rules("pays", "Pays", "trim|required");

                if ($this->form_validation->run() == TRUE) {

                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouvelle adresse a été ajoutéé</div>');

                    $oAdresse = array(
                        'adresse' => $this->input->post("num-voie") . " " . $this->input->post("type-voie") . " " . $this->input->post("nom-voie"),
                        'zip_code' => $this->input->post("zip_code"),
                        'city' => $this->input->post("ville"),
                        'country' => $this->input->post("pays")
                    );
                    $this->login_model->add_adresse_by_user($_SESSION['user_id'], $oAdresse['adresse'], $oAdresse['zip_code'], $oAdresse['city'], $oAdresse['country']);

                    redirect(base_url() . "panier/order");
                }
            } if ($this->input->post('select_adress') == "Valider") {

                $this->form_validation->set_rules("adresse", "N°", "trim|required");
                if ($this->form_validation->run() == TRUE) {
                    $_SESSION['address_id'] = $this->input->post('adresse');
                    redirect(base_url() . "panier/order/etape-2");
                } else {
                    $this->session->set_flashdata('msg-select-adress', '<div class="alert alert-danger text-center">Aucune adresse n\'a été ajoutée </div>');
                    redirect(base_url() . "panier/order");
                }
            }

            $this->data['exemplaires'] = array();
            //$this->panier_model->vider();
            unset($panier_exemplaire['nb_article']);
            $panier_exemplaire = array_keys($panier_exemplaire);
            if (count($panier_exemplaire) > 0) {

                $this->data['additional_js'] = array('functions');
                $this->data['exemplaires'] = $this->users_articles_model->exemplaire($panier_exemplaire);

                $this->data['panier'] = $this->panier_model->get_cart($this->data['exemplaires'], true);
            }
            $this->data['view'] = 'front/order';
            $this->data['site'] = $this->site_model->get_site_configurations();
            $this->data['adresses'] = $this->login_model->get_adresses_by_user($_SESSION['user_id']);
        }
        $this->load->view('front/template/layout', $this->data);
    }

}
