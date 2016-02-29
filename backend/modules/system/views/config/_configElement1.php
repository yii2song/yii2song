<?php

/**
 * 数字 Number
 * @var $config array
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group field-app-name required">
            <label class="control-label col-md-2" for="app-name"><?= $config['title'] ?></label>
            <div class='col-md-2'>
                <input type="number" id="systemConfig-<?= $config['name'] ?>" class="form-control"
                       name="systemConfig[<?= $config['name'] ?>]" value="<?= $config['value'] ?>"
                       maxlength="11">
            </div>
            <div class='col-md-offset-2 col-md-10'></div>
            <div class='col-md-offset-2 col-md-10'>
                <div class="help-block"><?= $config['remark'] ?></div>
            </div>
        </div>
    </div>
</div>