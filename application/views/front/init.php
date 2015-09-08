<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #page{
                width:300px;
                margin:0 auto;
                font-size: 15px;
            }
      
        </style>
    </head>
    <body>
        <div id="page">
            <h1>Installation du CMS</h1>
            <h3>Veuillez remplir les champs demandés</h3>

            <form method="POST">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <label>Hostname</label>
                        </td>
                        <td>
                            <input type="text" name="hostname" required value="localhost"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" required="required" value="root" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mot de passe</label>
                        </td>
                        <td>
                            <input type="text" name="password" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom de la base</label>
                        </td>
                        <td>
                            <input type="text" name="name_bdd" required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="valider" value="Valider"/>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
