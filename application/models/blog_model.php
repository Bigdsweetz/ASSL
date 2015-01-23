<?php if (!defined(BASEPATH'')) exit ('No direct script access allowed');

class blog_model extends CI_Model{
    
        publice function ave_post($title, $body){
            $this ->db - >insert ('posts',
            array (
                'title' => $title,
                'body'  => $body
            )
        );
    }
}