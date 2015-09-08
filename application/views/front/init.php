<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Installation CMS</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/lib/twitter/css/bootstrap.min.css" rel="stylesheet">
        <?php
        if (isset($lib_css) && !empty($lib_css) && is_array($lib_css)) {
            foreach ($lib_css as $value) {
                echo'<link href="' . base_url() . 'assets/lib/' . $value . '.css" rel="stylesheet" type="text/css">';
            }
        }
        if (isset($lib_js) && !empty($lib_js) && is_array($lib_js)) {
            foreach ($lib_js as $value) {
                echo'<script src="' . base_url() . 'assets/lib/' . $value . '.js"></script>';
            }
        }
        ?>
        <style>
            #page{
                width:500px;
                margin:0 auto;
                font-size: 15px;
            }
            h1,h3{text-align:center;}
            #install-cms{margin-top:30px;}

        </style>


    </head>
    <body>
        <div id="page">

            <?php if ($page == "intro"): ?>

                <h1>Installation du CMS</h1>
                <h3>Veuillez remplir les champs demandés</h3>




                <div id="install-cms"> 
                    <form method="POST">
                        <table cellspacing="0" cellpadding="0" class="table table-hover">
                            <tr>
                                <td>
                                    <label>Hostname</label>
                                </td>
                                <td>
                                    <input type="text" name="hostname" class="form-control" required value="localhost"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Username</label>
                                </td>
                                <td>
                                    <input type="text" name="username" class="form-control" required="required" value="root" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Mot de passe</label>
                                </td>
                                <td>
                                    <input type="password" class="form-control" name="password" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nom de la base</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="name_bdd" required="required"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="valider" class="btn btn-primary" value="Valider"/>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>

             
            <?php endif; ?>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
