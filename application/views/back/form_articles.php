<div id="bloc_contenu">
    <h1>Formulaire d'articles</h1>
    
    
    <form method="post" action="#">
        <table class="tableau_formulaire" id="tableau_form_articles">
            <tr>
                <td class="col_label">
                    <label for="libelle">
                        Libéllé :
                    </label>
                </td>
                <td class="col_input">
                    <input type="text" name="libelle">
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="reference">
                        Référence :
                    </label>
                </td>
                <td class="col_input">
                    <input type="text" name="reference">
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="reference">
                        Catégorie :
                    </label>
                </td>
                <td class="col_input">
                    <select>
                        <option value="">Jeux, jouets...</option>
                        <option value="">DVD et Blu Ray</option>
                        <option value="">Livres, romans et BD</option>
                        <option value="">Musique</option>
                        <option value="">Autos, motos, pièces et accessoires</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col_label" id="label_descriptif">
                    <label for="descriptif">
                        Descriptif :
                    </label>
                </td>
                <td class="col_input">
                    <textarea name="descriptif"></textarea>
                </td>
            </tr>
            
            <!-- ----------------- Separation ----------------- -->
            <tr>
                <td class="col_label separation">
                </td>
                <td class="col_input separation">
                </td>
            </tr>
            <!-- ----------------- Separation ----------------- -->
            
            <tr>
                <td class="col_label" id="label_caracteristiques">
                    <label>
                        Caractéristiques :
                    </label>
                </td>
                <td class="col_input" id="caracteristiques">
                    
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="carac_label">
                                <select>
                                    <option value="">Dimensions</option>
                                    <option value="">Poids</option>
                                    <option value="">Couleur</option>
                                </select>
                            </td>
                            <td class="carac_input">
                                <input type="text" name="dynamique">
                            </td>
                        </tr>
                        <tr>
                            <td class="carac_label">
                                <input type="text" name="dynamique" value="Caractéristique">
                            </td>
                            <td class="carac_input">
                                <input type="text" name="dynamique" value="valeur">
                            </td>
                        </tr>
                        <tr>
                            <td class="carac_label">
                            </td>
                            <td class="carac_input">
                                <button>+ prédéfini</button>
                                <button>+ personnalisé</button>
                            </td>
                        </tr>
                    </table>
                    
                </td>
            </tr>
            
            <!-- ----------------- Separation ----------------- -->
            <tr>
                <td class="col_label separation">
                </td>
                <td class="col_input separation">
                </td>
            </tr>
            <!-- ----------------- Separation ----------------- -->
            
            <tr>
                <td class="col_label">
                </td>
                <td class="col_input">
                    <input type="submit" name="admin_submit">
                </td>
            </tr>
        </table>
    </form>

</div>