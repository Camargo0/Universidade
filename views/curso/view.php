<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var integer $id */

$this->title = 'Detalhes do Curso';

$cursos = [
    1 => [
        'nome' => 'Administração',
        'tipo' => 'Bacharelado',
        'duracao' => '4 anos / 3545h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 850,00',
        'descricao' => 'O curso de Administração capacita profissionais para atuar na gestão de empresas, finanças, marketing, recursos humanos e muito mais.',
    ],
    2 => [
        'nome' => 'Administração Fraiburgo',
        'tipo' => 'Bacharelado',
        'duracao' => '4 anos / 3545h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 850,00',
        'descricao' => 'Focado na realidade regional, forma administradores preparados para os desafios do mercado em Fraiburgo e região.',
    ],
    3 => [
        'nome' => 'Agronomia',
        'tipo' => 'Bacharelado',
        'duracao' => '5 anos / 3820h',
        'modalidade' => 'Presencial',
        'turno' => 'Integral',
        'mensalidade' => 'R$ 1.200,00',
        'descricao' => 'Forma engenheiros agrônomos capacitados para atuar no desenvolvimento sustentável da agricultura, pecuária e meio ambiente.',
    ],
    4 => [
        'nome' => 'Análise e Desenvolvimento de Sistemas',
        'tipo' => 'Tecnólogo',
        'duracao' => '3 anos / 2060h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 750,00',
        'descricao' => 'Capacita profissionais para desenvolver, implementar e gerenciar sistemas e soluções tecnológicas para empresas e negócios.',
    ],
    5 => [
        'nome' => 'Engenharia Civil',
        'tipo' => 'Bacharelado',
        'duracao' => '5 anos / 3900h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 1.500,00',
        'descricao' => 'Forma engenheiros civis capacitados para projetar, construir e gerenciar obras e infraestrutura urbana e rural.',
    ],
    6 => [
        'nome' => 'Psicologia',
        'tipo' => 'Bacharelado',
        'duracao' => '5 anos / 3800h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 980,00',
        'descricao' => 'Capacita profissionais para atuar na saúde mental, desenvolvimento humano, psicoterapia e áreas organizacionais.',
    ],
    7 => [
        'nome' => 'Direito',
        'tipo' => 'Bacharelado',
        'duracao' => '5 anos / 3800h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 1.200,00',
        'descricao' => 'Forma bacharéis em Direito preparados para atuar na advocacia, defensoria, promotoria e magistratura.',
    ],
    8 => [
        'nome' => 'Ciências Contábeis',
        'tipo' => 'Bacharelado',
        'duracao' => '4 anos / 3200h',
        'modalidade' => 'Presencial',
        'turno' => 'Noturno',
        'mensalidade' => 'R$ 870,00',
        'descricao' => 'Forma contadores preparados para atuar na gestão financeira, contabilidade, auditoria e consultoria.',
    ],
];

// Verifica se o ID do curso existe
$curso = $cursos[$id] ?? null;

if (!$curso) {
    echo "<h2>Curso não encontrado!</h2>";
    return;
}
?>

<style>
    .curso-detail-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 40px 0;
    }

    .curso-detail-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        overflow: hidden;
        position: relative;
    }

    .curso-detail-header {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
        padding: 40px;
        text-align: center;
        position: relative;
    }

    .curso-detail-header::before {
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

    .curso-detail-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }

    .curso-detail-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .curso-detail-content {
        padding: 40px;
    }

    .curso-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .info-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 25px;
        border-left: 4px solid #ff6b35;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .info-label {
        color: #6c757d;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .info-value {
        color: #2c3e50;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .curso-descricao {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        border-left: 4px solid #28a745;
    }

    .descricao-title {
        color: #2c3e50;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .descricao-text {
        color: #495057;
        font-size: 1rem;
        line-height: 1.6;
    }

    .curso-actions {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-voltar {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-voltar:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-matricular {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-matricular:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        color: white;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .curso-detail-title {
            font-size: 2rem;
        }
        
        .curso-detail-content {
            padding: 25px;
        }
        
        .curso-info-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .curso-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-voltar, .btn-matricular {
            width: 100%;
            max-width: 300px;
            text-align: center;
        }
    }
</style>

<div class="curso-detail-page">
    <div class="curso-detail-container">
        <div class="curso-detail-header">
            <h1 class="curso-detail-title"><?= Html::encode($curso['nome']) ?></h1>
            <p class="curso-detail-subtitle">Graduação <?= Html::encode($curso['modalidade']) ?></p>
        </div>

        <div class="curso-detail-content">
            <div class="curso-info-grid">
                <div class="info-card">
                    <div class="info-label">Tipo de Curso</div>
                    <div class="info-value"><?= Html::encode($curso['tipo']) ?></div>
                </div>
                
                <div class="info-card">
                    <div class="info-label">Duração</div>
                    <div class="info-value"><?= Html::encode($curso['duracao']) ?></div>
                </div>
                
                <div class="info-card">
                    <div class="info-label">Turno</div>
                    <div class="info-value"><?= Html::encode($curso['turno']) ?></div>
                </div>
                
                <div class="info-card">
                    <div class="info-label">Mensalidade</div>
                    <div class="info-value"><?= Html::encode($curso['mensalidade']) ?></div>
                </div>
            </div>

            <div class="curso-descricao">
                <h3 class="descricao-title">Sobre o Curso</h3>
                <p class="descricao-text"><?= Html::encode($curso['descricao']) ?></p>
            </div>

            <div class="curso-actions">
                <?= Html::a('Voltar aos Cursos', ['curso/index'], ['class' => 'btn-voltar']) ?>
                <?= Html::a('Matricular-se', ['curso/matricular', 'id' => $id], ['class' => 'btn-matricular']) ?>
            </div>
        </div>
    </div>
</div>
