<?php

namespace App\Models;

use Couchbase\UserSettings;
use Lib\DB;

class User
{
    private $id;
    private $username;
    private $password;
    private $fullName;
    private $email;

    private $hashed;

    public function __construct(array $data)
    {
        $this->id = array_key_exists('id', $data) ? $data['id'] : null;
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->fullName = $data['full_name'];
        $this->email = $data['email'];

        $this->hashed = false;
}

    public function setHesh($heshed) {
        $this->hashed = $heshed;
    }

    public function heshPassword() {
        if (!$this->hashed)
        {
            $pom = password_hash($this->password,PASSWORD_BCRYPT);
            $this->password = $pom;
            $this->hashed = true;
        }
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return false|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function save()
    {
        DB::queryOne('INSERT INTO users(full_name, username, password, email) VALUES (?,?,?,?)', [
            $this->fullName,
            $this->username,
            $this->password,
            $this->email,
        ]);

    }

    public function update()
    {

        $query = "UPDATE users SET full_name=?, username=?, password=?, email=? WHERE id=?";
        $row =DB::queryOne($query,[
            $this->fullName,
            $this->username,
            $this->password,
            $this->email,
            $this->id]);

        print_r($row);
    }

    public static function getAll() : array
    {
        $results = [];

        $rows = DB::queryAll('SELECT * FROM users');
        foreach ($rows as $row)
        {
            $user = new User($row);
            $user->setHesh(true);
            $results[] = $user;
        }

        return $results;
    }

    public static function getOneByLogin($username) : User
    {
        $row = DB::queryOne('SELECT * FROM users WHERE username=:username',['username' => $username]);
        $user = new User($row);
        $user->setHesh(true);
        return $user;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


}