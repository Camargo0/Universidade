<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Central de Apoio ao Estudante - Frai do Vale';
?>

<style>
.central-apoio-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 40px 0;
}

.central-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.central-header {
    text-align: center;
    margin-bottom: 40px;
    color: white;
}

.central-header h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 15px;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.central-header p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.tabs-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    overflow: hidden;
}

.tabs-nav {
    display: flex;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 1px solid #dee2e6;
}

.tab-button {
    flex: 1;
    padding: 20px;
    background: none;
    border: none;
    font-size: 1.1rem;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.tab-button:hover {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
}

.tab-button.active {
    background: white;
    color: #667eea;
    box-shadow: 0 -3px 10px rgba(0,0,0,0.1);
}

.tab-button.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.tab-content {
    display: none;
    padding: 40px;
    min-height: 500px;
}

.tab-content.active {
    display: block;
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.section-title {
    color: #2c3e50;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 2px;
}

.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.service-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #dee2e6;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.service-card h3 {
    color: #2c3e50;
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.service-card h3::before {
    content: '';
    width: 30px;
    height: 30px;
    margin-right: 15px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

.service-card.procedimentos h3::before {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23667eea"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 1v5h5v10H6V3h7z"/></svg>');
}

.service-card.administrativo h3::before {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23667eea"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>');
}

.service-card.bolsas h3::before {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23667eea"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>');
}

.service-card.suporte h3::before {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23667eea"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/></svg>');
}

.service-card p {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
}

.service-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.service-list li {
    padding: 8px 0;
    border-bottom: 1px solid #dee2e6;
    color: #495057;
    display: flex;
    align-items: center;
}

.service-list li:last-child {
    border-bottom: none;
}

.service-list li::before {
    content: '✓';
    color: #28a745;
    font-weight: bold;
    margin-right: 10px;
    font-size: 1.1rem;
}

.contact-info {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px;
    padding: 30px;
    margin-top: 30px;
    text-align: center;
}

.contact-info h3 {
    margin-bottom: 20px;
    font-size: 1.5rem;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.contact-item {
    background: rgba(255,255,255,0.1);
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

.contact-item h4 {
    margin-bottom: 10px;
    font-size: 1.1rem;
}

.contact-item p {
    margin: 0;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .central-header h1 {
        font-size: 2rem;
    }
    
    .tabs-nav {
        flex-direction: column;
    }
    
    .tab-content {
        padding: 20px;
    }
    
    .service-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="central-apoio-page">
    <div class="central-container">
        <div class="central-header">
            <h1>🎓 Central de Apoio ao Estudante</h1>
            <p>Encontre aqui todas as informações e serviços necessários para sua jornada acadêmica na Frai do Vale</p>
        </div>

        <div class="tabs-container">
            <div class="tabs-nav">
                <button class="tab-button active" onclick="showTab('procedimentos', event)">📋 Procedimentos Acadêmicos</button>
                <button class="tab-button" onclick="showTab('administrativo', event)">🏢 Administrativo</button>
                <button class="tab-button" onclick="showTab('bolsas', event)">💎 Bolsas de Estudo</button>
                <button class="tab-button" onclick="showTab('suporte', event)">🆘 Suporte ao Estudante</button>
            </div>

            <!-- Aba Procedimentos Acadêmicos -->
            <div id="procedimentos" class="tab-content active">
                <h2 class="section-title">📋 Procedimentos Acadêmicos</h2>
                
                <div class="service-grid">
                    <div class="service-card procedimentos">
                        <h3>Matrícula e Rematrícula</h3>
                        <p>Procedimentos para matrícula inicial e renovação semestral.</p>
                        <ul class="service-list">
                            <li>Documentação necessária</li>
                            <li>Prazos de matrícula</li>
                            <li>Renovação automática</li>
                            <li>Transferência de curso</li>
                        </ul>
                    </div>

                    <div class="service-card procedimentos">
                        <h3>Histórico Escolar</h3>
                        <p>Solicitação e emissão de documentos acadêmicos.</p>
                        <ul class="service-list">
                            <li>Histórico escolar</li>
                            <li>Declaração de matrícula</li>
                            <li>Certificado de conclusão</li>
                            <li>Diploma</li>
                        </ul>
                    </div>

                    <div class="service-card procedimentos">
                        <h3>Trancamento de Matrícula</h3>
                        <p>Orientações para trancamento e retorno aos estudos.</p>
                        <ul class="service-list">
                            <li>Motivos aceitos</li>
                            <li>Documentação necessária</li>
                            <li>Prazos para solicitação</li>
                            <li>Retorno aos estudos</li>
                        </ul>
                    </div>

                    <div class="service-card procedimentos">
                        <h3>Transferência e Portabilidade</h3>
                        <p>Processos de transferência entre instituições.</p>
                        <ul class="service-list">
                            <li>Transferência interna</li>
                            <li>Transferência externa</li>
                            <li>Aproveitamento de disciplinas</li>
                            <li>Portabilidade de créditos</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Aba Administrativo -->
            <div id="administrativo" class="tab-content">
                <h2 class="section-title">🏢 Serviços Administrativos</h2>
                
                <div class="service-grid">
                    <div class="service-card administrativo">
                        <h3>Financeiro</h3>
                        <p>Serviços relacionados a pagamentos e cobranças.</p>
                        <ul class="service-list">
                            <li>2ª via de boleto</li>
                            <li>Reagendamento de pagamento</li>
                            <li>Desconto por pontualidade</li>
                            <li>Negociação de débitos</li>
                        </ul>
                    </div>

                    <div class="service-card administrativo">
                        <h3>Documentação</h3>
                        <p>Emissão e atualização de documentos.</p>
                        <ul class="service-list">
                            <li>Carteira de estudante</li>
                            <li>Atualização cadastral</li>
                            <li>Mudança de endereço</li>
                            <li>Alteração de dados pessoais</li>
                        </ul>
                    </div>

                    <div class="service-card administrativo">
                        <h3>Estacionamento</h3>
                        <p>Informações sobre estacionamento no campus.</p>
                        <ul class="service-list">
                            <li>Credenciamento de veículos</li>
                            <li>Vagas para estudantes</li>
                            <li>Horários de funcionamento</li>
                            <li>Regulamento interno</li>
                        </ul>
                    </div>

                    <div class="service-card administrativo">
                        <h3>Biblioteca</h3>
                        <p>Serviços da biblioteca universitária.</p>
                        <ul class="service-list">
                            <li>Empréstimo de livros</li>
                            <li>Renovação online</li>
                            <li>Reserva de materiais</li>
                            <li>Horário de funcionamento</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Aba Bolsas de Estudo -->
            <div id="bolsas" class="tab-content">
                <h2 class="section-title">💎 Bolsas de Estudo</h2>
                
                <div class="service-grid">
                    <div class="service-card bolsas">
                        <h3>Bolsas Institucionais</h3>
                        <p>Programas de bolsas oferecidos pela Frai do Vale.</p>
                        <ul class="service-list">
                            <li>Bolsas por mérito acadêmico</li>
                            <li>Bolsas para atletas</li>
                            <li>Bolsas para filhos de funcionários</li>
                            <li>Bolsas para irmãos</li>
                        </ul>
                    </div>

                    <div class="service-card bolsas">
                        <h3>Prouni</h3>
                        <p>Programa Universidade para Todos.</p>
                        <ul class="service-list">
                            <li>Bolsas integrais (100%)</li>
                            <li>Bolsas parciais (50%)</li>
                            <li>Critérios de seleção</li>
                            <li>Documentação necessária</li>
                        </ul>
                    </div>

                    <div class="service-card bolsas">
                        <h3>Fies</h3>
                        <p>Fundo de Financiamento Estudantil.</p>
                        <ul class="service-list">
                            <li>Financiamento a juros baixos</li>
                            <li>Carência durante o curso</li>
                            <li>Pagamento após conclusão</li>
                            <li>Critérios de elegibilidade</li>
                        </ul>
                    </div>

                    <div class="service-card bolsas">
                        <h3>Convênios Empresariais</h3>
                        <p>Parcerias com empresas para bolsas.</p>
                        <ul class="service-list">
                            <li>Bolsas para funcionários</li>
                            <li>Convênios sindicais</li>
                            <li>Programas corporativos</li>
                            <li>Descontos especiais</li>
                        </ul>
                    </div>
                </div>

                <div class="contact-info">
                    <h3>📞 Central de Bolsas</h3>
                    <div class="contact-grid">
                        <div class="contact-item">
                            <h4>Telefone</h4>
                            <p>(11) 3456-7890</p>
                        </div>
                        <div class="contact-item">
                            <h4>WhatsApp</h4>
                            <p>(11) 98765-4321</p>
                        </div>
                        <div class="contact-item">
                            <h4>Email</h4>
                            <p>bolsas@fraidovale.edu.br</p>
                        </div>
                        <div class="contact-item">
                            <h4>Horário</h4>
                            <p>Seg-Sex: 8h às 18h</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aba Suporte ao Estudante -->
            <div id="suporte" class="tab-content">
                <h2 class="section-title">🆘 Suporte ao Estudante</h2>
                
                <div class="service-grid">
                    <div class="service-card suporte">
                        <h3>Psicopedagógico</h3>
                        <p>Apoio psicológico e orientação educacional.</p>
                        <ul class="service-list">
                            <li>Orientação vocacional</li>
                            <li>Apoio psicológico</li>
                            <li>Métodos de estudo</li>
                            <li>Gestão de ansiedade</li>
                        </ul>
                    </div>

                    <div class="service-card suporte">
                        <h3>Acessibilidade</h3>
                        <p>Suporte para estudantes com necessidades especiais.</p>
                        <ul class="service-list">
                            <li>Intérprete de Libras</li>
                            <li>Material em Braille</li>
                            <li>Adequação de provas</li>
                            <li>Acessibilidade física</li>
                        </ul>
                    </div>

                    <div class="service-card suporte">
                        <h3>Saúde</h3>
                        <p>Serviços de saúde disponíveis no campus.</p>
                        <ul class="service-list">
                            <li>Atendimento médico</li>
                            <li>Primeiros socorros</li>
                            <li>Campanhas de vacinação</li>
                            <li>Orientação nutricional</li>
                        </ul>
                    </div>

                    <div class="service-card suporte">
                        <h3>Carreiras</h3>
                        <p>Orientação profissional e mercado de trabalho.</p>
                        <ul class="service-list">
                            <li>Elaboração de currículo</li>
                            <li>Preparação para entrevistas</li>
                            <li>Feiras de empregos</li>
                            <li>Estágios e vagas</li>
                        </ul>
                    </div>
                </div>

                <div class="contact-info">
                    <h3>📞 Central de Atendimento</h3>
                    <div class="contact-grid">
                        <div class="contact-item">
                            <h4>Telefone Geral</h4>
                            <p>(11) 3456-7890</p>
                        </div>
                        <div class="contact-item">
                            <h4>WhatsApp</h4>
                            <p>(11) 98765-4321</p>
                        </div>
                        <div class="contact-item">
                            <h4>Email</h4>
                            <p>central@fraidovale.edu.br</p>
                        </div>
                        <div class="contact-item">
                            <h4>Presencial</h4>
                            <p>Bloco A - 1º andar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showTab(tabName, event) {
    // Remove active class from all tabs and contents
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('active');
    });
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    
    // Add active class to clicked tab and corresponding content
    event.target.classList.add('active');
    document.getElementById(tabName).classList.add('active');
}
</script> 