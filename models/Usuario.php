<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 */
class Usuario extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'usuario';
    }

    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            [['nome', 'email', 'senha'], 'string', 'max' => 255],
            ['email', 'email'],
            ['email', 'unique', 'message' => 'Este email já está em uso.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
        ];
    }

    // Criptografar senha antes de salvar
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->senha = Yii::$app->security->generatePasswordHash($this->senha);
            }
            return true;
        }
        return false;
    }

    // ======================
    // Implementação Identity
    // ======================

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Não usado aqui
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null; // Não usado
    }

    public function validateAuthKey($authKey)
    {
        return true; // Não usado
    }

    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->senha);
    }
}
