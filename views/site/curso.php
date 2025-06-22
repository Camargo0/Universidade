<?php

use yii\helpers\Html;

$this->title = 'Administração - Detalhes do Curso';
?>

<div class="site-curso">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>O curso de <strong>Administração</strong> forma profissionais capacitados para atuar em empresas, gerir negócios e empreender.</p>

    <ul>
        <li><strong>Modalidade:</strong> Presencial</li>
        <li><strong>Campus:</strong> Fraiburgo</li>
        <li><strong>Duração:</strong> 4 anos (3545 horas)</li>
        <li><strong>Período:</strong> Noturno</li>
        <li><strong>Valor:</strong> R$ 690,00 mensais</li>
    </ul>

    <?= Html::a('Voltar', ['site/cursos'], ['class' => 'btn btn-secondary']) ?>
</div>
