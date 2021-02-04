<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data"  style="padding-top: 55px;width: 50%; min-width: 500px">
    <fieldset>
        <!---->
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n100">
            <label class="floated block"><?= $text_label_name ?></label>
            <input required type="text" name="CategoryName" id="Name" maxlength="20" value="<?= $this->showValue('CategoryName', $category) ?>">
        </div>

        <div class="input_wrapper_other border block padding">
            <label class="floated block"><b><?= $text_label_desc?></b></label>
            <textarea   name="CategoryDesc" class="border" style="color:#167698">
<?= $this->showValue('CategoryDesc', $category) ?>"
            </textarea>
        </div>

        <div class="input_wrapper_other border padding block n100">
            <label class="floated block"><?= $text_label_image ?></label>
            <input type="file" name="CategoryImage" accept="image/*">
            <?php if ($category->CategoryImage !== ''): ?>
                <div class="block n100" style="overflow: hidden">
                    <img class="block border" src="/uploads/images/<?= $category->CategoryImage ?>" width="150" height="150">
                </div>
            <?php endif; ?>
        </div>

        <div class="input_wrapper_other n50 padding select">
            <label class="floated block"><?= $text_label_parent ?></label>
            <select name="ParentCategory" id="ParentCategory">
                <option value="null">No Parent Categories Yet</option>
                <?php
                if ($categories != false) {
                    foreach ($categories as $cat) {                        ?>
                        <option value="<?= $cat->CategoryId; ?>" <?= $category->ParentCategory == $cat->CategoryId ? 'selected' : ''?>>
                            <?= $cat->CategoryName, $category->ParentCategory, $cat->CategoryId ;?></option>
                    <?php } } ?>
            </select>
        </div>

        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">

        <?php var_dump($categories);
        var_dump($categories);
        ?>
    </fieldset>
</form>