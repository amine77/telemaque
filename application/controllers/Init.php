<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InitController
 *
 * @author cé
 */
class Init extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    public function index($etape = "") {
        $data = array();


        if (isset($_POST['valider']) && $etape == 2) {

            $data['page'] = "install-bdd";
            $fp = fopen(APPPATH . "config/infodatabase.txt", "r+"); // 1.On ouvre le fichier en lecture/écriture
            $texte = $_POST['hostname'] . "\r\n";
            $texte.= $_POST['username'] . "\r\n";
            $password = (isset($_POST['password']) && !empty($_POST['password'])) ? $_POST['password'] : " ";
            $texte.= $password . "\r\n";
            $texte.= $_POST['name_bdd'];
            fseek($fp, 0);                     // 4.On se place en début de fichier
            fputs($fp, $texte);            // 5.On écrit dans le fichier le nouveau nb
            fclose($fp);
            // 6.On ferme le fichier


            if ($this->dbforge->create_database($_POST['name_bdd'])) {
                echo 'Database created!';
                $fichier = APPPATH . "config/script.sql";

                $fp = file($fichier);

                $fp[0] = "Use " . $_POST['name_bdd'] . " ; \n";

                $zeData = implode("", $fp);



                $handle = fopen($fichier, 'w+');

                fwrite($handle, $zeData);

                $requetes = explode('<fin>', file_get_contents($fichier));
                $count = 0;
                echo "<h4>Veuillez patienter ...</h4>";
                foreach ($requetes as $req) {
                    $pourcent = $count * 100 / count($requetes);
                    echo "<h5>" . intval($pourcent) . " %</h5>";
                    $this->db->query($req);
                    $count++;
                }
                fclose($handle);
                redirect(base_url());
            }
        } else if (!isset($_POST['valider']) && $etape == 2)
            redirect(base_url());
        else {
            $data['page'] = "intro";
            $this->load->view('front/init', $data);
        }
    }

}
