<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    /*
    public function __construct()
    {
        echo 'Модель работает';
    }*/

    public function getNews()
    {
        $result = $this->db->row('SELECT * FROM `posts`');
        return $result;
    }

    public function post($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->row('SELECT * FROM `posts` WHERE `id` = :id', $params);

    }
    
}
