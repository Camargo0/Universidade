<?php

namespace app\models;

use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // Primeiro tenta buscar no array estático
        if (isset(self::$users[$id])) {
            return new static(self::$users[$id]);
        }

        // Se não encontrou, busca no arquivo JSON
        $usuarios = self::getUsuariosFromJson();
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $id) {
                $userData = [
                    'id' => $usuario['email'],
                    'username' => $usuario['username'],
                    'password' => $usuario['password'],
                    'authKey' => 'user-' . md5($usuario['email']),
                    'accessToken' => 'token-' . md5($usuario['email']),
                ];
                return new static($userData);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // Primeiro tenta buscar no array estático (para compatibilidade)
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        // Se não encontrou, busca no arquivo JSON
        $usuarios = self::getUsuariosFromJson();
        foreach ($usuarios as $usuario) {
            if (strcasecmp($usuario['username'], $username) === 0) {
                // Cria um objeto User com os dados do JSON
                $userData = [
                    'id' => $usuario['email'],
                    'username' => $usuario['username'],
                    'password' => $usuario['password'],
                    'authKey' => 'user-' . md5($usuario['email']),
                    'accessToken' => 'token-' . md5($usuario['email']),
                ];
                return new static($userData);
            }
        }

        return null;
    }

    /**
     * Busca usuários no arquivo JSON
     */
    private static function getUsuariosFromJson()
    {
        $file = Yii::getAlias('@app/data/usuarios.json');
        if (!file_exists($file)) {
            return [];
        }
        return json_decode(file_get_contents($file), true) ?: [];
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        // Se a senha está hasheada, usa password_verify
        if (strpos($this->password, '$2y$') === 0) {
            return password_verify($password, $this->password);
        }
        // Senão, compara diretamente (para compatibilidade com dados antigos)
        return $this->password === $password;
    }
}
