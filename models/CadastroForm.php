<?php

namespace app\models;

use yii\base\Model;
use Yii;

class CadastroForm extends Model
{
    public $username;
    public $cpf;
    public $data_nascimento;
    public $telefone;
    public $email;
    public $curso;
    public $turno;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'string', 'min' => 3],
            [['password'], 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'As senhas não conferem.'],
            // Campos opcionais
            ['cpf', 'string', 'max' => 14],
            ['telefone', 'string', 'max' => 15],
            ['curso', 'string'],
            ['turno', 'string'],
            ['data_nascimento', 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nome Completo',
            'cpf' => 'CPF',
            'data_nascimento' => 'Data de Nascimento',
            'telefone' => 'Telefone',
            'email' => 'Email',
            'curso' => 'Curso',
            'turno' => 'Turno',
            'password' => 'Senha',
            'password_repeat' => 'Confirmar Senha',
        ];
    }

    public function cadastrar()
    {
        if (!$this->validate()) {
            Yii::error('Erro de validação: ' . json_encode($this->errors), 'app');
            return false;
        }

        $usuarios = $this->getUsuarios();

        // Verifica se usuário ou email já existe
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $this->email) {
                $this->addError('email', 'Este email já está cadastrado.');
                return false;
            }
            if ($usuario['username'] === $this->username) {
                $this->addError('username', 'Este nome de usuário já está cadastrado.');
                return false;
            }
        }

        // Cadastra novo usuário
        $novoUsuario = [
            'username' => $this->username,
            'cpf' => $this->cpf ?: '',
            'data_nascimento' => $this->data_nascimento ?: '',
            'telefone' => $this->telefone ?: '',
            'email' => $this->email,
            'curso' => $this->curso ?: '',
            'turno' => $this->turno ?: '',
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            'data_cadastro' => date('Y-m-d H:i:s'),
        ];

        $usuarios[] = $novoUsuario;

        $result = file_put_contents(Yii::getAlias('@app/data/usuarios.json'), json_encode($usuarios));
        if ($result === false) {
            Yii::error('Erro ao salvar arquivo de usuários', 'app');
            return false;
        }

        // Retorne o usuário cadastrado
        return $novoUsuario;
    }

    private function getUsuarios()
    {
        $file = Yii::getAlias('@app/data/usuarios.json');
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }
        return json_decode(file_get_contents($file), true);
    }
}
