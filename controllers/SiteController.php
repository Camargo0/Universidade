<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CadastroForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'], // Somente usuários autenticados podem fazer logout
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Página inicial.
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Página Sobre (A Frai do Vale)
     */
    public function actionSobre()
    {
        return $this->render('sobre');
    }

    /**
     * Central de Apoio ao Estudante
     */
    public function actionCentralApoio()
    {
        return $this->render('central-apoio');
    }

    /**
     * Login padrão (professor e colaborador)
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login do aluno
     */
    public function actionLoginAluno()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard-aluno']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/dashboard-aluno']);
        }

        $model->password = '';
        return $this->render('login-aluno', [
            'model' => $model,
        ]);
    }

    /**
     * Dashboard do aluno
     */
    public function actionDashboardAluno()
    {
        // Verifica se o usuário está logado
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'Você precisa estar logado para acessar o dashboard.');
            return $this->redirect(['site/login-aluno']);
        }

        $user = Yii::$app->user->identity;

        // Busca dados do usuário no JSON para pegar o curso
        $usuarios = $this->getUsuariosFromJson();
        $userData = null;
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $user->id) {
                $userData = $usuario;
                break;
            }
        }

        // Dados do aluno
        $aluno = [
            'nome' => $user->username,
            'matricula' => $user->id,
            'curso' => $userData['curso'] ?? 'Administração',
            'semestre' => '1º Semestre',
            'turma' => substr($userData['curso'] ?? 'ADM', 0, 3) . '-2024-1'
        ];

        // Dados específicos por curso
        $dadosCurso = $this->getDadosPorCurso($aluno['curso']);

        return $this->render('dashboard-aluno', [
            'aluno' => $aluno,
            'notas' => $dadosCurso['notas'],
            'materias' => $dadosCurso['materias'],
            'presenca' => $dadosCurso['presenca'],
        ]);
    }

    /**
     * Busca usuários no arquivo JSON
     */
    private function getUsuariosFromJson()
    {
        $file = Yii::getAlias('@app/data/usuarios.json');
        if (!file_exists($file)) {
            return [];
        }
        return json_decode(file_get_contents($file), true) ?: [];
    }

    /**
     * Retorna dados específicos por curso
     */
    private function getDadosPorCurso($curso)
    {
        $dados = [
            'Administração' => [
                'notas' => [
                    ['materia' => 'Matemática Financeira', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Gestão de Pessoas', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Marketing', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Contabilidade', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Administração Financeira', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                ],
                'materias' => [
                    ['nome' => 'Matemática Financeira', 'professor' => 'Dr. Carlos Santos', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 19:00 às 20:40', 'sala' => 'Sala 101'],
                    ['nome' => 'Gestão de Pessoas', 'professor' => 'Dra. Maria Oliveira', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 19:00 às 20:40', 'sala' => 'Sala 102'],
                    ['nome' => 'Marketing', 'professor' => 'Prof. Roberto Lima', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 20:50 às 22:30', 'sala' => 'Sala 103'],
                    ['nome' => 'Contabilidade', 'professor' => 'Dra. Ana Costa', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 20:50 às 22:30', 'sala' => 'Sala 104'],
                    ['nome' => 'Administração Financeira', 'professor' => 'Dr. João Silva', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Sexta - 19:00 às 22:30', 'sala' => 'Sala 105'],
                ],
                'presenca' => [
                    ['materia' => 'Matemática Financeira', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Gestão de Pessoas', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Marketing', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Contabilidade', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Administração Financeira', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                ]
            ],
            'Agronomia' => [
                'notas' => [
                    ['materia' => 'Botânica', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Solos', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Fitopatologia', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Mecanização Agrícola', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Agricultura Orgânica', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                ],
                'materias' => [
                    ['nome' => 'Botânica', 'professor' => 'Dr. Pedro Santos', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 19:00 às 20:40', 'sala' => 'Sala 201'],
                    ['nome' => 'Solos', 'professor' => 'Dra. Ana Ferreira', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 19:00 às 20:40', 'sala' => 'Sala 202'],
                    ['nome' => 'Fitopatologia', 'professor' => 'Prof. Carlos Mendes', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 20:50 às 22:30', 'sala' => 'Sala 203'],
                    ['nome' => 'Mecanização Agrícola', 'professor' => 'Dr. Roberto Alves', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 20:50 às 22:30', 'sala' => 'Sala 204'],
                    ['nome' => 'Agricultura Orgânica', 'professor' => 'Dra. Maria Costa', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Sexta - 19:00 às 22:30', 'sala' => 'Sala 205'],
                ],
                'presenca' => [
                    ['materia' => 'Botânica', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Solos', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Fitopatologia', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Mecanização Agrícola', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Agricultura Orgânica', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                ]
            ],
            'Análise e Desenvolvimento de Sistemas' => [
                'notas' => [
                    ['materia' => 'Programação I', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Banco de Dados', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Desenvolvimento Web', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Estrutura de Dados', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Engenharia de Software', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                ],
                'materias' => [
                    ['nome' => 'Programação I', 'professor' => 'Dr. Lucas Silva', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 19:00 às 20:40', 'sala' => 'Lab 301'],
                    ['nome' => 'Banco de Dados', 'professor' => 'Dra. Fernanda Lima', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 19:00 às 20:40', 'sala' => 'Lab 302'],
                    ['nome' => 'Desenvolvimento Web', 'professor' => 'Prof. Rafael Costa', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 20:50 às 22:30', 'sala' => 'Lab 303'],
                    ['nome' => 'Estrutura de Dados', 'professor' => 'Dr. André Santos', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 20:50 às 22:30', 'sala' => 'Lab 304'],
                    ['nome' => 'Engenharia de Software', 'professor' => 'Dra. Juliana Alves', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Sexta - 19:00 às 22:30', 'sala' => 'Lab 305'],
                ],
                'presenca' => [
                    ['materia' => 'Programação I', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Banco de Dados', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Desenvolvimento Web', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Estrutura de Dados', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Engenharia de Software', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                ]
            ],
            'Engenharia Civil' => [
                'notas' => [
                    ['materia' => 'Cálculo I', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Física I', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Desenho Técnico', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Mecânica dos Solos', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Resistência dos Materiais', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                ],
                'materias' => [
                    ['nome' => 'Cálculo I', 'professor' => 'Dr. Paulo Mendes', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 19:00 às 20:40', 'sala' => 'Sala 401'],
                    ['nome' => 'Física I', 'professor' => 'Dra. Carla Silva', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 19:00 às 20:40', 'sala' => 'Sala 402'],
                    ['nome' => 'Desenho Técnico', 'professor' => 'Prof. Marcos Costa', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 20:50 às 22:30', 'sala' => 'Sala 403'],
                    ['nome' => 'Mecânica dos Solos', 'professor' => 'Dr. Ricardo Alves', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 20:50 às 22:30', 'sala' => 'Sala 404'],
                    ['nome' => 'Resistência dos Materiais', 'professor' => 'Dra. Patrícia Lima', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Sexta - 19:00 às 22:30', 'sala' => 'Sala 405'],
                ],
                'presenca' => [
                    ['materia' => 'Cálculo I', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Física I', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Desenho Técnico', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Mecânica dos Solos', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Resistência dos Materiais', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                ]
            ],
            'Psicologia' => [
                'notas' => [
                    ['materia' => 'Psicologia Geral', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'História da Psicologia', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Psicologia do Desenvolvimento', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Psicologia Social', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                    ['materia' => 'Psicopatologia', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
                ],
                'materias' => [
                    ['nome' => 'Psicologia Geral', 'professor' => 'Dra. Ana Paula Santos', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 19:00 às 20:40', 'sala' => 'Sala 501'],
                    ['nome' => 'História da Psicologia', 'professor' => 'Dr. Carlos Oliveira', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 19:00 às 20:40', 'sala' => 'Sala 502'],
                    ['nome' => 'Psicologia do Desenvolvimento', 'professor' => 'Dra. Maria Fernanda', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Segunda e Quarta - 20:50 às 22:30', 'sala' => 'Sala 503'],
                    ['nome' => 'Psicologia Social', 'professor' => 'Prof. Roberto Silva', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Terça e Quinta - 20:50 às 22:30', 'sala' => 'Sala 504'],
                    ['nome' => 'Psicopatologia', 'professor' => 'Dr. João Carlos', 'carga_horaria' => '60h', 'creditos' => 4, 'horario' => 'Sexta - 19:00 às 22:30', 'sala' => 'Sala 505'],
                ],
                'presenca' => [
                    ['materia' => 'Psicologia Geral', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'História da Psicologia', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Psicologia do Desenvolvimento', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Psicologia Social', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                    ['materia' => 'Psicopatologia', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
                ]
            ]
        ];

        // Retorna dados do curso ou dados padrão se não encontrar
        return $dados[$curso] ?? $dados['Administração'];
    }

    /**
     * Logout
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Página de contato
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Página About padrão
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Página de cadastro de aluno
     */
    public function actionRegistrar()
    {
        $model = new CadastroForm();

        if ($model->load(Yii::$app->request->post())) {
            // Log para debug
            Yii::info('Formulário carregado: ' . json_encode($model->attributes), 'app');
            
            $userData = $model->cadastrar();
            if ($userData) {
                // Login automático - cria um objeto User simples
                $user = new \app\models\User();
                $user->id = $userData['email'];
                $user->username = $userData['username'];
                $user->password = $userData['password'];
                $user->authKey = 'user-' . md5($userData['email']);
                $user->accessToken = 'token-' . md5($userData['email']);
                
                // Faz login por 30 dias
                Yii::$app->user->login($user, 3600*24*30);

                Yii::$app->session->setFlash('success', 'Matrícula realizada com sucesso! Bem-vindo ao portal do aluno.');
                return $this->redirect(['site/portal-aluno'], 302);
            } else {
                Yii::error('Erro no cadastro: ' . json_encode($model->errors), 'app');
                Yii::$app->session->setFlash('error', 'Erro ao realizar matrícula: ' . json_encode($model->errors));
            }
        }

        return $this->render('registrar', [
            'model' => $model,
        ]);
    }

    /**
     * Portal do Aluno
     */
    public function actionPortalAluno()
    {
        // Verifica se o usuário está logado
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'Você precisa estar logado para acessar o portal do aluno.');
            return $this->redirect(['site/login-aluno']);
        }

        $user = Yii::$app->user->identity;

        // Dados do aluno a partir do usuário logado
        $aluno = [
            'nome' => $user->username,
            'matricula' => $user->id,
            'curso' => 'Administração', // Pode ser dinâmico se salvar no cadastro
            'semestre' => '1º Semestre',
            'turma' => 'ADM-2024-1'
        ];

        // Dados simulados das notas
        $notas = [
            [
                'materia' => 'Matemática Financeira',
                'nota1' => 8.5,
                'nota2' => 7.8,
                'nota3' => 9.2,
                'media' => 8.5,
                'status' => 'Aprovado'
            ],
            [
                'materia' => 'Gestão de Pessoas',
                'nota1' => 9.0,
                'nota2' => 8.5,
                'nota3' => 8.8,
                'media' => 8.8,
                'status' => 'Aprovado'
            ],
            [
                'materia' => 'Marketing',
                'nota1' => 7.5,
                'nota2' => 8.0,
                'nota3' => 7.8,
                'media' => 7.8,
                'status' => 'Aprovado'
            ],
            [
                'materia' => 'Contabilidade',
                'nota1' => 6.5,
                'nota2' => 7.0,
                'nota3' => 6.8,
                'media' => 6.8,
                'status' => 'Aprovado'
            ]
        ];

        // Dados simulados das matérias
        $materias = [
            [
                'nome' => 'Matemática Financeira',
                'professor' => 'Dr. Carlos Santos',
                'carga_horaria' => '60h',
                'creditos' => 4,
                'horario' => 'Segunda e Quarta - 19:00 às 20:40',
                'sala' => 'Sala 101'
            ],
            [
                'nome' => 'Gestão de Pessoas',
                'professor' => 'Dra. Maria Oliveira',
                'carga_horaria' => '60h',
                'creditos' => 4,
                'horario' => 'Terça e Quinta - 19:00 às 20:40',
                'sala' => 'Sala 102'
            ],
            [
                'nome' => 'Marketing',
                'professor' => 'Prof. Roberto Lima',
                'carga_horaria' => '60h',
                'creditos' => 4,
                'horario' => 'Segunda e Quarta - 20:50 às 22:30',
                'sala' => 'Sala 103'
            ],
            [
                'nome' => 'Contabilidade',
                'professor' => 'Dra. Ana Costa',
                'carga_horaria' => '60h',
                'creditos' => 4,
                'horario' => 'Terça e Quinta - 20:50 às 22:30',
                'sala' => 'Sala 104'
            ]
        ];

        // Dados simulados da presença
        $presenca = [
            [
                'materia' => 'Matemática Financeira',
                'total_aulas' => 20,
                'presencas' => 18,
                'faltas' => 2,
                'percentual' => 90.0
            ],
            [
                'materia' => 'Gestão de Pessoas',
                'total_aulas' => 20,
                'presencas' => 19,
                'faltas' => 1,
                'percentual' => 95.0
            ],
            [
                'materia' => 'Marketing',
                'total_aulas' => 20,
                'presencas' => 17,
                'faltas' => 3,
                'percentual' => 85.0
            ],
            [
                'materia' => 'Contabilidade',
                'total_aulas' => 20,
                'presencas' => 16,
                'faltas' => 4,
                'percentual' => 80.0
            ]
        ];

        return $this->render('portal-aluno', [
            'aluno' => $aluno,
            'notas' => $notas,
            'materias' => $materias,
            'presenca' => $presenca,
        ]);
    }

    /**
     * Página de Extensão Universitária
     */
    public function actionExtensao()
    {
        return $this->render('extensao');
    }
}
