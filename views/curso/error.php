<?php
use yii\helpers\Html;

$this->title = 'Erro';
?>
<div class="site-error">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>Ocorreu um erro durante o processamento do seu pedido.</p>
    <p>Se acha que é um erro do servidor, por favor entre em contato conosco.</p>

    <?= Html::a('Voltar para a página inicial', ['site/index'], ['class' => 'btn btn-warning']) ?>
</div>
