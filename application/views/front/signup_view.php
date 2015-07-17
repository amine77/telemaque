<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
            <!--link the bootstrap css file-->
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

            <style type="text/css">
                .bloc_form_connex{
                    width: 450px;
                    margin: 0 auto;
                    background-color: #FFFFFF;
                    border: 4px solid #003250;
                    color: #003250;
                }
                
                .bloc_form_connex legend{
                    background-color: #003250;
                    color: #FFFFFF;
                    text-align: center;
                    padding: 5px 0;
                }
                
                .bloc_form_connex input[type='submit'],
                .bloc_form_connex input[type='reset']{
                    margin-top: 10px;
                    padding: 5px 20px;
                    border: 1px solid #005587;
                    background-color: #003250;
                    border-radius: 5px;
                    color: #FFFFFF;
                }
                
                .form-group{
                    margin: 0 5px 15px 5px !important;
                }
                
                .bloc_form_connex input[type='submit']:hover,
                .bloc_form_connex input[type='reset']:hover{
                     background-color: #005587;
                }
                
                .colbox {
                    margin-left: 0px;
                    margin-right: 0px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="row">

                    <!--<div class="col-lg-4 col-sm-4 well bloc_form_connex">-->
                    <div class="bloc_form_connex">
                        <?php
                        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                        echo form_open("inscription/index", $attributes);
                        ?>
                        <fieldset>
                            <legend>Inscription</legend>
                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_username" class="control-label">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_password" class="control-label">Password</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_user_name" class="control-label">Nom</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_user_name" placeholder="Nom" type="text" value="<?php echo set_value('txt_user_name'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_user_name'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_user_surname" class="control-label">Prénom</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_user_surname" placeholder="Prénom" type="text" value="<?php echo set_value('txt_user_surname'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_user_surname'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_born_at" class="control-label">Né(e) le</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_born_at" placeholder="Date de naissance" type="text" value="<?php echo set_value('txt_born_at'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_born_at'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_phone" class="control-label">Téléphone</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_phone" placeholder="Téléphone" type="text" value="<?php echo set_value('txt_phone'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_phone'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_mobile" class="control-label">Mobile</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_mobile" placeholder="Mobile" type="text" value="<?php echo set_value('txt_mobile'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_mobile'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_mail" class="control-label">E-mail</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_mail" placeholder="E-mail" type="text" value="<?php echo set_value('txt_mail'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_mail'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12 text-center">
                                    <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-default" value="Sign up" />
                                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg'); ?>
                    </div>

                </div>
            </div>


            <!--load jQuery library-->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <!--load bootstrap.js-->
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        </body>
    </html>