<?php

    class Database {
        private $dbhost = 'localhost';
        private $dbuser = 'root';
        private $dbpass = '';
        private $dbname = 'simple_social';

        protected static $dbconn = null;

        public function __construct() {
            try {
                $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
                $this->dbconn = new PDO($dsn, $this->dbuser, $this->dbpass);
                $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                exit('Failed to connect : ' . $e->getMessage());
            }
        }

        public function checkUser($email) {
            $sql = 'SELECT id, name, email FROM user WHERE email = :email';
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        private function checkPassword($email, $password) {
            $sql = 'SELECT password FROM user WHERE email = :email';
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC)['password'] == md5($password);
        }

        private function checkPost($post_id) {
            $sql = 'SELECT * FROM post WHERE id = :post_id';
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(['post_id' => $post_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        private function notNull($arg1, $arg2) {
            return $arg1 !== null and $arg1 !== '' and $arg2 !== null and $arg2 !== '';
        }

        private function authorizedUser($post_id, $email) {
            return $this->notNull($post_id, $email) and $this->checkPost($post_id)['uid'] === $this->checkUser($email)['id'];
        }

        public function register($email, $password, $password_confirmation) {
            if ($this->notNull($email, $password) and $password == $password_confirmation) {
                if(!$this->checkUser($email)) {
                    $sql = 'INSERT INTO user (email, password) VALUES (:email, :password)';
                    $stmt = $this->dbconn->prepare($sql);
                    $stmt->execute([
                        'email' => $email,
                        'password' => md5($password),
                    ]);
                    return true;
                }
            }
            return false;
        }

        public function login($email, $password) {
            if ($this->notNull($email, $password)) {
                if($this->checkUser($email)) {
                    return true;
                }
            }
            return false;
        }

        // public function readPost($id, $email) {
        //     $sql = 'SELECT * FROM post WHERE id = :id';
        //     $stmt = $this->dbconn->prepare($sql);
        //     $stmt->execute([
        //         'id' => $id
        //     ]);
        //     return $stmt->fetch(PDO::FETCH_ASSOC);
        // }

        // public function readAllPosts($email) {
        //     $sql = 'SELECT * FROM post';
        //     $stmt = $this->dbconn->prepare($sql);
        //     $stmt->execute();
        //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // }

        // public function editPost() {
        //     return false;
        // }

        // public function deletePost($id, $email) {
        //     if ($this->authorizedUser($id, $email)) {
        //         $sql = 'DELETE FROM post WHERE id = :id';
        //         $stmt = $this->dbconn->prepare($sql);
        //         $post = $stmt->execute([
        //             'id' => $id
        //         ]);
        //         return true;
        //     }
        //     return false;
        // }
        
    }

?>