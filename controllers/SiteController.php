<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Request;
use yii\web\Response;
use yii\web\Controller;
use yii\web\UrlManager;
use app\models\LoginForm;
use yii\helpers\VarDumper;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use yii\helpers\StringHelper;
use yii\filters\AccessControl;
use app\components\WebController;


class SiteController extends WebController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
            # Вывести flash-сообщение вы уже авторизованы    
            $username = StringHelper::mb_ucfirst(Yii::$app->user->identity->username);
            Yii::$app->session->setFlash('info',  "{$username} - вы уже авторизованы");
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Отображает страницу пользователя с именем $name
     *
     * @return string
     */
    public function actionUser($name)
    {
        return "Пользователь с именем = " . $name;
        // TODO: необходимо создать представление для страницы пользователя и возвращать его
    }

   

}
