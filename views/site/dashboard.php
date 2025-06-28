<?php
use yii\helpers\Html;

$this->title = 'Espaço Acadêmico - Notas e Frequências';
?>

<div class="dashboard-container" style="padding: 20px;">
    <h3>ESPAÇO ACADÊMICO</h3>
    <h4>NOTAS E FREQUÊNCIAS</h4>

    <p><strong>Curso:</strong> Ciência da Computação</p>
    <p><strong>Semestre:</strong> 2025/1</p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Notas</th>
                <th>Faltas</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Redes de Computadores</td>
                <td>Sem notas</td>
                <td>5.0%</td>
                <td>Cursando</td>
            </tr>
        </tbody>
    </table>
</div>
<?php if (!Yii::$app->user->isGuest): ?>
    <div style="text-align: right;">
        <strong>Olá, <?= Html::encode(Yii::$app->user->identity->nome) ?></strong>
    </div>
<?php endif; ?>
