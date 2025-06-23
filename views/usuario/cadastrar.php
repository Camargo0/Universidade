<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cadastro';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div style="color:red;"><?= Yii::$app->session->getFlash('error') ?></div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div style="color:green;"><?= Yii::$app->session->getFlash('success') ?></div>
<?php endif; ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'usuario')->textInput() ?>
<?= $form->field($model, 'senha')->passwordInput() ?>

<div>
    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Login', ['login'], ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
