<?php

use yii\helpers\Html;

$this->title = 'Dashboard';

?>

<h1>Bem-vindo, <?= Html::encode($usuario['username']) ?>!</h1>
<p>Email: <?= Html::encode($usuario['email']) ?></p>

<p><?= Html::a('Sair', ['site/logout'], ['class' => 'btn btn-danger']) ?></p>
