<?php

require_once('Database.php');

class Auth extends Database {

    private static $table = 'user';

    public function getUser($email) {
        $stmt = $this->dbconn->prepare('SELECT id, name, email FROM ' . self::$table . ' WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function checkUserPassword($email, $password) {
        if ($this->getUser($email)) {
            $stmt = $this->dbconn->prepare('SELECT password FROM ' . self::$table . ' WHERE email = :email');
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC)['password'] == md5($password);
        }
        return false;
    }

    public function register($email, $password, $password_confirmation) {
        if ($this->getUser($email)) {
            return 'User already exists.';
        } else if ($password !== $password_confirmation) {
            return 'Password does not match.';
        } else {
            $stmt = $this->dbconn->prepare('INSERT INTO ' . self::$table . ' (email, password) VALUES (:email, :password)');
            $stmt->execute([
                'email' => $email,
                'password' => md5($password),
            ]);
            return 'User registered.';
        }
    }

    public function login($email, $password) {
        if ($this->getUser($email)) {
            if ($this->checkUserPassword($email, $password)) {
                return [
                    'status' => 'Successfully logged in!',
                    'user' => $this->getUser($email)
                ];
            }
            return [
                'status' => 'Incorrect Password!',
                'user' => false
            ];
        }
        return [
            'status' => 'User does not exist.',
            'user' => false
        ];
    }

}

$auth = new Auth();

?>