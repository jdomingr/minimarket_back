<?php

namespace app\controllers;

use Yii;
use yii\widgets\ActiveForm;
use app\models\Users;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FormularioVendedor;
use yii\helpers\Url;
use yii\helpers\Html;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	
	private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }
	
	
	
	
	/** Formulario para el ingreso de los vendedores **/
	public function actionRegister(){
		
		 $model = new FormularioVendedor;

         //Mostrará un mensaje en la vista cuando el usuario se haya registrado
         $msg = null;
   
		//Validación mediante ajax
		if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
			{
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
   
		//Validación cuando el formulario es enviado vía post
		//Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
		//También previene por si el usuario tiene desactivado javascript y la
		//validación mediante ajax no puede ser llevada a cabo
		if ($model->load(Yii::$app->request->post()))
		{
			if($model->validate())
			{
			//Preparamos la consulta para guardar el usuario
			$table = new Users;
			$table->Rut = $model->Rut;
			$table->Nombre = $model->Nombre;
			$table->Apellido = $model->Apellido;
			//Encriptamos el password
			$table->Clave =$model->Clave;
			//Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
			//clave será utilizada para activar el usuario
			$table->authKey = $this->randKey("abcdef0123456789", 200);
     
			//Si el registro es guardado correctamente
			if ($table->insert())
			{
			
    
    
                $model->Rut = null;
				$model->Nombre = null;
				$model->Apellido = null;
				$model->Clave = null;
				$model->Clave_repeat = null;
     
				$msg = "Registro exitoso";
                 return $this->render('index');
			}
			else
			{
				$msg = "Ha ocurrido un error al llevar a cabo tu registro";
			}
     
		}
		else
	{
      $model->getErrors();
     }
  }
  return $this->render("ingreso", ["model" => $model, "msg" => $msg]);
		
	}
}
