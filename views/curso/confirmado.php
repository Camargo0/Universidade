<?php
/** @var array $curso */
/** @var string $nome */
/** @var string $email */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<style>
    .confirmacao-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 40px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .confirmacao-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        overflow: hidden;
        position: relative;
        text-align: center;
    }

    .confirmacao-header {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 40px;
        position: relative;
    }

    .confirmacao-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 70% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    }

    .success-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .confirmacao-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }

    .confirmacao-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .confirmacao-content {
        padding: 40px;
    }

    .confirmacao-message {
        color: #2c3e50;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .detalhes-matricula {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 25px;
        margin: 30px 0;
        border-left: 4px solid #28a745;
    }

    .detalhe-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .detalhe-item:last-child {
        border-bottom: none;
    }

    .detalhe-label {
        color: #6c757d;
        font-weight: 600;
    }

    .detalhe-value {
        color: #2c3e50;
        font-weight: 600;
    }

    .btn-voltar {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
        padding: 15px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        display: inline-block;
        margin-top: 20px;
    }

    .btn-voltar:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        color: white;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .confirmacao-title {
            font-size: 2rem;
        }
        
        .confirmacao-content {
            padding: 25px;
        }
        
        .detalhes-matricula {
            padding: 20px;
        }
    }
</style>

<div class="confirmacao-page">
    <div class="confirmacao-container">
        <div class="confirmacao-header">
            <div class="success-icon">✅</div>
            <h1 class="confirmacao-title">Matrícula Confirmada!</h1>
            <p class="confirmacao-subtitle">Sua inscrição foi realizada com sucesso</p>
        </div>

        <div class="confirmacao-content">
            <p class="confirmacao-message">
                Obrigado, <strong><?= Html::encode($nome) ?></strong>, por se matricular no curso <strong><?= Html::encode($curso['nome']) ?></strong>.
            </p>

            <div class="detalhes-matricula">
                <div class="detalhe-item">
                    <span class="detalhe-label">Nome:</span>
                    <span class="detalhe-value"><?= Html::encode($nome) ?></span>
                </div>
                <div class="detalhe-item">
                    <span class="detalhe-label">E-mail:</span>
                    <span class="detalhe-value"><?= Html::encode($email) ?></span>
                </div>
                <div class="detalhe-item">
                    <span class="detalhe-label">Curso:</span>
                    <span class="detalhe-value"><?= Html::encode($curso['nome']) ?></span>
                </div>
            </div>

            <p class="confirmacao-message">
                Enviaremos as informações completas para o e-mail: <strong><?= Html::encode($email) ?></strong>.
            </p>

            <a href="<?= Url::to(['curso/index']) ?>" class="btn-voltar">Voltar para lista de cursos</a>
        </div>
    </div>
</div>
