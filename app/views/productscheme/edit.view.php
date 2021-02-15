<div class="tempDiv" style="min-height: 90vh; margin: auto; padding: 75px 16px">
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><?= $text_legend ?></legend>
<?php
$ps = explode(' | ', $scheme->PSName);
$psField = $ps[0]; $psCat = $ps[1]; $psName = $ps[2];

    var_dump(($ps));

?>
            <div class="input_wrapper_other n50 padding select">
                <label class="block"><b><?= $text_label_PSField ?></b></label>
                <select name="Field" id="Field">
                    <option value="0">No Fields Selected Yet</option>
                    <?php if ($fields != false) {
                        foreach ($fields as $field) { ?>
                            <option value="<?= html_entity_decode($field->FieldName);?>" <?= ($ps[0] == $field->FieldName) ? 'selected' : '';?> > <?= $field->FieldName;?></option>
                    <?php   }
                    } ?>
                </select>
            </div>

            <div class="input_wrapper_other n50 padding select">
                <label class="block"><b><?= $text_label_PSCat ?></b></label>
                <select name="Category" id="Category">
                    <option value="0">No Categories Selected Yet</option>
                    <?php
                    if ($categories != false) {
                        foreach ($categories as $cat) { ?>
                            <option value="<?= html_entity_decode($cat->CategoryName); ?>" <?=($psCat == html_entity_decode($cat->CategoryName)) ? 'selected' : ''?> ><?= $cat->CategoryName;?></option>
                        <?php   }
                    } ?>
                </select>
            </div>

            <div class="input_wrapper_other n100 border padding">
                <label ><b><?= $text_label_PSName ?></b></label>
                <input required type="text" name="PSName" maxlength="40" value="<?=$psName;?>">
            </div>
            <div class="input_wrapper_other n50">
                <label><?= $text_label_properties ?></label>
                <?php if ($props !== false): foreach ($props as $prop): ?>
                    <label class="checkbox block">
                        <input type="checkbox" name="Props[]" id="props" <?= in_array($prop->PXId, $schemeProps) ? 'checked' : '' ?> value="<?= $prop->PXId ?>">
                        <div class="checkbox_button"></div>
                        <span><?= $prop->PXName ?></span>
                    </label>
                <?php endforeach; endif; var_dump($schemeProps); ?>
            </div>


            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
    <?php
    foreach ($fields as $field) {

        //var_dump($psField);
        var_dump($psField == str_replace('&amp;', '&', $field->FieldName));
    }
    ?>

</div>
