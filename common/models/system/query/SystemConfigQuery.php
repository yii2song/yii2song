<?php

namespace common\models\system\query;

use yii\db\ActiveQuery;
use common\models\system\SystemConfig;

/**
 * This is the ActiveQuery class for [[SystemConfig]].
 *
 * @see SystemConfig
 */
class SystemConfigQuery extends ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=' . SystemConfig::STATUS_ACTIVE);
        return $this;
    }

    /**
     * @inheritdoc
     * @return SystemConfig[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SystemConfig|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}