<?php
/** @var array $curso */
/** @var string $nome */
/** @var string $email */
use yii\helpers\Html;
?>

<h1>Matrícula Confirmada!</h1>

<p>Obrigado, <strong><?= Html::encode($nome) ?></strong>, por se matricular no curso <strong><?= Html::encode($curso['nome']) ?></strong>.</p>

<p>Enviaremos as informações para o e-mail: <strong><?= Html::encode($email) ?></strong>.</p>

<p><a href="<?= \yii\helpers\Url::to(['curso/index']) ?>">Voltar para lista de cursos</a></p>
