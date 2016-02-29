<?php

namespace backend\modules\system\controllers;

use backend\modules\system\models\search\SystemConfigSearch;
use common\models\common\Status;
use Yii;
use yii\web\Controller;
use backend\modules\system\models\SystemConfig;

/**
 * 系统配置中心
 * Class ConfigController
 * @package backend\modules\system\controllers
 */
class ConfigController extends Controller
{
    /**
     * 配置中心首页
     * @param int $currentGroup
     * @return string
     */
    public function actionIndex($currentGroup = 0)
    {
        $groups = SystemConfig::groups();
        if (!isset($groups[$currentGroup])) {
            $currentGroup = SystemConfig::FIRST_GROUP_INDEX;
        }
        $configs = SystemConfig::find()
            ->where(['group' => $currentGroup])
            ->all();

        return $this->render('index', [
            'groups' => $groups,
            'currentGroup' => $currentGroup,
            'configs' => $configs,
        ]);
    }

    /**
     * 配置保存
     * @return string
     */
    public function actionSave()
    {
        $systemConfig = Yii::$app->request->post();
        $systemConfig = $systemConfig['systemConfig'];
        $error = 0;
        foreach ($systemConfig as $key => $val) {
            $result = SystemConfig::updateAll([
                'value' => $val,
            ], [
                'name' => $key,
            ]);

            if ($result) {
                $error++;
            }
        }

        $_output = json_encode(Status::success('配置保存成功！'));
        if ($error > 0) {
            $_output = json_encode(Status::error());
        }

        return $_output;
    }

    /**
     * 配置数据管理
     * @return string
     */
    public function actionManage()
    {
        $searchModel = new SystemConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Creates a new SystemConfig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemConfig();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SystemConfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SystemConfig model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SystemConfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemConfig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemConfig::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
