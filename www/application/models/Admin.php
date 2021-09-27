<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    /*
    public function __construct()
    {
        echo 'Модель работает';
    }*/

    public function getNews()
    {
        //debug($this->db);
        $result = $this->db->row('SELECT * FROM `news`');
        return $result;
    }

    public function addPost($post)
    {
        $data = date('Y-m-d');

        $params = [  
            'name'        => $post['name'],
            'description' => $post['description'],
            'text'        => $post['posttext'],
            'data'        => $data,
        ];

        $this->db->query('INSERT INTO `posts` (`name`, `description`, `posttext`, `date`) VALUES (:name, :description, :text, :data )', $params);

        return $this->db->lastInsertId();

    }

    public function findForEdit($id)
    {
        $params = [
            'id' => $id,
        ];        

        return $this->db->row('SELECT * FROM `posts` WHERE `id` = :id', $params);

    }
    
    public function isPostExists($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->column('SELECT `id` FROM `posts` WHERE `id` = :id', $params);
    }

    public function postDelete($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->query('DELETE FROM `posts` WHERE `id` = :id', $params);
    }

    public function postList()
    {
        $result = $this->db->row('SELECT * FROM `posts` ORDER BY `id` ASC');
        return $result;
    }

    public function postUpdate($post, $id)
    {
        $params = [  
            'id'          => $id,
            'name'        => $post['name'],
            'description' => $post['description'],
            'text'        => $post['posttext'],

        ];

        if ($this->db->query('UPDATE `posts` SET `name` = :name, `description` = :description, `posttext` = :text WHERE `id` = :id', $params))
        {
            return true;
        }
        else
        {
            return false;
        }       

    }
    
}
