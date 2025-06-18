<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CadastroForm;

class SiteController extends Controller
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
                        'roles' => ['@'], // Somente usuários autenticados podem fazer logout
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
     * Página inicial.
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Página Sobre (A Frai do Vale)
     */
    public function actionSobre()
    {
        return $this->render('sobre');
    }

    /**
     * Login padrão (professor e colaborador)
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

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login do aluno
     */
    public function actionLoginAluno()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard-aluno']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/dashboard-aluno']);
        }

        $model->password = '';
        return $this->render('login-aluno', [
            'model' => $model,
        ]);
    }

    /**
     * Dashboard do aluno
     */
    public function actionDashboardAluno()
    {
        return $this->render('dashboard-aluno');
    }

    /**
     * Logout
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Página de contato
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
     * Página About padrão
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Página de cadastro de aluno
     */
    public function actionRegistrar()
    {
        $model = new CadastroForm();

        if ($model->load(Yii::$app->request->post()) && $model->cadastrar()) {
            Yii::$app->session->setFlash('success', 'Cadastro realizado com sucesso! Agora você pode fazer login.');
            return $this->redirect(['site/login-aluno']);
        }

        return $this->render('registrar', [
            'model' => $model,
        ]);
    }
}
