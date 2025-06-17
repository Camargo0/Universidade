<?php
/** @var array $curso */
use yii\helpers\Url;
?>

<h1><?= htmlspecialchars($curso['nome']) ?></h1>

<p><strong>Descrição:</strong> <?= htmlspecialchars($curso['descricao']) ?></p>
<p><strong>Duração:</strong> <?= htmlspecialchars($curso['duracao']) ?></p>
<p><strong>Valor:</strong> R$ <?= number_format($curso['valor'], 2, ',', '.') ?></p>

<p>
    <a href="<?= Url::to(['curso/matricular', 'id' => $curso['id']]) ?>">Matricular-se neste curso</a>
</p>

<p>
    <a href="<?= Url::to(['curso/index']) ?>">Voltar para a lista de cursos</a>
</p>
