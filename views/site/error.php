<?php

use yii\helpers\Html;

$this->title = 'Erro';
?>
<div class="site-error">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        Ocorreu um erro ao processar sua solicitação.
    </div>

    <p>
        Se você acredita que isso é um erro do servidor, por favor entre em contato com o suporte.
    </p>

    <p>
        <?= nl2br(Html::encode($message)) ?>
    </p>
</div>
