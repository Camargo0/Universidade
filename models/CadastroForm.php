<?php

namespace app\models;

use yii\base\Model;
use Yii;

class CadastroForm extends Model
{
    public $username;
    public $email;
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
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nome de Usuário',
            'email' => 'Email',
            'password' => 'Senha',
            'password_repeat' => 'Repetir Senha',
        ];
    }

    public function cadastrar()
    {
        if (!$this->validate()) {
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
        $usuarios[] = [
            'username' => $this->username,
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
        ];

        file_put_contents(Yii::getAlias('@app/data/usuarios.json'), json_encode($usuarios));

        return true;
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
