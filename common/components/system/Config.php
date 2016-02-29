<?php
/**
 * User: AndySong
 * Date: 2015-11-17
 * Time: 11:10
 */
namespace common\components\system;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\system\SystemConfig;

/**
 * 系统配置
 * @package common\components\system
 */
class Config
{
    /**
     * 获取系统配置项
     * @param $key
     * @return string
     */
    public function get($key)
    {
        if (!$key) return '';

        $config = Yii::$app->cache->get('config');
        if (empty($config) || !is_array($config)) {
            $config = $this->rebuildCache();
        }

        if (isset($config[$key])) {
            return $config[$key];
        }

        return '';
    }

    /**
     * 清除缓存
     * @return array
     */
    public function rebuildCache()
    {
        $config = ArrayHelper::map(SystemConfig::find()->all(), 'name', 'value');
        Yii::$app->cache->set('config', $config);
        return $config;
    }
}

