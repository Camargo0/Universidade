<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

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
            ['username', 'string', 'min' => 3, 'max' => 255],
            ['password', 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'As senhas não coincidem.'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Este email já está cadastrado.'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Este usuário já existe.'],
        ];
    }

    public function cadastrar()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->tipo = 'aluno'; // Define como aluno
        return $user->save() ? $user : null;
    }
}
