<?php

namespace app\controllers;

use yii\web\Controller;

class CursoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        // Lista dos cursos com ID numérico
        $cursos = [
            1 => [
                'nome' => 'Administração',
                'descricao' => 'O curso de Administração prepara profissionais para atuar na gestão de empresas, finanças, recursos humanos e marketing.',
                'duracao' => '4 anos / 3545h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 950,00',
            ],
            2 => [
                'nome' => 'Administração Fraiburgo',
                'descricao' => 'Curso focado na realidade de Fraiburgo, formando gestores preparados para o mercado.',
                'duracao' => '4 anos / 3545h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 950,00',
            ],
            3 => [
                'nome' => 'Agronomia',
                'descricao' => 'Forma profissionais capacitados para atuar na produção agrícola e gestão rural.',
                'duracao' => '5 anos / 3820h',
                'modalidade' => 'Integral',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 1.250,00',
            ],
            4 => [
                'nome' => 'Análise e Desenvolvimento de Sistemas',
                'descricao' => 'Forma profissionais para desenvolvimento de sistemas, software e soluções web.',
                'duracao' => '3 anos / 2060h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 780,00',
            ],
            5 => [
                'nome' => 'Engenharia Civil',
                'descricao' => 'Capacita engenheiros para obras, infraestrutura e construção civil.',
                'duracao' => '5 anos / 3900h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 1.500,00',
            ],
            6 => [
                'nome' => 'Psicologia',
                'descricao' => 'Capacita profissionais para atuar em saúde mental, psicologia clínica e organizacional.',
                'duracao' => '5 anos / 3800h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 980,00',
            ],
            7 => [
                'nome' => 'Direito',
                'descricao' => 'Forma bacharéis em Direito para atuar em advocacia, defensoria, promotoria e magistratura.',
                'duracao' => '5 anos / 3800h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 1.200,00',
            ],
            8 => [
                'nome' => 'Ciências Contábeis',
                'descricao' => 'Capacita profissionais para atuar em contabilidade, auditoria e consultoria.',
                'duracao' => '4 anos / 3200h',
                'modalidade' => 'Noturno',
                'campus' => 'Campus Fraiburgo',
                'valor' => 'R$ 870,00',
            ],
        ];

        if (!array_key_exists($id, $cursos)) {
            throw new \yii\web\NotFoundHttpException('Curso não encontrado.');
        }

        return $this->render('view', [
            'id' => $id,
            'curso' => $cursos[$id],
        ]);
    }
}
