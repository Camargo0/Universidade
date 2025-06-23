<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div style="color:red;"><?= Yii::$app->session->getFlash('error') ?></div>
<?php endif; ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'usuario')->textInput() ?>
<?= $form->field($model, 'senha')->passwordInput() ?>

<div>
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Cadastrar', ['cadastrar'], ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
