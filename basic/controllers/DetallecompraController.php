<?php

namespace app\controllers;

use Yii;
use app\models\Detallecompra;
use app\models\DetallecompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\bootstrap\Modal;

/**
 * DetallecompraController implements the CRUD actions for Detallecompra model.
 */
class DetallecompraController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            
                 /** Para los permisos  se hace lo siguiente*/ 
            'access' => [
               'class' => \yii\filters\AccessControl::className(),
               'only' => ['index','update','create','delete','view'],
               //Para los ussuario autenticados como super Admin
               'rules' => [
                   [
                     'allow' =>true,
                     'actions' =>['index','view','create','update','delete'],
                     'roles' =>['@'],
                     'matchCallback' => function ($rule,$action){
                                                //Al modelo systemuser
                                                return \app\models\Systemuser::isUserAdmin(Yii::$app->user->identity->username);
                                         }
                   ],
                
            
               ],
            
             ],
            
        ];
    }

    /**
     * Lists all Detallecompra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetallecompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallecompra model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detallecompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Detallecompra();
        $model->Compra_idCompra = $id;
        $model->Total = 0;
        //Aqui viene el total
        if ($model->load(Yii::$app->request->post())) {
            if( $model->save()){
               return $this->redirect(['compra/view', 'id' => $id]); 
            }
            
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Detallecompra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDetalleCompra]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detallecompra model.
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
     * Finds the Detallecompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detallecompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detallecompra::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
