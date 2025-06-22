<?php

use yii\helpers\Html;

$this->title = 'Cursos';
?>

<div class="site-cursos">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Confira nossos cursos de graduação e extensão.</p>

    <h3>Administração</h3>
    <p>Modalidade: Presencial | Duração: 4 anos | Noturno | Valor: R$ 690,00</p>
    <?= Html::a('Conheça o curso', ['site/curso'], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
</div>
