<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 17:16
 */
namespace backend\modules\admin\controllers;

use backend\modules\admin\models\BackendRole;
use backend\modules\admin\models\BackendRoleSearch;
use backend\modules\scheme\models\AppPackage;
use backend\modules\system\models\AppMenu;
use \common\models\system\App;
use yii\web\NotFoundHttpException;

class BackendRoleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new BackendRoleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        $model = BackendRole::find()->all();

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model
        ]);
    }

    public function actionCreate()
    {
        $model = new BackendRole();
        $model->status = 1;

        /* 默认选定的项 */
//        $model->data=['1','5'];
        $app=App::find()->where(['code'=>'backend'])->all();

        foreach($app as $item){
            $menus[$item->code]=AppMenu::getSidebarExcludeBackend($item->code);
            $data[$item->code]=AppMenu::getTreeExcludeBackend($item->code);
        }

        if ($model->load(\Yii::$app->request->post()) ) {
            $parames = \Yii::$app->request->post();

//            var_dump($parames);

            if(!isset($parames['BackendRole']['data']) ){
                \Yii::$app->getSession()->setFlash('error','请添加平台管理');
                return $this->redirect('create');
            }else{
                if(empty($parames['BackendRole']['data']['backend'])){
                    \Yii::$app->getSession()->setFlash('error','请添加平台管理');
                    return $this->redirect('create');
                }
            }

            $model->created_at = time();
            $model->updated_at = time();
            $model->data = implode(',',$parames['BackendRole']['data']);

            $model->save();
            return $this->redirect(['index']);
        } else {

            $model->data = explode(',',$model->data);
            return $this->render('create', [
                'model' => $model,
                'menus' =>$menus,
                'data'  =>$data,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*app menu*/
//        $menus = AppMenu::getTreeForSidebar();
        $app=App::find()->where(['code'=>'backend'])->all();
        foreach($app as $item){
            $menus[$item->code]=AppMenu::getSidebarExcludeBackend($item->code);
            $data[$item->code]=AppMenu::getTreeExcludeBackend($item->code);
        }

        /* 更新时显示被选中的项 */
        $model->data_select= explode(',',$model->data_select);


        if ($model->load(\Yii::$app->request->post()) ) {
            $parames = \Yii::$app->request->post();
            if(!isset($parames['BackendRole']['data'])){
                \Yii::$app->getSession()->setFlash('error','请添加平台管理');
                $this->redirect('create');
            }

            $model->updated_at = time();
            $model->data_select = implode(',', $parames['BackendRole']['data']);
            $model->data =AppPackage::getAllRolesId($model);

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'menus' => $menus,
                'data'  => $data,
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = BackendRole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}