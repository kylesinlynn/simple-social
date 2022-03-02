<?php

require_once('Auth.php');
require_once('Post.php');

class Permission {

    public function deletePost($user_id, $post_uid) {
        return $user_id == $post_uid;
    }

}

$permit = new Permission();
// echo $permit->deletePost($auth->getUser('admin@admin.com')['id'], $post->getPost(20)['uid']);

?>