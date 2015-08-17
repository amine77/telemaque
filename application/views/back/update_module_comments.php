 <?php if ($module['module_status'] == 1) { ?>
        <div class="row">
            <div id="comments" class=".col-xs-12 .col-md-8">
                <?php
                if (isset($comments) && is_array($comments)) {

                    if (count($comments) > 0) {
                        ?>
                        <h4>Liste des commentaires</h4>
                        <table id="comments" class="table-hover">
                            <tr>
                                <th>Date</th>
                                <th>Pseudo</th>
                                <th>Article concerné</th>
                                <th>Commentaire</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($comments as $comment) { ?>
                                <tr>
                                    <?php
                                    $is_published = ($comment['is_published'] == 1 ) ? '<span class="label label-success">Publié</span>' : '<span class="label label-info">En attente</span>';
                                    $publish = ($comment['is_published'] != 1 ) ? '<a title="publier" href="' . base_url('admin/publish_comment/' . $comment['comment_id']) . '"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></a>' : '&nbsp;&nbsp;&nbsp;&nbsp;';
                                    ?> 
                                    <td><?= $comment['created_at'] ?></td>
                                    <td><?= $comment['pseudo'] ?></td>
                                    <td><a target="_blank" href="<?= base_url('articles/' . $comment['article_id']) ?>"><?= $comment['article_label'] ?></a></td>
                                    <td><?= $comment['comment_text'] ?></td>
                                    <td><?= $is_published ?></td>
                                    <td> <?= $publish ?> <a title="supprimer"   data-confirm="Etes-vous certain de vouloir supprimer ce commentaire?" href="<?= base_url('admin/delete_comment/' . $comment['comment_id']) ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                </tr>
                            <?php } ?>

                            <?php
                        } else {
                            echo '<p>Aucun commentaire trouvé.</p>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
    }
    ?>