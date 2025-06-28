<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        :root {
            --dark-bg: #0f0f23;
            --darker-bg: #0a0a1a;
            --card-bg: #1a1a2e;
            --accent-color: #ff6b35;
            --accent-hover: #ff5722;
            --text-primary: #ffffff;
            --text-secondary: #b0b0b0;
            --border-color: #2a2a3e;
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            --gradient-primary: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            --gradient-secondary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(247, 147, 30, 0.05) 0%, transparent 50%);
            z-index: -1;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(1deg); }
        }

        .top-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            height: 65px;
            filter: brightness(1.1) contrast(1.1);
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        .menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .menu a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 0;
        }

        .menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-primary);
            transition: width 0.3s ease;
        }

        .menu a:hover {
            color: var(--text-primary);
            transform: translateY(-2px);
        }

        .menu a:hover::after {
            width: 100%;
        }

        .buttons {
            display: flex;
            gap: 15px;
        }

        .btn-prof, .btn-aluno, .btn-registrar, .btn-sair {
            padding: 12px 20px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-prof {
            background: var(--gradient-primary);
        }

        .btn-aluno {
            background: var(--gradient-secondary);
        }

        .btn-registrar {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }

        .btn-sair {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }

        .btn-prof:hover, .btn-aluno:hover, .btn-registrar:hover, .btn-sair:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .btn-prof::before, .btn-aluno::before, .btn-registrar::before, .btn-sair::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-prof:hover::before, .btn-aluno:hover::before, .btn-registrar:hover::before, .btn-sair:hover::before {
            left: 100%;
        }

        main {
            padding: 40px 0;
            min-height: calc(100vh - 100px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Cards e elementos de conteúdo */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        /* Formulários */
        .form-control {
            background: var(--darker-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: var(--card-bg);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
            color: var(--text-primary);
        }

        .form-control::placeholder {
            color: var(--text-secondary);
        }

        /* Botões do Bootstrap */
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .top-header {
                flex-direction: column;
                gap: 15px;
                padding: 15px 20px;
            }

            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .buttons {
                flex-wrap: wrap;
                justify-content: center;
            }

            .menu a {
                font-size: 13px;
            }
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--darker-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-hover);
        }

        /* Estilos adicionais para completar o tema escuro */
        
        /* Tabelas */
        .table {
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            color: var(--text-secondary);
        }

        .table th {
            background: var(--darker-bg);
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
        }

        .table td {
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border-color);
        }

        .table tbody tr:hover {
            background: rgba(255, 107, 53, 0.1);
        }

        /* Alertas */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
        }

        .alert-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
        }

        .alert-warning {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            color: #212529;
        }

        .alert-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
        }

        /* Grid View do Yii2 */
        .grid-view {
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .grid-view th {
            background: var(--darker-bg);
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        .grid-view td {
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border-color);
        }

        .grid-view tbody tr:hover {
            background: rgba(255, 107, 53, 0.1);
        }

        /* Paginação */
        .pagination {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 10px;
            box-shadow: var(--shadow);
        }

        .page-link {
            background: var(--darker-bg);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            border-radius: 8px;
            margin: 0 2px;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background: var(--gradient-primary);
            border-color: var(--accent-color);
            color: white;
        }

        /* Links gerais */
        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--accent-hover);
            text-decoration: none;
        }

        /* Textos */
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-primary);
            font-weight: 600;
        }

        .text-muted {
            color: var(--text-secondary) !important;
        }

        /* Formulários específicos */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: var(--text-primary);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        /* Erros e validação */
        .error-summary {
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
            border-left: 3px solid #ff6b6b;
            padding: 15px 20px;
            margin: 0 0 20px 0;
            border-radius: 8px;
        }

        .has-error .form-control {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        .help-block {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Botões secundários */
        .btn-secondary {
            background: var(--gradient-secondary);
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        /* Footer */
        .footer {
            background: var(--darker-bg);
            color: var(--text-secondary);
            font-size: .9em;
            height: 60px;
            border-top: 1px solid var(--border-color);
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Navbar do Bootstrap (se usado) */
        .navbar {
            background: var(--card-bg) !important;
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            color: var(--text-primary) !important;
        }

        .navbar-nav .nav-link {
            color: var(--text-secondary) !important;
        }

        .navbar-nav .nav-link:hover {
            color: var(--text-primary) !important;
        }

        /* Dropdown */
        .dropdown-menu {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
        }

        .dropdown-item {
            color: var(--text-secondary);
        }

        .dropdown-item:hover {
            background: rgba(255, 107, 53, 0.1);
            color: var(--text-primary);
        }

        /* Modal */
        .modal-content {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
        }

        .modal-title {
            color: var(--text-primary);
        }

        .close {
            color: var(--text-secondary);
        }

        .close:hover {
            color: var(--text-primary);
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!-- ===== Header Customizado ===== -->
<div class="top-header">
    <div class="logo">
        <?= Html::img('@web/uploads/logo.png', ['alt' => 'Frai do Vale']) ?>
    </div>

    <div class="menu">
        <?= Html::a('A Frai do Vale', ['site/sobre']) ?>
        <?= Html::a('Cursos', ['curso/index']) ?>
        <?= Html::a('Estude na Frai', ['site/index']) ?>
        <?= Html::a('Extensão', ['site/extensao']) ?>
        <?= Html::a('Pesquisa', ['site/index']) ?>
        <?= Html::a('Serviços', ['site/index']) ?>
        <?= Html::a('Central de Apoio', ['site/central-apoio']) ?>
    </div>

    <div class="buttons">
        <?php if (Yii::$app->user->isGuest): ?>
            <?= Html::a('Sou Aluno', ['site/portal-aluno'], ['class' => 'btn-aluno']) ?>
            <?= Html::a('Matricular-se', ['site/registrar'], ['class' => 'btn-registrar']) ?>
        <?php else: ?>
            <?= Html::a('Dashboard', ['site/dashboard-aluno'], ['class' => 'btn-aluno']) ?>
            <?= Html::a('Sair', ['site/logout'], [
                'class' => 'btn-sair',
                'data' => [
                    'method' => 'post',
                    'confirm' => 'Tem certeza que deseja sair?'
                ]
            ]) ?>
        <?php endif; ?>
    </div>
</div>

<!-- ===== Conteúdo da Página ===== -->
<main class="flex-shrink-0">
    <div class="container">
        <?= \app\widgets\Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
