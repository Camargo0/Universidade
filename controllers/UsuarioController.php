<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UsuarioForm;

class UsuarioController extends Controller
{
    public function actionCadastrar()
    {
        $model = new UsuarioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $usuarios = $this->getUsuarios();

            if (isset($usuarios[$model->usuario])) {
                Yii::$app->session->setFlash('error', 'Usuário já cadastrado.');
            } else {
                $usuarios[$model->usuario] = [
                    'senha' => password_hash($model->senha, PASSWORD_DEFAULT),
                ];
                file_put_contents(Yii::getAlias('@app/data/usuarios.json'), json_encode($usuarios));
                Yii::$app->session->setFlash('success', 'Cadastro realizado com sucesso!');
                return $this->redirect(['login']);
            }
        }

        return $this->render('cadastrar', ['model' => $model]);
    }

    public function actionLogin()
    {
        $model = new UsuarioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $usuarios = $this->getUsuarios();

            if (isset($usuarios[$model->usuario]) && password_verify($model->senha, $usuarios[$model->usuario]['senha'])) {
                Yii::$app->session->set('usuario', $model->usuario);
                return $this->redirect(['painel']);
            } else {
                Yii::$app->session->setFlash('error', 'Usuário ou senha inválidos.');
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionPainel()
    {
        if (!Yii::$app->session->get('usuario')) {
            return $this->redirect(['login']);
        }

        return $this->render('painel');
    }

    public function actionLogout()
    {
        Yii::$app->session->remove('usuario');
        return $this->redirect(['login']);
    }

    private function getUsuarios()
    {
        $file = Yii::getAlias('@app/data/usuarios.json');
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }
        return json_decode(file_get_contents($file), true);
    }
}
