<div class="tempDiv" style="min-height: 90vh; margin: auto; padding: 75px 16px">
    <div class="container">
        <a href="/props/create" class="button"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
        <table class="data">
            <thead>
                <tr>
                    <th><?= $text_table_name ?></th>
                    <th><?= $text_table_prop_input ?></th>
                    <th><?= $text_table_control ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(false !== $props): foreach ($props as $prop): ?>
                <tr>
                    <td><?= ucwords(str_replace('_', ' ', $prop->PXName)) ?></td>
                    <td><?php echo $this->createInputFrom($prop) ?></td>
                    <td>
                        <a href="/props/edit/<?= $prop->PXId ?>"><i class="fa fa-edit"></i></a>
                        <a href="/props/delete/<?= $prop->PXId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>