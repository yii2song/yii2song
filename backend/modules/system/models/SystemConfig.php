<?php

namespace backend\modules\system\models;

use Yii;
use common\models\system\SystemConfig as CommonSystemConfig;

/**
 * 系统配置
 *
 * @property string  $id
 */
class SystemConfig extends CommonSystemConfig
{

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        Yii::$app->session->setFlash(
            'success',
            '系统配置项保存成功！'
        );
    }
}
