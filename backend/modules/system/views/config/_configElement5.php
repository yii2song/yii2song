<?php

/**
 * 枚举 textarea
 * 值为选择后的值
 * 配置项如：
 * 0:关闭
 * 1:开启
 * @var $config array
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group field-app-name required">
            <label class="control-label col-md-2" for="app-name"><?= $config['title'] ?></label>
            <div class='col-md-3'>
                <select class="form-control"
                        name="systemConfig[<?= $config['name'] ?>]"
                        id="systemConfig-<?= $config['name'] ?>">
                    <?php

                    foreach(explode("\r\n", trim($config['extra'])) as $item) {
                        if (!empty($item)) {
                            list($key, $val) = explode(':', trim($item));
                            $selected = '';
                            if ($key == $config['value']) {
                                $selected = ' selected';
                            }
                            echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class='col-md-offset-2 col-md-10'></div>
            <div class='col-md-offset-2 col-md-10'>
                <div class="help-block"><?= $config['remark'] ?></div>
            </div>
        </div>
    </div>
</div>