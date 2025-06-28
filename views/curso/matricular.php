<?php
/** @var array $curso */
use yii\helpers\Url;
use yii\helpers\Html;
?>

<style>
    .matricula-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 40px 0;
    }

    .matricula-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        overflow: hidden;
        position: relative;
    }

    .matricula-header {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 30px;
        text-align: center;
        position: relative;
    }

    .matricula-header::before {
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

    .matricula-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }

    .matricula-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .matricula-content {
        padding: 40px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 1rem;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
        color: #2c3e50;
    }

    .form-control:focus {
        outline: none;
        border-color: #28a745;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
        background: white;
    }

    .form-control::placeholder {
        color: #6c757d;
    }

    .btn-submit {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        width: 100%;
        margin-top: 20px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    }

    .matricula-actions {
        margin-top: 30px;
        text-align: center;
    }

    .btn-voltar {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 12px 25px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        display: inline-block;
    }

    .btn-voltar:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        color: white;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .matricula-title {
            font-size: 1.5rem;
        }
        
        .matricula-content {
            padding: 25px;
        }
    }
</style>

<div class="matricula-page">
    <div class="matricula-container">
        <div class="matricula-header">
            <h1 class="matricula-title">Matrícula no Curso</h1>
            <p class="matricula-subtitle"><?= Html::encode($curso['nome']) ?></p>
        </div>

        <div class="matricula-content">
            <form method="post" action="<?= Url::to(['curso/matricular', 'id' => $curso['id']]) ?>">
                <div class="form-group">
                    <label for="nome_aluno" class="form-label">Nome Completo</label>
                    <input type="text" id="nome_aluno" name="nome_aluno" class="form-control" required placeholder="Digite seu nome completo">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="Digite seu e-mail">
                </div>

                <button type="submit" class="btn-submit">Enviar Matrícula</button>
            </form>

            <div class="matricula-actions">
                <a href="<?= Url::to(['curso/view', 'id' => $curso['id']]) ?>" class="btn-voltar">Voltar para detalhes do curso</a>
            </div>
        </div>
    </div>
</div>
