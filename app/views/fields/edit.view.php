<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data"  style="padding-top: 55px;width: 50%; min-width: 500px">
    <fieldset>
        <!---->
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n100">
            <label class="floated block"><?= $text_label_name ?></label>
            <input required type="text" name="FieldName" id="Name" maxlength="60" value="<?= $this->showValue('FieldName', $field) ?>">
        </div>

        <div class="input_wrapper_other border block padding">
            <label class="floated block"><b><?= $text_label_desc?></b></label>
            <textarea   name="FieldDesc" class="border" style="color:#167698">
<?= $this->showValue('FieldDesc', $field) ?>"
            </textarea>
        </div>

        <div class="input_wrapper_other border padding block n100">
            <label class="floated block"><?= $text_label_image ?></label>
            <input type="file" name="FieldImage" accept="image/*">
            <?php if ($field->FieldImage !== ''): ?>
                <div class="block n100" style="overflow: hidden">
                    <img class="block border" src="/uploads/images/<?= $field->FieldImage ?>" width="150" height="150">
                </div>
            <?php endif; ?>
        </div>

        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">

    </fieldset>
</form>