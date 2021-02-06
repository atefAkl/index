<div class="tempDiv" style="min-height: 90vh; min-width: 90vw; margin: auto; padding: 16px">
    <div class="container">
        <a href="/fields/create" class="button"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
        <table class="data">
            <thead>
                <tr>
                    <th><?= $text_table_field_image ?></th>
                    <th><?= $text_table_field_name ?></th>
                    <th><?= $text_table_field_desc ?></th>
                    <th><?= $text_table_field_tags ?></th>
                    <th><?= $text_table_control ?></th>
                </tr>
            </thead>
            <tbody>
            <?php if(isset($fields) && false !== $fields): foreach ($fields as $field ): ?>

                <tr>
                    <td><img src="/uploads/images/<?= $field->FieldImage ?>" alt="" width="50" height="50"></td>
                    <td><?= $field->FieldName ?></td>
                    <td><?= $field->FieldDesc ?></td>
                    <td><?= $field->FieldChildCat ?></td>
                    <td>
                        <a href="/fields/edit/<?= $field->FieldId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/fields/delete/<?= $field->FieldId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
        <a href="/fields/create" >Create New</a>
    </div>
</div>