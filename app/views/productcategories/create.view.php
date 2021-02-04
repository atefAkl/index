<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data" style="padding-top: 55px;width: 50%; min-width: 500px">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n100">
            <label class="floated block"><?= $text_label_name ?></label>
            <input required type="text" name="CategoryName" id="Name" maxlength="20" value="<?= $this->showValue('Name') ?>">
        </div>

        <div class="input_wrapper_other border block padding">
            <label class="floated block"><b><?= $text_label_desc?></b></label>
            <textarea   name="CategoryDesc" class="border" style="color:#167698">
            </textarea>
        </div>

        <div class="input_wrapper n100">
            <label class="floated block"><?= $text_label_image ?></label>
            <input type="file" name="CategoryImage" accept="image/*">
        </div>

        <div class="input_wrapper_other n100 padding select">
            <label class="floated block"><?= $text_label_parent ?></label>
            <select name="ParentCategory" id="ParentCategory">
                <option value="0">No Parent Categories Yet</option>
                <?php
                if ($categories != false) {
                    foreach ($categories as $category) { ?>
                        <option value="<?= $category->CategoryId; ?>"><?= $category->CategoryName;?></option>
                <?php } } ?>
            </select>
        </div>

        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>
<?php
var_dump($newCategory);