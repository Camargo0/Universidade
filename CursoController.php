<?php

namespace app\controllers;

use yii\web\Controller;

class CursoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionMatricular()
    {
        return $this->render('matricular');
    }

    public function actionConfirmado()
    {
        return $this->render('confirmado');
    }
}
