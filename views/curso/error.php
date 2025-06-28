<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<style>
    .error-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 40px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .error-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        overflow: hidden;
        position: relative;
        text-align: center;
    }

    .error-header {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
        padding: 40px;
        position: relative;
    }

    .error-header::before {
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

    .error-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .error-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }

    .error-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .error-content {
        padding: 40px;
    }

    .error-message {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
        color: #721c24;
        font-size: 1rem;
        line-height: 1.5;
    }

    .error-description {
        color: #2c3e50;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 30px;
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
        .error-title {
            font-size: 2rem;
        }
        
        .error-content {
            padding: 25px;
        }
    }
</style>

<div class="error-page">
    <div class="error-container">
        <div class="error-header">
            <div class="error-icon">⚠️</div>
            <h1 class="error-title">Erro</h1>
            <p class="error-subtitle">Ocorreu um problema</p>
        </div>

        <div class="error-content">
            <div class="error-message">
                <?= nl2br(Html::encode($message)) ?>
            </div>

            <p class="error-description">
                Ocorreu um erro durante o processamento do seu pedido.
            </p>
            
            <p class="error-description">
                Se acha que é um erro do servidor, por favor entre em contato conosco.
            </p>

            <a href="<?= Url::to(['site/index']) ?>" class="btn-voltar">Voltar para a página inicial</a>
        </div>
    </div>
</div>
