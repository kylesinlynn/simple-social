<?php

require_once('Database.php');

class Post extends Database {

    private static $table = 'post';

    public function createPost($content, $privacy, $uid) {
        $stmt = $this->dbconn->prepare('INSERT INTO ' . self::$table . ' (content, privacy, uid) VALUES (:content, :privacy, :uid)');
        $stmt->execute([
            'content' => $content,
            'privacy' => $privacy,
            'uid' => $uid,
        ]);
        return $this->getPost($this->dbconn->lastInsertId());
    }

    public function getAllPosts() {
        $stmt = $this->dbconn->prepare('SELECT * FROM ' . self::$table . ' ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost($id) {
        $stmt = $this->dbconn->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletePost($id) {
        if ($this->getPost($id)) {
            $stmt = $this->dbconn->prepare('DELETE FROM ' . self::$table . ' WHERE id = :id');
            $post = $stmt->execute(['id' => $id]);
            return 'Post has been deleted.';
        }
        return 'Post does not exist';
    }

}

$post = new Post();

?>