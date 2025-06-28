<?php

use yii\helpers\Html;

$this->title = 'Extensão Universitária - Frai do Vale';
?>

<style>
.extensao-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #e9ecef 100%);
    padding: 40px 0;
}
.extensao-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}
.extensao-header {
    text-align: center;
    margin-bottom: 40px;
}
.extensao-header h1 {
    font-size: 2.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
}
.extensao-header p {
    font-size: 1.2rem;
    color: #495057;
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto;
}
.extensao-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-top: 30px;
}
.extensao-card {
    background: white;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(102,126,234,0.08);
    padding: 32px 28px;
    transition: all 0.3s;
    border: 1px solid #e0e6ed;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.extensao-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 16px 40px rgba(102,126,234,0.13);
}
.extensao-card h3 {
    color: #667eea;
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}
.extensao-card h3 .icon {
    font-size: 1.6rem;
    margin-right: 10px;
}
.extensao-card p {
    color: #495057;
    font-size: 1.05rem;
    margin-bottom: 0;
}
.extensao-resumo {
    margin-top: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 18px;
    padding: 32px 28px;
    box-shadow: 0 8px 32px rgba(102,126,234,0.10);
    text-align: center;
    font-size: 1.2rem;
}
@media (max-width: 768px) {
    .extensao-header h1 { font-size: 2rem; }
    .extensao-card { padding: 20px 12px; }
    .extensao-resumo { font-size: 1rem; padding: 18px 8px; }
}
</style>

<div class="extensao-page">
    <div class="extensao-container">
        <div class="extensao-header">
            <h1>Extensão Universitária</h1>
            <p>Conheça as principais atividades de extensão da Frai do Vale, que conectam universidade e sociedade, promovendo conhecimento, cidadania e transformação social.</p>
        </div>
        <div class="extensao-grid">
            <div class="extensao-card">
                <h3><span class="icon">📚</span> Cursos de Extensão</h3>
                <p>Programas de curta duração que oferecem aprofundamento ou complementação de conhecimentos em áreas específicas. Ideais para quem busca atualização rápida e certificação.</p>
            </div>
            <div class="extensao-card">
                <h3><span class="icon">🤝</span> Projetos de Extensão</h3>
                <p>Iniciativas que visam solucionar problemas ou atender demandas da comunidade, envolvendo alunos e professores em ações práticas e transformadoras.</p>
            </div>
            <div class="extensao-card">
                <h3><span class="icon">🌐</span> Programas de Extensão</h3>
                <p>Conjuntos de projetos e atividades que abordam temas mais amplos e podem ter duração mais longa, promovendo impacto contínuo na sociedade.</p>
            </div>
            <div class="extensao-card">
                <h3><span class="icon">🎤</span> Eventos de Extensão</h3>
                <p>Palestras, workshops, feiras e outras atividades que visam difundir conhecimento e promover a interação entre universidade e comunidade.</p>
            </div>
            <div class="extensao-card">
                <h3><span class="icon">🩺</span> Serviços de Extensão</h3>
                <p>Prestação de serviços à comunidade, como atendimento médico, jurídico, psicológico, entre outros, realizados por alunos e professores da Frai do Vale.</p>
            </div>
        </div>
        <div class="extensao-resumo">
            <strong>Em resumo:</strong> a extensão universitária é uma forma de a universidade cumprir seu papel social, compartilhando conhecimento e recursos com a comunidade e, ao mesmo tempo, enriquecendo a formação dos estudantes.
        </div>
    </div>
</div>
