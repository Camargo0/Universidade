<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Registrar-se';
?>

<div class="site-registrar">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os dados para criar sua conta de aluno:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-registrar']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->input('email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrar', ['class' => 'btn btn-success', 'name' => 'register-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
