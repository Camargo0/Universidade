<?php

namespace app\models;

use yii\base\Model;

class UsuarioForm extends Model
{
    public $usuario;
    public $senha;

    public function rules()
    {
        return [
            [['usuario', 'senha'], 'required'],
            [['usuario', 'senha'], 'string', 'min' => 3],
        ];
    }

    public function attributeLabels()
    {
        return [
            'usuario' => 'Usuário',
            'senha' => 'Senha',
        ];
    }
}

