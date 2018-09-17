<?php

namespace app\controllers;

use app\models\Laman;
use Yii;
use app\models\Artikel;
use app\models\ArtikelKomentar;
use app\models\ArtikelSearch;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Pekerjaan;
use app\models\Survei;
use app\models\SurveiPertanyaanJawaban;
use app\models\Unduhan;
use app\models\Unit;
use app\models\User;
use yii2fullcalendar\models\Event;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['survei','kontak','berita-index','berita-view','hasil','unduh-berkas','komentar','laman-view'],
                        'allow' => true,
                        
                    ],                    
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
        return $this->redirect(['site/login']);
    }

    /**
     * Displays kontak page.
     *
     * @return Response|string
     */
    public function actionKontak()
    {
        $this->layout = '//frontend/main-frontend-view';

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('kontak', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = '//backend/main-login';

        $model = new LoginForm();
        $model->tahun = date('Y');

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['admin/index']);
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->set('tahun',$model->tahun);

            if (User::isAdmin()) {
                return $this->redirect(['admin/index']);
            } elseif (User::isSatker()){
                return $this->redirect(['admin/index']);
            } elseif (User::isUnit()){
                return $this->redirect(['admin/index']);
            }

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

        return $this->redirect(['site/login']);
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

    public function actionDev()
    {
        foreach (Unit::find()->all() as $unit) {
            $list = [
                'id' => $unit->id, 'name' => $unit->nama
            ];
        }

        print_r($list);
    }
}
