<?php
/** @var array $curso */
use yii\helpers\Url;
?>

<h1>Matrícula no curso: <?= htmlspecialchars($curso['nome']) ?></h1>

<form method="post" action="<?= Url::to(['curso/matricular', 'id' => $curso['id']]) ?>">
    <label for="nome_aluno">Nome Completo:</label><br>
    <input type="text" id="nome_aluno" name="nome_aluno" required><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <button type="submit">Enviar matrícula</button>
</form>

<p>
    <a href="<?= Url::to(['curso/view', 'id' => $curso['id']]) ?>">Voltar para detalhes do curso</a>
</p>
