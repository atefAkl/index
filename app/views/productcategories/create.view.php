<div class="tempDiv" style="min-height: 90vh; margin: auto; padding: 75px 16px">
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data" style="width: 50%; min-width: 500px">
        <fieldset>
            <legend><b><?= $text_legend ?></b></legend>
            <div class="input_wrapper n100">
                <label class="floated block"><b><?= $text_label_name ?></b></label>
                <input required type="text" name="CategoryName" id="Name" maxlength="60" value="<?= $this->showValue('Name') ?>">
            </div>

            <div class="input_wrapper_other border block padding">
                <label class="floated block"><b><?= $text_label_desc?></b></label>
                <textarea   name="CategoryDesc" class="border" style="color:#167698">
                </textarea>
            </div>

            <div class="input_wrapper n100">
                <label class="floated block"><b><?= $text_label_image ?></b></label>
                <input type="file" name="CategoryImage" accept="image/*">
            </div>

            <div class="input_wrapper_other n100 padding select">
                <label class="floated block"><b><?= $text_label_parent ?></b></label>
                <select name="ParentCategory" id="ParentCategory">
                    <option value="0">No Parent Categories Yet</option>
                    <?php
                    if ($fields != false) {
                        foreach ($fields as $field) { ?>
                            <option value="<?= $field->FieldId; ?>"><?= $field->FieldName;?></option>
                <?php   }
                    } ?>
                </select>
            </div>

            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>
<?php
