<?php

/**
 * 字符 text
 * @var $config array
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group field-app-name required">
            <label class="control-label col-md-2" for="app-name"><?= $config['title'] ?></label>
            <div class='col-md-4'>
                <input type="text" id="systemConfig-<?= $config['name'] ?>" class="form-control"
                       name="systemConfig[<?= $config['name'] ?>]" value="<?= $config['value'] ?>"
                       maxlength="100">
            </div>
            <div class='col-md-offset-2 col-md-10'></div>
            <div class='col-md-offset-2 col-md-10'>
                <div class="help-block"><?= $config['remark'] ?></div>
            </div>
        </div>
    </div>
</div>