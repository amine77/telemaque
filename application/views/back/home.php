<script>
    $(function () {
        $('#sandbox-container-from input, #sandbox-container-to input').datepicker({
            format: "yyyy-mm-dd",
            language: "fr",
            todayBtn: "linked",
            autoclose: true
        });


    });
</script>
<div id="bloc_contenu">
    <?php //echo '<pre>';print_r($_SESSION); echo '<pre>'; ?>
    <h1>Tableau de bord</h1>
    <p class="text-right"><button class="btn btn-default" type="collapse" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><strong>Du</strong> 2015-07-14 <strong>Au</strong> 2015-08-18 &nbsp;<span class="caret"></span></button></p>
    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
            </div>
            <div class="col-lg-3 col-sm-3" id="sandbox-container-from">
                <strong>Du</strong> <input class="form-control" id="txt_born_at" name="txt_born_at" placeholder="yyyy-mm-jj" type="text"  />
            </div>
            <div class="col-lg-3 col-sm-3"  id="sandbox-container-to">
                <strong>Jusqu'au</strong> <input class="form-control" id="txt_born_at" name="txt_born_at" placeholder="yyyy-mm-jj" type="text" />
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-md-1 col-md-offset-11">
                <input class="btn btn-info" type="submit" id="choose_date_range" name="choose_date_range" value="Enregistrer"/>
            </div>
        </div>
    </div><br>
    <table id="bloc_recap_visiteurs">
        <tr>
            <td>
                Utilisateurs inscrits : 	XXXXXX
                <br>
                Nouveaux utilisateurs : 	XXXX
                <br>
                Utilisateurs non activés: 	XXXX
                <br>
                Moyenne d'age des utilisateurs: 	XXXX
                <br>
                Département d'oû provient le plus des utilisateurs: 	XXXX
                <br>
                Date de la dernière inscription des utilisateurs: 	XXXX
            </td>
        </tr>
    </table>

    <table id="bloc_recap_chiffres">
        <tr>
            <td>
                Ventes
                <br>
                <span class="chiffres">XXX XXX</span>
            </td>
            <td>
                Visites
                <br>
                <span class="chiffres">XXX XXX</span>
            </td>
            <td>
                Paniers
                <br>
                <span class="chiffres">XXX XXX</span>
            </td>
            <td>
                Panier moyen
                <br>
                <span class="chiffres">XXX XXX</span>
            </td>
            <td>
                Bénéfice net
                <br>
                <span class="chiffres">XXX XXX</span>
            </td>
        </tr>
    </table>

    <div class="clear">
    </div>


</div>

