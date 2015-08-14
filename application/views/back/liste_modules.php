

<div id="bloc_contenu">

    <h1>Liste des modules</h1>

    <?php if (is_array($modules)) { ?>
        <table class="table table-hover">
            <tr>
                <th>Module</th>
                <th>Status </th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($modules as $module) { ?>
                <?php $status = ($module['module_status'] == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>'; ?>
                <tr>
                    <td><?= $module['module_label'] ?></td>
                    <td><?= $status ?></td>
                    <td><?= $module['module_description'] ?></td>
                    <td> <h4><a title="configurer" href="<?= base_url('admin/update_module/' . $module['module_id']) ?>">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a></h4>
                    </td>
                </tr>

            <?php }
            ?>
        </table>      
        <?php
    }
    ?>


</div>
<br><br>
