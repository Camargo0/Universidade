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

<div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h1 style="color: #e86916;"><?= Html::encode($curso['nome']) ?></h1>
    <p><strong>Tipo:</strong> <?= Html::encode($curso['tipo']) ?></p>
    <p><strong>Modalidade:</strong> <?= Html::encode($curso['modalidade']) ?></p>
    <p><strong>Duração:</strong> <?= Html::encode($curso['duracao']) ?></p>
    <p><strong>Turno:</strong> <?= Html::encode($curso['turno']) ?></p>
    <p><strong>Mensalidade:</strong> <?= Html::encode($curso['mensalidade']) ?></p>
    <p style="margin-top: 20px;"><?= Html::encode($curso['descricao']) ?></p>

    <br>

    <?= Html::a('Voltar aos cursos', ['curso/index'], ['class' => 'btn btn-warning']) ?>
</div>
