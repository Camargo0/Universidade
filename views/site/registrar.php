<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Matricular-se';
?>

<style>
    .matricula-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 40px 0;
    }

    .matricula-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 25px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        overflow: hidden;
        position: relative;
    }

    .matricula-header {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
        padding: 50px 40px;
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

    .matricula-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .matricula-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .matricula-subtitle {
        font-size: 1.3rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .matricula-content {
        padding: 50px 40px;
    }

    .form-section {
        margin-bottom: 40px;
    }

    .section-title {
        color: #2c3e50;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 3px solid #ff6b35;
        display: inline-block;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 25px;
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
        padding: 15px 20px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
        color: #2c3e50;
    }

    .form-control:focus {
        outline: none;
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        background: white;
    }

    .form-control::placeholder {
        color: #6c757d;
    }

    .curso-select {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 15px 20px;
        font-size: 1rem;
        color: #2c3e50;
        width: 100%;
        transition: all 0.3s ease;
    }

    .curso-select:focus {
        outline: none;
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        background: white;
    }

    .btn-matricular {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 18px 40px;
        border: none;
        border-radius: 25px;
        font-size: 1.2rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        width: 100%;
        margin-top: 30px;
    }

    .btn-matricular:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
    }

    .btn-matricular:active {
        transform: translateY(-1px);
    }

    .info-box {
        background: #e3f2fd;
        border: 1px solid #bbdefb;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
        color: #1565c0;
    }

    .info-box h4 {
        color: #0d47a1;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .info-box p {
        margin: 0;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .matricula-title {
            font-size: 2.2rem;
        }
        
        .matricula-content {
            padding: 30px 25px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .matricula-header {
            padding: 40px 25px;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .matricula-container {
        animation: fadeInUp 0.8s ease;
    }
</style>

<div class="matricula-page">
    <div class="matricula-container">
        <div class="matricula-header">
            <div class="matricula-icon">🎓</div>
            <h1 class="matricula-title">Matricular-se</h1>
            <p class="matricula-subtitle">Faça parte da Frai do Vale</p>
        </div>

        <div class="matricula-content">
            <div class="info-box">
                <h4>📋 Informações Importantes</h4>
                <p>Preencha todos os campos obrigatórios para realizar sua matrícula. Após o envio, você receberá um e-mail com as informações de acesso ao portal do aluno.</p>
            </div>

            <?php $form = ActiveForm::begin(['id' => 'form-matricula', 'options' => ['class' => 'matricula-form']]); ?>

            <div class="form-section">
                <h3 class="section-title">📝 Dados Pessoais</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nome Completo *</label>
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Digite seu nome completo'])->label(false) ?>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">CPF *</label>
                        <?= $form->field($model, 'cpf')->textInput(['class' => 'form-control', 'placeholder' => '000.000.000-00'])->label(false) ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Data de Nascimento *</label>
                        <?= $form->field($model, 'data_nascimento')->input('date', ['class' => 'form-control'])->label(false) ?>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Telefone *</label>
                        <?= $form->field($model, 'telefone')->input('tel', ['class' => 'form-control', 'placeholder' => '(00) 00000-0000'])->label(false) ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail *</label>
                    <?= $form->field($model, 'email')->input('email', ['class' => 'form-control', 'placeholder' => 'seu@email.com'])->label(false) ?>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">🎯 Seleção do Curso</h3>
                
                <div class="form-group">
                    <label class="form-label">Curso Desejado *</label>
                    <?= $form->field($model, 'curso')->dropDownList([
                        '' => 'Selecione um curso',
                        'Administração' => 'Administração',
                        'Administração Fraiburgo' => 'Administração Fraiburgo',
                        'Agronomia' => 'Agronomia',
                        'Análise e Desenvolvimento de Sistemas' => 'Análise e Desenvolvimento de Sistemas',
                        'Engenharia Civil' => 'Engenharia Civil',
                        'Psicologia' => 'Psicologia',
                        'Direito' => 'Direito',
                        'Ciências Contábeis' => 'Ciências Contábeis',
                    ], ['class' => 'curso-select'])->label(false) ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Turno Preferencial *</label>
                    <?= $form->field($model, 'turno')->dropDownList([
                        '' => 'Selecione o turno',
                        'noturno' => 'Noturno',
                        'integral' => 'Integral',
                        'matutino' => 'Matutino',
                    ], ['class' => 'curso-select'])->label(false) ?>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">🔐 Dados de Acesso</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Senha *</label>
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Mínimo 6 caracteres'])->label(false) ?>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Confirmar Senha *</label>
                        <?= $form->field($model, 'password_repeat')->passwordInput(['class' => 'form-control', 'placeholder' => 'Digite a senha novamente'])->label(false) ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-matricular">
                🎓 Matricular-se Agora
            </button>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Debug do formulário
    const form = document.getElementById('form-matricula');
    if (form) {
        form.addEventListener('submit', function(e) {
            console.log('Formulário sendo enviado...');
            console.log('Dados do formulário:', new FormData(form));
        });
    }

    // Máscara para CPF
    const cpfInput = document.querySelector('input[name="CadastroForm[cpf]"]');
    if (cpfInput) {
        cpfInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = value;
        });
    }

    // Máscara para telefone
    const telInput = document.querySelector('input[name="CadastroForm[telefone]"]');
    if (telInput) {
        telInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
            e.target.value = value;
        });
    }
});
</script>
