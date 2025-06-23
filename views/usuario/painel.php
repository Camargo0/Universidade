<?php
use yii\helpers\Html;

$this->title = 'Painel';
?>

<h1>Bem-vindo, <?= Html::encode(Yii::$app->session->get('usuario')) ?>!</h1>

<p>Você está logado.</p>

<?= Html::a('Sair', ['logout'], ['class' => 'btn btn-danger']) ?>
