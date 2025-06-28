<?php
use yii\helpers\Html;
$this->title = 'Portal do Aluno';
?>
<style>
.portal-page { 
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); 
    min-height: 100vh; 
    padding: 40px 0; 
}
.portal-container { 
    max-width: 1200px; 
    margin: 0 auto; 
    background: white; 
    border-radius: 25px; 
    box-shadow: 0 20px 50px rgba(0,0,0,0.1); 
    overflow: hidden; 
}
.portal-header { 
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
    color: white; 
    padding: 40px; 
    text-align: center; 
}
.aluno-nome { 
    font-size: 2.5rem; 
    font-weight: 700; 
    margin-bottom: 10px; 
}
.aluno-detalhes { 
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
    gap: 20px; 
    margin-top: 20px; 
}
.detalhe-item { 
    background: rgba(255, 255, 255, 0.1); 
    padding: 15px; 
    border-radius: 10px; 
}
.detalhe-label { 
    font-size: 0.9rem; 
    opacity: 0.8; 
    margin-bottom: 5px; 
}
.detalhe-value { 
    font-size: 1.1rem; 
    font-weight: 600; 
}
.portal-content { 
    padding: 40px; 
}
.welcome-message { 
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%); 
    color: white; 
    padding: 30px; 
    border-radius: 20px; 
    text-align: center; 
    margin-bottom: 30px; 
    box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3); 
}
.welcome-icon { 
    font-size: 3rem; 
    margin-bottom: 15px; 
    animation: bounce 2s infinite; 
}
@keyframes bounce { 
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 
    40% { transform: translateY(-10px); } 
    60% { transform: translateY(-5px); } 
}
.tabs-nav { 
    display: flex; 
    background: #f8f9fa; 
    border-radius: 15px; 
    padding: 5px; 
    margin-bottom: 30px; 
}
.tab-button { 
    flex: 1; 
    padding: 15px 25px; 
    border: none; 
    background: transparent; 
    color: #6c757d; 
    font-weight: 600; 
    border-radius: 10px; 
    cursor: pointer; 
    transition: all 0.3s ease; 
    font-size: 1rem; 
}
.tab-button.active { 
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
    color: white; 
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3); 
}
.tab-button:hover:not(.active) { 
    background: rgba(102, 126, 234, 0.1); 
    color: #667eea; 
}
.tab-content { 
    display: none; 
    animation: fadeIn 0.5s ease; 
}
.tab-content.active { 
    display: block; 
}
@keyframes fadeIn { 
    from { opacity: 0; transform: translateY(10px); } 
    to { opacity: 1; transform: translateY(0); } 
}
.data-table { 
    width: 100%; 
    background: white; 
    border-radius: 20px; 
    overflow: hidden; 
    box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
    margin: 0 auto 30px auto; 
    border-collapse: collapse; 
    max-width: 1000px; 
}
.data-table th { 
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
    color: white; 
    padding: 25px 20px; 
    text-align: center; 
    font-weight: 700; 
    font-size: 1.1rem; 
    text-transform: uppercase; 
    letter-spacing: 0.5px; 
}
.data-table th:first-child { 
    text-align: left; 
}
.data-table td { 
    padding: 20px; 
    border-bottom: 1px solid #f0f0f0; 
    color: #2c3e50; 
    text-align: center; 
    font-size: 1rem; 
    transition: all 0.3s ease; 
}
.data-table td:first-child { 
    text-align: left; 
    font-weight: 600; 
    color: #1a1a1a; 
}
.data-table tr:hover { 
    background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%); 
    transform: scale(1.01); 
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.1); 
}
.data-table tbody tr:nth-child(even) { 
    background: rgba(248, 249, 250, 0.5); 
}
.status-aprovado { 
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%); 
    color: white; 
    padding: 8px 16px; 
    border-radius: 25px; 
    font-size: 0.9rem; 
    font-weight: 600; 
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3); 
    display: inline-block; 
    min-width: 100px; 
}
.status-reprovado { 
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); 
    color: white; 
    padding: 8px 16px; 
    border-radius: 25px; 
    font-size: 0.9rem; 
    font-weight: 600; 
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3); 
    display: inline-block; 
    min-width: 100px; 
}
.percentual-bom { 
    color: #28a745; 
    font-weight: 700; 
    font-size: 1.1rem; 
}
.percentual-regular { 
    color: #ffc107; 
    font-weight: 700; 
    font-size: 1.1rem; 
}
.percentual-ruim { 
    color: #dc3545; 
    font-weight: 700; 
    font-size: 1.1rem; 
}
.progress-bar { 
    width: 100%; 
    height: 12px; 
    background: #e9ecef; 
    border-radius: 10px; 
    overflow: hidden; 
    margin-top: 8px; 
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.1); 
}
.progress-fill { 
    height: 100%; 
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%); 
    transition: width 0.8s ease; 
    border-radius: 10px; 
}
.progress-fill.regular { 
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%); 
}
.progress-fill.ruim { 
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); 
}
.tab-content h3 { 
    text-align: center; 
    color: #2c3e50; 
    font-size: 2rem; 
    font-weight: 700; 
    margin-bottom: 30px; 
    position: relative; 
    padding-bottom: 15px; 
}
.tab-content h3::after { 
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
.table-container { 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding: 20px 0; 
}
.table-wrapper { 
    width: 100%; 
    max-width: 1000px; 
    overflow-x: auto; 
    border-radius: 20px; 
    box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
}
@media (max-width: 768px) { 
    .aluno-nome { font-size: 2rem; } 
    .portal-content { padding: 25px; } 
    .tabs-nav { flex-direction: column; } 
    .tab-button { margin-bottom: 5px; } 
    .data-table { font-size: 0.9rem; } 
    .data-table th, .data-table td { padding: 10px; } 
}
</style>

<div class="portal-page">
    <div class="portal-container">
        <div class="portal-header">
            <div class="aluno-info">
                <h1 class="aluno-nome">
                    <?= Html::encode($aluno['nome']) ?>
                </h1>
                <p>Portal do Aluno - Frai do Vale</p>
                <div class="aluno-detalhes">
                    <div class="detalhe-item">
                        <div class="detalhe-label">Matricula</div>
                        <div class="detalhe-value"><?= Html::encode($aluno['matricula']) ?></div>
                    </div>
                    <div class="detalhe-item">
                        <div class="detalhe-label">Curso</div>
                        <div class="detalhe-value"><?= Html::encode($aluno['curso']) ?></div>
                    </div>
                    <div class="detalhe-item">
                        <div class="detalhe-label">Semestre</div>
                        <div class="detalhe-value"><?= Html::encode($aluno['semestre']) ?></div>
                    </div>
                    <div class="detalhe-item">
                        <div class="detalhe-label">Turma</div>
                        <div class="detalhe-value"><?= Html::encode($aluno['turma']) ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="portal-content">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="welcome-message">
                    <div class="welcome-icon">🎉</div>
                    <h2>Bem-vindo ao Portal do Aluno!</h2>
                    <p><?= Yii::$app->session->getFlash('success') ?></p>
                </div>
            <?php endif; ?>
            
            <div class="tabs-container">
                <div class="tabs-nav">
                    <button class="tab-button active" onclick="showTab('notas', event)">📊 Notas</button>
                    <button class="tab-button" onclick="showTab('materias', event)">📚 Materias</button>
                    <button class="tab-button" onclick="showTab('presenca', event)">📝 Presenca</button>
                </div>
                
                <!-- Aba de Notas -->
                <div id="notas" class="tab-content active">
                    <h3>📊 Boletim de Notas</h3>
                    <div class="table-container">
                        <div class="table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Materia</th>
                                        <th>1ª Nota</th>
                                        <th>2ª Nota</th>
                                        <th>3ª Nota</th>
                                        <th>Media</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notas as $nota): ?>
                                    <tr>
                                        <td><strong><?= Html::encode($nota['materia']) ?></strong></td>
                                        <td><?= $nota['nota1'] ?></td>
                                        <td><?= $nota['nota2'] ?></td>
                                        <td><?= $nota['nota3'] ?></td>
                                        <td><strong><?= $nota['media'] ?></strong></td>
                                        <td>
                                            <span class="status-<?= strtolower($nota['status']) ?>">
                                                <?= Html::encode($nota['status']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Aba de Materias -->
                <div id="materias" class="tab-content">
                    <h3>📚 Grade Curricular</h3>
                    <div class="table-container">
                        <div class="table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Materia</th>
                                        <th>Professor</th>
                                        <th>Carga Horaria</th>
                                        <th>Creditos</th>
                                        <th>Horario</th>
                                        <th>Sala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($materias as $materia): ?>
                                    <tr>
                                        <td><strong><?= Html::encode($materia['nome']) ?></strong></td>
                                        <td><?= Html::encode($materia['professor']) ?></td>
                                        <td><?= Html::encode($materia['carga_horaria']) ?></td>
                                        <td><?= Html::encode($materia['creditos']) ?></td>
                                        <td><?= Html::encode($materia['horario']) ?></td>
                                        <td><?= Html::encode($materia['sala']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Aba de Presenca -->
                <div id="presenca" class="tab-content">
                    <h3>📝 Controle de Presenca</h3>
                    <div class="table-container">
                        <div class="table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Materia</th>
                                        <th>Total de Aulas</th>
                                        <th>Presencas</th>
                                        <th>Faltas</th>
                                        <th>Percentual</th>
                                        <th>Progresso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($presenca as $p): ?>
                                    <tr>
                                        <td><strong><?= Html::encode($p['materia']) ?></strong></td>
                                        <td><?= $p['total_aulas'] ?></td>
                                        <td><?= $p['presencas'] ?></td>
                                        <td><?= $p['faltas'] ?></td>
                                        <td>
                                            <span class="percentual-<?= $p['percentual'] >= 80 ? 'bom' : ($p['percentual'] >= 70 ? 'regular' : 'ruim') ?>">
                                                <?= $p['percentual'] ?>%
                                            </span>
                                        </td>
                                        <td style="width: 150px;">
                                            <div class="progress-bar">
                                                <div class="progress-fill <?= $p['percentual'] >= 80 ? '' : ($p['percentual'] >= 70 ? 'regular' : 'ruim') ?>" style="width: <?= $p['percentual'] ?>%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showTab(tabName, event) {
    // Esconde todas as abas
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.remove('active');
    });
    
    // Remove a classe active de todos os botoes
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Mostra a aba selecionada
    document.getElementById(tabName).classList.add('active');
    
    // Adiciona a classe active ao botao clicado
    if(event) event.target.classList.add('active');
}
</script> 