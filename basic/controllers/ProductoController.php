<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use sjaakp\gcharts\PieChart;
use yii\data\ActiveDataProvider;
use sjaakp\gcharts\ColumnChart;
/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
    
    public function actionGenerargrafico()	{
	$dataProvider = new ActiveDataProvider([
		'query' => Producto::find(),
	    'pagination' => false
	]);
	
	return $this->render('grafico', [
		'dataProvider' => $dataProvider
	]);
}
     public function actionGenerargraficocolumna()	{
	$dataProvider = new ActiveDataProvider([
		'query' => Producto::find(),
	    'pagination' => false
	]);
	
	return $this->render('graficoC', [
		'dataProvider' => $dataProvider
	]);
}

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
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
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionGenerarpdf(){
        
        $productos= Producto::find()->all();
        $vista=$this->renderPartial('reportePDF', [
                'productos' => $productos,
         
            ]); 
        $pdf = new Pdf([
        'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
        'content' => $vista,
        'options' => [
            'title' => 'Privacy Policy - Krajee.com',
            'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
        ],
        'methods' => [
            'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
            'SetFooter' => ['|Page {PAGENO}|'],
        ]
    ]);
    return $pdf->render();
	}
    
    public function actionCreate()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
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
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}