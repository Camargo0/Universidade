<?php

use yii\helpers\Html;

$this->title = 'Frai do Vale - Centro Universitário';
?>

<div class="site-index">
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Bem-vindo à Frai do Vale</h1>
            <p class="hero-subtitle">Centro Universitário de Excelência em Fraiburgo</p>
            <div class="hero-buttons">
                <?= Html::a('Conheça Nossos Cursos', ['curso/index'], ['class' => 'btn btn-primary btn-lg']) ?>
                <?= Html::a('Sobre a Instituição', ['site/sobre'], ['class' => 'btn btn-secondary btn-lg']) ?>
            </div>
        </div>
    </div>

    <div class="features-section">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🎓</div>
                    <h3>Qualidade de Ensino</h3>
                    <p>Cursos reconhecidos pelo MEC com professores qualificados e metodologia inovadora.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3>Infraestrutura Moderna</h3>
                    <p>Laboratórios equipados, biblioteca completa e espaços de convivência para os estudantes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🌟</div>
                    <h3>Mercado de Trabalho</h3>
                    <p>Parcerias com empresas locais e regionais para estágios e oportunidades de carreira.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-section {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(26, 26, 46, 0.9) 0%, rgba(10, 10, 26, 0.9) 100%);
    border-radius: 20px;
    margin-bottom: 60px;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 30% 30%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 70% 70%, rgba(102, 126, 234, 0.1) 0%, transparent 50%);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.3rem;
    color: var(--text-secondary);
    margin-bottom: 40px;
    font-weight: 300;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.hero-buttons .btn {
    padding: 15px 30px;
    font-size: 1.1rem;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.features-section {
    padding: 60px 0;
}

.feature-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    margin-bottom: 30px;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
}

.feature-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    display: block;
}

.feature-card h3 {
    color: var(--text-primary);
    font-size: 1.5rem;
    margin-bottom: 15px;
    font-weight: 600;
}

.feature-card p {
    color: var(--text-secondary);
    line-height: 1.6;
    font-size: 1rem;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-buttons .btn {
        width: 100%;
        max-width: 300px;
    }
}
</style>
