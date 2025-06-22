<?php
use yii\helpers\Html;
?>

<style>
    .card-curso {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        width: 260px;
        padding: 20px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
    }
    .card-curso h3 {
        color: #333;
        font-size: 18px;
        margin-bottom: 5px;
    }
    .card-curso p {
        color: #777;
        font-size: 12px;
        margin: 0;
    }
    .card-curso ul {
        list-style: none;
        padding: 0;
        margin-top: 10px;
    }
    .card-curso ul li {
        font-size: 13px;
        margin-bottom: 4px;
        color: #555;
    }
    .card-curso ul li i {
        color: #e86916;
        margin-right: 6px;
    }
    .btn-conheca {
        display: inline-block;
        color: #e86916;
        font-weight: bold;
        margin-top: 10px;
        text-decoration: none;
        border-bottom: 2px solid #e86916;
    }
    .btn-conheca:hover {
        color: #d45705;
        border-color: #d45705;
    }
    .container-cursos {
        text-align: center;
        margin-top: 30px;
    }
</style>

<div class="container-cursos">

    <!-- Administração -->
    <div class="card-curso">
        <h3>Administração</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 4 anos / 3545h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 1], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Administração Fraiburgo -->
    <div class="card-curso">
        <h3>Administração Fraiburgo</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 4 anos / 3545h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 2], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Agronomia -->
    <div class="card-curso">
        <h3>Agronomia</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 5 anos / 3820h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-sun"></i> Integral</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 3], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Análise e Desenvolvimento de Sistemas -->
    <div class="card-curso">
        <h3>Análise e Desenvolvimento de Sistemas</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Tecnólogo</li>
            <li><i class="fas fa-calendar-alt"></i> 3 anos / 2060h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 4], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Engenharia Civil -->
    <div class="card-curso">
        <h3>Engenharia Civil</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 5 anos / 3900h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 5], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Psicologia -->
    <div class="card-curso">
        <h3>Psicologia</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 5 anos / 3800h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 6], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Direito -->
    <div class="card-curso">
        <h3>Direito</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 5 anos / 3800h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 7], ['class' => 'btn-conheca']) ?>
    </div>

    <!-- Ciências Contábeis -->
    <div class="card-curso">
        <h3>Ciências Contábeis</h3>
        <p>Graduação Presencial</p>
        <ul>
            <li><i class="fas fa-graduation-cap"></i> Bacharelado</li>
            <li><i class="fas fa-calendar-alt"></i> 4 anos / 3200h</li>
            <li><i class="fas fa-map-marker-alt"></i> Campus Fraiburgo</li>
            <li><i class="fas fa-moon"></i> Noturno</li>
        </ul>
        <?= Html::a('Conheça o curso', ['curso/view', 'id' => 8], ['class' => 'btn-conheca']) ?>
    </div>

</div>

<!-- Font Awesome para ícones -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
