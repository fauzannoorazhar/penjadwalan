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
    public $layout = '//frontend/main-frontend';

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

    public function actionSurvei($id)
    {
        $this->layout = '//frontend/main-frontend-survei';

        $pekerjaan = Pekerjaan::findOne($id);

        if ($pekerjaan->status_pengisian_survei == Pekerjaan::SUDAH_DIISI) {
            return $this->redirect(['site/selesai']);
        }

        $survei = Survei::findOne($pekerjaan->id_survei);
        $pekerjaan->status_pengisian_survei = Pekerjaan::PENGISIAN;
        $pekerjaan->save(false);

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post('pertanyaan');

            foreach ($post as $id_survei_pertanyaan => $jawaban) {
                $surveiPertanyaanJawaban = new SurveiPertanyaanJawaban();
                $surveiPertanyaanJawaban->id_pekerjaan = $pekerjaan->id;
                $surveiPertanyaanJawaban->id_survei_pertanyaan = $id_survei_pertanyaan;
                $surveiPertanyaanJawaban->jawaban = $jawaban;
                $surveiPertanyaanJawaban->save(false);

                $pekerjaan->status_pengisian_survei = Pekerjaan::SUDAH_DIISI;
                $pekerjaan->waktu_pengisian_survei = date('Y-m-d H:i:s');
                $pekerjaan->save(false);
            }
            return $this->redirect(['site/selesai']);
        }

        return $this->render('survei',[
            'survei'=>$survei,
            'pekerjaan' => $pekerjaan
        ]);
    }

    public function actionSelesai()
    {
        $this->layout = '//frontend/main-frontend-survei';
        return $this->render('selesai');
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
     * @param $id
     * @return Unduhan|null
     */
    public function actionUnduhBerkas($id)
    {
        /** @var $model app\models\Unduhan */

        /*$model = Unduhan::findOne($id);
        $model->jumlah_unduhan = $model->jumlah_unduhan + 1;
        $model->save(false);
        return $model->sendFile()*/
    }

    public function actionBeritaIndex($id_artikel_kategori=null)
    {
        $this->layout = '//frontend/main-frontend-view';

        $artikelSearch = new ArtikelSearch();
        $artikelSearch->id_artikel_kategori = $id_artikel_kategori;

        $dataProvider = new ActiveDataProvider([
            'query' => $artikelSearch->getQuerySearch(),
            'pagination' => [
                'pageSize' => 10
            ],
        ]);

        $events = [];
        $Event = new Event();
        $events[] = $Event;

        return $this->render('berita-index', [
            'dataProvider' => $dataProvider,
            'id_artikel_kategori' => $id_artikel_kategori,
            'artikelSearch' => $artikelSearch,
            'events' => $events
        ]);
    }

    public function actionBeritaView($id)
    {
        $this->layout = '//frontend/main-frontend-view';

        $events = [];
        $Event = new Event();
        $events[] = $Event;

        $model = Artikel::findOne($id);
        if ($model !== null) {
            $model->jumlah_dilihat++;
            $model->save();
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $postSearchModel = new ArtikelSearch();
        
        return $this->render('berita-view',[
            'model' => $model,
            'postSearchModel' => $postSearchModel,
            'events' => $events
        ]);
    }

    /**
     * @param $id
     */
    public function actionLamanView($id)
    {
        $this->layout = '//frontend/main-frontend-view';

        $laman = Laman::findOne($id);

        if ($laman == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return  $this->render('laman-view',[
            'laman' => $laman
        ]);
    }

    public function actionHasil()
    {
        $this->layout = '//frontend/main-frontend-view';

        $artikelSearch = new ArtikelSearch();
        $dataProvider = $artikelSearch->search(Yii::$app->request->queryParams);

        return $this->render('hasil', [
            'dataProvider' => $dataProvider,
            'artikelSearch' => $artikelSearch
        ]);
    }

    public function actionKomentar()
    {
        $model = new ArtikelKomentar();

        if ($model->load(Yii::$app->request->post())) {

            $id_artikel = $_POST['id_artikel'];

            $model->id_artikel = $id_artikel;

            if($model->save(false)) {
                Yii::$app->session->setFlash('success','Terimakasih telah mengisi komentar, komentar anda akan di tampilkan setelah disetujui oleh admin');
                return $this->redirect(['site/berita-view','id' => $model->id_artikel]);
            }
        }
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
