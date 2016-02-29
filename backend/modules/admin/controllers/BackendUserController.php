<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 16:50
 */
namespace backend\modules\admin\controllers;

use backend\models\Admin;
use backend\modules\admin\models\BackendUser;
use backend\modules\admin\models\BackendUserSearch;
use yii\data\ActiveDataProvider;

class BackendUserController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new CompanyScale();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->scale_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $transaction = \Yii::$app->db->beginTransaction();

        try{
            $this->findModel($id)->delete();

            if(Admin::findOne(['user_id'=>$id]))
                Admin::findOne(['user_id'=>$id])->delete();

            $transaction->commit();
        }catch(Exception $e){
            \Yii::$app->getSession()->setFlash('error','删除失败');
            $transaction->rollBack();
        }

        \Yii::$app->getSession()->setFlash('success','删除成功');
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        $searchModel = new BackendUserSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        $model = BackendUser::find()->all();

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model
        ]);

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success','修改成功');
            return $this->redirect(['view', 'id' => $model->scale_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = BackendUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}