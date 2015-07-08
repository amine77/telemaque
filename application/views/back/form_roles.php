<div id="bloc_contenu">
    <h1>Formulaire de rôles</h1>
    
    <form method="post" action="#">
        <table class="tableau_formulaire" id="tableau_form_roles">
            <tr>
                <td class="col_label">
                    <label for="nom_role">
                        Nom du rôle :
                    </label>
                </td>
                <td class="col_input">
                    <input type="text" name="nom_role">
                </td>
            </tr>
            <tr>
                <td class="col_label" valign="top">
                    <label for="droits_acces">
                        Droits d'accès :
                    </label>
                </td>
                <td class="col_input" valign="top">
                    <table id="listes_acces">
                        <tr>
                            <td valign="top">
                                <h4>Catalogue</h4>
                                <ul>
                                    <li><input type="checkbox" name="droits_acces">Articles</li>
                                    <li><input type="checkbox" name="droits_acces">Exemplaires</li>
                                    <li><input type="checkbox" name="droits_acces">Catégories</li>
                                    <li><input type="checkbox" name="droits_acces">Mots-clés</li>
                                </ul>
                            </td>
                            <td valign="top">
                                <h4>Usagers</h4>
                                <ul>
                                    <li><input type="checkbox" name="droits_acces">Clients</li>
                                    <li><input type="checkbox" name="droits_acces">Vendeurs</li>
                                    <li><input type="checkbox" name="droits_acces">Paniers</li>
                                </ul>
                            </td>
                            <td valign="top">
                                <h4>Administration</h4>
                                <ul>
                                    <li><input type="checkbox" name="droits_acces">Administrateurs</li>
                                    <li><input type="checkbox" name="droits_acces">Roles</li>
                                    <li><input type="checkbox" name="droits_acces">Contacts</li>
                                </ul>
                            </td>
                            <td valign="top">
                                <h4>Autres</h4>
                                <ul>
                                    <li><input type="checkbox" name="droits_acces">Modules</li>
                                    <br>
                                    <li><input type="checkbox" name="droits_acces">Structure</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                    
                </td>
            </tr>
            <tr>
                <td class="col_label">
                </td>
                <td class="col_input">
                    <input type="submit" name="role_submit">
                </td>
            </tr>
        </table>
    </form>


</div>