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
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }
        .top-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 40px;
            background-color: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .logo img {
            height: 65px;
        }
        .menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 14px;
            transition: 0.3s;
        }
        .menu a:hover {
            color: #e86916;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .btn-prof, .btn-aluno {
            padding: 8px 14px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-prof {
            background: linear-gradient(to right, #f7931e, #f15a24);
        }
        .btn-aluno {
            background-color: #00aadd;
        }
        .btn-prof:hover {
            background: linear-gradient(to right, #e57a0a, #d4470a);
        }
        .btn-aluno:hover {
            background-color: #0088aa;
        }
        main {
            padding: 30px;
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
        <?= Html::a('Extensão', ['site/index']) ?>
        <?= Html::a('Pesquisa', ['site/index']) ?>
        <?= Html::a('Serviços', ['site/index']) ?>
        <?= Html::a('Central de Apoio', ['site/index']) ?>
        <?= Html::a('Egressos', ['site/index']) ?>
    </div>

    <div class="buttons">
        <?= Html::a('Portal do Professor', ['site/login'], ['class' => 'btn-prof']) ?>
        <?= Html::a('Sou Aluno', ['site/login-aluno'], ['class' => 'btn-aluno']) ?>
    </div>
</div>

<!-- ===== Conteúdo da Página ===== -->
<main class="flex-shrink-0">
    <div class="container">
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
