<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->has_userdata('login')) {
            if ($this->session->userdata('role') == 'ROLE_USER') {
                redirect(base_url());
            }
        } else {
            redirect(base_url('login'));
        }

        $this->load->model('login_model');
        $this->load->model('category_model');
        $this->load->model('tag_model');
        $this->load->model('articles_model');
        $this->load->model('role_model');
        $this->load->model('site_model');
        $this->load->model('message_model');
        $this->load->model('module_model');
        $this->load->model('comment_model');
        $this->load->model('statistics_model');
    }

    public function index()
    {


        redirect("admin/home");
    }

    protected function get_site_identity(array $tab)
    {
        $tab['site'] = $this->site_model->get_site_configurations();
        $tab_messages = $this->message_model->count_new_messages();
        $tab['site']['new_messages'] = $tab_messages['nb'];
        $tab_users = $this->login_model->count_new_users();
        $tab['site']['new_users'] = $tab_users['nb'];
        $tab_articles = $this->articles_model->count_new_articles();
        $tab['site']['new_articles'] = $tab_articles['nb'];
        $tab['site']['activated_modules'] = $this->module_model->get_activated_modules();
        return $tab;
    }
    protected function get_site_statics(array $tab){
        $tab['total_users']= $this->statistics_model->get_total_users();
        $tab['total_new_users']=  $this->statistics_model->get_total_new_users();
        $tab['total_not_activated_users']=  $this->statistics_model->get_total_not_activated_users();
        $tab['average_users_age']=  $this->statistics_model->get_average_users_age();
        $tab['departement_of_most_users']=  $this->statistics_model->get_departement_of_most_users();
        $tab['last_user_inscription_date']=  $this->statistics_model->get_last_user_inscription_date();
        $tab['last_message_reception_date']=  $this->statistics_model->get_last_message_reception_date();
//        $tab['salesman_of_most_sold_articles']=  $this->statistics_model->get_salesman_of_most_sold_articles();
//        $tab['seller_of_most_bigger_turnover']=  $this->statistics_model->get_seller_of_most_bigger_turnover();
//        $tab['buyer_of_most_bought_articles']=  $this->statistics_model->get_buyer_of_most_bought_articles();
//        $tab['buyer_of_most_of_expenses']=  $this->statistics_model->get_buyer_of_most_of_expenses();
        $tab['total_items_for_sale']=  $this->statistics_model->get_total_items_for_sale();
        $tab['total_copies_for_sale']=  $this->statistics_model->get_total_copies_for_sale();
        $tab['total_categories']=  $this->statistics_model->get_total_categories();
        $tab['most_expensive_item_copy']=  $this->statistics_model->get_most_expensive_item_copy();
        $tab['cheapest_item_copy']=  $this->statistics_model->get_cheapest_item_copy();
        $tab['item_that_has_most_of_copies']=  $this->statistics_model->get_item_that_has_most_of_copies();
        $tab['item_most_seen']=  $this->statistics_model->get_item_most_seen();
        $tab['oldest_item']=  $this->statistics_model->get_oldest_item();
        $tab['last_item']=  $this->statistics_model->get_last_item();
        $tab['last_item_copy']=  $this->statistics_model->get_last_item_copy();
        $tab['last_purchase_date']=  $this->statistics_model->get_last_purchase_date();
        $tab['last_five_command']=  $this->statistics_model->get_last_five_command();
        $tab['articles_per_category']=  $this->statistics_model->get_articles_and_categories();
        return $tab;
    }

    public function home()
    {
        $data['title'] = 'page d\'accueil';
        $data['additional_css'] = array('tableau_de_bord');
        $data['view'] = 'back/home';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data['lib_js'] = array('datepicker/js/bootstrap-datepicker', 'datepicker/locales/bootstrap-datepicker.fr.min', 'canvas/jquery.canvasjs.min');
        $data = $this->get_site_identity($data);
        $data = $this->get_site_statics($data);
        $this->load->view('back/template/layout', $data);
    }

    public function statistic()
    {
        //cette methode sera appelée en ajax
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $response = array();
        $response['state'] = 'OK';
        $response['from'] = $from;
        $response['to'] = $to;

        echo json_encode($response);
    }

    public function view_message($message_id)
    {
        $html = '';
        $message = $this->message_model->get_message_by_id($message_id);
        $this->message_model->set_old($message_id);

        if (is_array($message)) {
            $sender = ($message['mail'] == '') ? $message['mail_sender'] : $message['mail'];
            $html .='<p><strong>Envoyé par</strong> ' . $sender . '</p>';
            $html .='<p><strong>Sujet :</strong> ' . $message['title'] . '</p>';
            $html .='<p><strong>Message :</strong> ' . $message['content'] . '</p>';
        } else {
            $html = '<h2>erreur</h2>';
        }
        echo ($html);
    }

    public function view_user($user_id)
    {
//        if (!$this->session->has_userdata('login')) {
//            redirect('admin');
//        }
        $data['title'] = 'un titre';
        $data['view'] = 'back/view_user';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $data['user'] = $this->login_model->get_user_by_id($user_id);
        $this->login_model->set_old($user_id);
        $data['adresses'] = $this->login_model->get_adresses_by_user($user_id);
        $data['messages'] = $this->login_model->get_messages_by_user($user_id);

        $data['role'] = $this->login_model->get_roles_by_user($user_id);
        $this->input->ip_address();
        $this->load->view('back/template/layout', $data);
    }

    public function liste_users()
    {

        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_users';
        $data['users'] = $this->login_model->get_all();
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function liste_messages()
    {

        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_messages';
        $data['messages'] = $this->message_model->get_all();
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function update_site_address()
    {
        $zip_code = $this->input->post('zip_code');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $country = $this->input->post('country');
        $message = '';
        if ($this->site_model->update_site_address($zip_code, $address, $city, $country)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function update_site_name()
    {
        $new_name = $this->input->post('new_name');
        $message = '';
        if ($this->site_model->update_site_name($new_name)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function update_social_networks()
    {
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $google_plus = $this->input->post('google_plus');

        $message = '';
        if ($this->site_model->update_site_social_networks($facebook, $twitter, $google_plus)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function update_slogan()
    {
        $new_slogan = $this->input->post('new_slogan');
        $message = '';
        if ($this->site_model->update_site_slogan($new_slogan)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function update_phone()
    {
        $new_phone = $this->input->post('new_phone');
        $message = '';
        if ($this->site_model->update_site_phone($new_phone)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function do_upload()
    {
        $message = array();

        $config = array(
            'upload_path' => "./assets/img/",
            'file_name' => "logo",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000",
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            $data = array('state' => 'OK');
        } else {
            $data = array('state' => 'FAILED', 'error' => $this->upload->display_errors());
        }
        $data['title'] = 'pages statiques';
        $data['lib_js'] = array('tinymce/tinymce.min');
        $data['view'] = 'back/cms_view';
        $data = $this->get_site_identity($data);
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;

        $this->load->view('back/template/layout', $data);
    }

    public function update_cgv()
    {
        $new_cgv = $this->input->post('cgv');
        $message = '';
        if ($this->site_model->update_site_cgv($new_cgv)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function update_legal_notice()
    {
        $new_legal_notice = $this->input->post('legal_notice');
        $message = '';
        if ($this->site_model->update_site_legal_notice($new_legal_notice)) {
            $message = array('state' => 'OK');
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function liste_articles()
    {
        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_articles';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $data['articles']=  $this->articles_model->get_all_with_number_of_copies();
        $this->load->view('back/template/layout', $data);
    }

    public function form_articles()
    {
        $data['title'] = 'un titre';
        $data['additional_css'] = array('articles');
        $data['view'] = 'back/form_articles';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function cms()
    {
        $data['title'] = 'pages statiques';
        $data['lib_js'] = array('tinymce/tinymce.min');
        $data['view'] = 'back/cms_view';
        $data = $this->get_site_identity($data);
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;

        $this->load->view('back/template/layout', $data);
    }

    public function liste_exemplaires()
    {
        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_exemplaires';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $data['exemplaires']=  $this->articles_model->get_all_copies();
        $this->load->view('back/template/layout', $data);
    }

    public function liste_tags()
    {
        $data['title'] = 'tous les mots clés';
        $data['view'] = 'back/liste_tags';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);

        $data['tags'] = $this->tag_model->get_all();
        $this->load->view('back/template/layout', $data);
    }

    public function delete_tag($id)
    {
        $this->tag_model->delete_tag($id);
        redirect('admin/liste_tags');
    }

    public function delete_message($id_user, $id_message)
    {
        $this->message_model->delete_message($id_message);
        redirect('admin/view_user/' . $id_user);
    }

    public function delete_a_message($id_message)
    {
        $this->message_model->delete_message($id_message);
        redirect('admin/liste_messages');
    }

    public function delete_role($id)
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {
            $this->role_model->delete_role($id);
            redirect('admin/liste_roles');
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function delete_contact($id)
    {

        $this->login_model->delete_user($id);
        redirect('admin/liste_contacts');
    }

    public function delete_comment($id)
    {

        $this->comment_model->delete_comment($id);
        redirect('admin/update_module/2');
    }

    public function publish_comment($comment_id)
    {

        $this->comment_model->publish_comment($comment_id);
        redirect('admin/update_module/2');
    }

    public function liste_categories()
    {

        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_categories';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $data['categories'] = $this->category_model->get_all();
        $this->load->view('back/template/layout', $data);
    }

    public function delete_category($id)
    {

        $this->category_model->delete_category($id);
        redirect('admin/liste_categories');
    }

    public function update_category($category_id = null)
    {

        $parent = $this->input->post("txt_parent");
        $category = $this->input->post("txt_category");
        $category_label = ucfirst(mb_strtolower($category, 'UTF-8'));

        $this->form_validation->set_rules("txt_category", "Category", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['cat'] = $this->category_model->get_category($category_id);
            $data['categories'] = $this->category_model->get_only_parents();
            $data['view'] = 'back/update_category';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $data['id'] = $category_id;


            $this->load->view('back/template/layout', $data);
            //$this->load->view('back/update_category', $data);
        } else {


            if ($this->input->post('btn_update') == "Modifier") {
                $this->category_model->update_category($parent, $category_id, $category_label);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                        . 'La nouvelle catégorie a été mis à jour avec succès !</div>');
                redirect("admin/update_category/" . $category_id);
            } else {
                redirect('admin/update_category/' . $category_id);
            }
        }
    }

    public function update_tag($tag_id = null)
    {

        $tag_label = $this->input->post("txt_tag");
        $articles = $this->input->post('articles');
        $this->form_validation->set_rules("txt_tag", "Tag", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['tag'] = $this->tag_model->get_tag($tag_id);
            $data['articles'] = $this->articles_model->get_articles();
            $data['articles_by_tag'] = $this->tag_model->find_articles($tag_id);
            $data['view'] = 'back/update_tag';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $data['id'] = $tag_id;


            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_update') == "Update") {

                $this->tag_model->update_tag($tag_id, $tag_label, $articles);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                        . 'Le nouveau mot clé a été mis à jour avec succès !</div>');
                redirect("admin/update_tag/" . $tag_id);
            } else {
                redirect('admin/update_tag/' . $tag_id);
            }
        }
    }

    public function ajouter_tag()
    {
        $tag_label = $this->input->post("txt_tag");
        $articles = $this->input->post('articles');
        $this->form_validation->set_rules("txt_tag", "Tag", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['articles'] = $this->articles_model->get_articles();
            $data['view'] = 'back/ajouter_tag';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);

            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_ajouter') == "Ajouter") {

                if ($this->tag_model->add_tag($tag_label, $articles)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouveau mot clé a été ajouté avec succès !</div>');
                    redirect("admin/ajouter_tag");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de création du mot clé. Veuillez réessayer plus tard ou contacter votre administrateur.</div>');
                    redirect('admin/ajouter_tag');
                }
            } else {
                redirect('admin/ajouter_tag');
            }
        }
    }

    public function ajouter_role()
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {


            $role_label = $this->input->post("txt_role");

            $this->form_validation->set_rules("txt_role", "Rôle", "trim|required");

            if ($this->form_validation->run() == FALSE) {

                $data['title'] = 'un titre';
                $data['categories'] = $this->role_model->get_all();
                $data['view'] = 'back/ajouter_role';
                $data['show_header'] = TRUE;
                $data['show_nav'] = TRUE;
                $data = $this->get_site_identity($data);

                $this->load->view('back/template/layout', $data);
            } else {


                if ($this->input->post('btn_ajouter') == "Ajouter") {

                    if ($this->role_model->add_role($role_label)) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouveau rôle a été ajouté avec succès !</div>');
                        redirect("admin/ajouter_role");
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de création du rôle. Veuillez réessayer plus tard ou contacter votre administrateur.</div>');
                        redirect('admin/ajouter_role');
                    }
                } else {
                    redirect('admin/ajouter_role');
                }
            }
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function update_role($role_id = null)
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {



            $role_label = $this->input->post("txt_role");

            $this->form_validation->set_rules("txt_role", "Rôle", "trim|required");

            if ($this->form_validation->run() == FALSE) {

                $data['title'] = 'un titre';
                $data['view'] = 'back/update_role';
                $data['show_header'] = TRUE;
                $data['show_nav'] = TRUE;
                $data = $this->get_site_identity($data);
                $data['id'] = $role_id;
                $data['role'] = $this->role_model->get_role_by_id($role_id);

                $this->load->view('back/template/layout', $data);
            } else {


                if ($this->input->post('btn_update') == "Update") {

                    if ($this->role_model->update_role($role_id, $role_label)) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Ce rôle a été mise à jour avec succès !</div>');
                        redirect('admin/update_role/' . $role_id);
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec. Rôle non mise à jour!</div>');
                        redirect('admin/update_role/' . $role_id);
                    }
                } else {
                    redirect('admin/update_role/' . $role_id);
                }
            }
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function ajouter_admin()
    {

        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {


            $nom = $this->input->post("txt_nom");
            $prenom = $this->input->post("txt_prenom");
            $login = $this->input->post("txt_login");
            $password = $this->input->post("txt_password");
            $email = $this->input->post("txt_email");
            $role = $this->input->post("txt_role");
            $active = ($this->input->post("txt_active") != '') ? 1 : 0;


            $this->form_validation->set_rules("txt_nom", "Nom", "trim|required");
            $this->form_validation->set_rules("txt_prenom", "Prénom", "trim|required");
            $this->form_validation->set_rules("txt_login", "Login", "trim|required");
            $this->form_validation->set_rules("txt_password", "Mot de passe", "trim|required");
            $this->form_validation->set_rules("txt_email", "Email", "trim|required");
            $this->form_validation->set_rules("txt_role", "Rôle", "trim|required");


            if ($this->form_validation->run() == FALSE) {

                $data['title'] = 'un titre';
                $data['view'] = 'back/ajouter_admin';
                $data['roles'] = $this->role_model->get_all();
                $data['show_header'] = TRUE;
                $data['show_nav'] = TRUE;
                $data = $this->get_site_identity($data);

                $this->load->view('back/template/layout', $data);
            } else {


                if ($this->input->post('btn_ajouter') == "Ajouter") {
                    if ($this->login_model->add_admin($nom, $prenom, $login, $email, $role, $password, $active)) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouveau administrateur a été ajouté avec succès !</div>');
                        redirect("admin/ajouter_admin");
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de création de l\'administrateur. Veuillez réessayer plus tard ou contacter votre administrateur.</div>');
                        redirect('admin/ajouter_admin');
                    }
                } else {
                    redirect('admin/ajouter_admin');
                }
            }
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function ajouter_contact()
    {

        $titre = $this->input->post("txt_titre");
        $email = $this->input->post("txt_email");
        $description = $this->input->post("txt_description");

        $this->form_validation->set_rules("txt_titre", "Titre", "trim|required");
        $this->form_validation->set_rules("txt_email", "Email", "trim|required");
        $this->form_validation->set_rules("txt_description", "Description", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['view'] = 'back/ajouter_contact';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);

            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_ajouter') == "Ajouter") {

                if ($this->login_model->add_contact($titre, $email, $description)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouveau rôle a été ajouté avec succès !</div>');
                    redirect("admin/ajouter_contact");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de création du rôle. Veuillez réessayer plus tard ou contacter votre administrateur.</div>');
                    redirect('admin/ajouter_contact');
                }
            } else {
                redirect('admin/ajouter_contact');
            }
        }
    }

    public function ajouter_category()
    {

        $parent = $this->input->post("txt_parent");
        $category = $this->input->post("txt_category");
        if ($parent == '0') {
            $category = ucfirst(mb_strtolower($category, 'UTF-8'));
        } else {
            $category = ucfirst(mb_strtolower($category, 'UTF-8'));
        }

        $this->form_validation->set_rules("txt_category", "Category", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Ajouter une catégorie';
            $data['categories'] = $this->category_model->get_only_parents();
            $data['view'] = 'back/ajouter_category';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);

            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_ajouter') == "Ajouter") {
                var_dump($category);

                if ($this->category_model->add_category($parent, $category)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouvelle catégorie a été ajoutée avec succès !</div>');
                    redirect("admin/ajouter_category");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de création de la catégorie. Veuillez réessayer plus tard ou contacter votre administrateur.</div>');
                    redirect('admin/ajouter_category');
                }
            } else {
                redirect('admin/ajouter_category');
            }
        }
    }

    public function put_in_slideshow()
    {
        $articles = $this->input->post("articles_in_slideshow");
        $message = array();
        if ($this->articles_model->put_in_slideshow($articles)) {
            $message = array('state' => 'OK', 'articles' => $articles);
        } else {
            $message = array('state' => 'FAILED');
        }
        echo json_encode($message);
    }

    public function update_module($module_id = null)
    {
        $module_status = $this->input->post("txt_status");
        $this->form_validation->set_rules("txt_module", "Nom de module", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Configuration';
            $data['module'] = $module = $this->module_model->get_module_by_id($module_id);
            if ($module['module_id'] == 2 && $module['module_status'] == 1) {
                $data['comments'] = $this->comment_model->get_all();
                $data['articles'] = $this->articles_model->get_articles(7);
            } elseif ($module['module_id'] == 1 && $module['module_status'] == 1) {
                $data['articles'] = $this->articles_model->get_articles(7);
            }
            $data['view'] = 'back/update_module';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $data['id'] = $module_id;


            $this->load->view('back/template/layout', $data);
        } else {

            if ($this->input->post('btn_update') == "Update") {

                $this->module_model->update_module($module_id, $module_status);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                        . 'Module mis à jour avec succès !</div>');

                redirect("admin/update_module/" . $module_id);
            } else {
                redirect('admin/update_module/' . $module_id);
            }
        }
    }

    public function liste_modules()
    {
        $data['title'] = 'tous les modules';
        $data['view'] = 'back/liste_modules';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data['modules'] = $this->module_model->get_all();
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function liste_administrateurs()
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {
            $data['title'] = 'un titre';
            $data['view'] = 'back/liste_administrateurs';
            $data['administrateurs'] = $this->login_model->get_all_administrators();
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
        }
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function delete_admin($id)
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {

            $this->login_model->delete_user($id);
            redirect('admin/liste_administrateurs');
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function delete_user($user_id)
    {

        $this->login_model->delete_user($user_id);
        redirect('admin/liste_users');
    }

    public function update_contact($user_id = null)
    {

        $titre = $this->input->post("txt_nom");
        $mail = $this->input->post("txt_mail");
        $description = $this->input->post("txt_description");


        $this->form_validation->set_rules("txt_nom", "Nom", "trim|required");
        $this->form_validation->set_rules("txt_mail", "Email", "trim|required");
        $this->form_validation->set_rules("txt_description", "Description", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['user'] = $this->login_model->get_user_by_id($user_id);
            $data['view'] = 'back/update_contact';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $data['id'] = $user_id;


            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_update') == "Update") {

                if ($this->login_model->update_contact($user_id, $titre, $mail, $description)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                            . 'Cet contact a été mis à jour avec succès !</div>');
                    redirect("admin/update_contact/" . $user_id);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de la mise à jour du contact!</div>');
                    redirect('admin/update_contact/' . $user_id);
                }
            } else {
                redirect('admin/update_contact/' . $user_id);
            }
        }
    }

    public function update_user($user_id = null)
    {

        $nom = $this->input->post("txt_nom");
        $prenom = $this->input->post("txt_prenom");
        $mail = $this->input->post("txt_mail");
        $role = $this->input->post("txt_role");
        $status = $this->input->post("txt_status");


        $this->form_validation->set_rules("txt_nom", "Nom", "trim|required");
        $this->form_validation->set_rules("txt_prenom", "Prénom", "trim|required");
        $this->form_validation->set_rules("txt_mail", "Email", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['user'] = $this->login_model->get_user_by_id($user_id);
            $data['roles'] = $this->role_model->get_all();
            $data['view'] = 'back/update_user';
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $data['id'] = $user_id;
            $this->login_model->set_old($user_id);


            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_update') == "Update") {

                if ($this->login_model->update_user($user_id, $nom, $prenom, $mail, $role, $status)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                            . 'Cet utilisateur a été mis à jour avec succès !</div>');
                    redirect("admin/update_user/" . $user_id);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec de la mise à jour de l\'utilisateur!</div>');
                    redirect('admin/update_user/' . $user_id);
                }
            } else {
                redirect('admin/update_user/' . $user_id);
            }
        }
    }

    public function update_admin($user_id = null)
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {


            $nom = $this->input->post("txt_nom");
            $prenom = $this->input->post("txt_prenom");
            $login = $this->input->post("txt_login");
            $password = $this->input->post("txt_password");
            $email = $this->input->post("txt_email");
            $role = $this->input->post("txt_role");
            $active = ($this->input->post("txt_active") != '') ? 1 : 0;


            $this->form_validation->set_rules("txt_nom", "Nom", "trim|required");
            $this->form_validation->set_rules("txt_prenom", "Prénom", "trim|required");
            $this->form_validation->set_rules("txt_login", "Login", "trim|required");
            $this->form_validation->set_rules("txt_password", "Mot de passe", "trim|required");
            $this->form_validation->set_rules("txt_email", "Email", "trim|required");
            $this->form_validation->set_rules("txt_role", "Rôle", "trim|required");

            if ($this->form_validation->run() == FALSE) {

                $data['title'] = 'un titre';
                $data['user'] = $this->login_model->get_user_by_id($user_id);
                $data['roles'] = $this->role_model->get_all();
                $data['view'] = 'back/update_admin';
                $data['show_header'] = TRUE;
                $data['show_nav'] = TRUE;
                $data = $this->get_site_identity($data);
                $data['id'] = $user_id;

                $this->load->view('back/template/layout', $data);
            } else {


                if ($this->input->post('btn_update') == "Modifier") {

                    $this->login_model->update_admin($user_id, $nom, $prenom, $login, $email, $role, $password, $active);
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                            . 'Administrateur mis à jour avec succès !</div>');
                    redirect("admin/update_admin/" . $user_id);
                } else {
                    redirect('admin/update_admin/' . $user_id);
                }
            }
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function liste_vendeurs()
    {

        $data['title'] = 'un titre';
        $data['additional_css'] = array('vendeurs');
        $data['view'] = 'back/liste_vendeurs';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function form_administrateurs()
    {

        $data['title'] = 'un titre';
        $data['additional_css'] = array('administrateurs');
        $data['view'] = 'back/form_administrateurs';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function liste_roles()
    {
        if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') {

            $data['title'] = 'un titre';
            $data['view'] = 'back/liste_roles';
            $data['roles'] = $this->role_model->get_all();
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        } else {
            $data['title'] = 'accès refusé';
            $data['view'] = 'back/access_denied_view';
            $this->output->set_status_header('403');
            $data['show_header'] = TRUE;
            $data['show_nav'] = TRUE;
            $data = $this->get_site_identity($data);
            $this->load->view('back/template/layout', $data);
        }
    }

    public function liste_contacts()
    {

        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_contacts';
        $data['contacts'] = $this->login_model->get_all_contacts();
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function form_roles()
    {

        $data['title'] = 'un titre';
        $data['additional_css'] = array('roles');
        $data['view'] = 'back/form_roles';
        $data['show_header'] = TRUE;
        $data['show_nav'] = TRUE;
        $data = $this->get_site_identity($data);
        $this->load->view('back/template/layout', $data);
    }

    public function lister_personnes()
    {
        $data['title'] = 'un titre';
        $data['personnes'] = $this->personnes_model->get_personnes();
        $data['view'] = 'personnes_view';
        $this->load->view('template/template', $data);
    }

}
