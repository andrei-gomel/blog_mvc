<?php

namespace application\controllers;

use application\core\Controller;
//use Imagick;


class AdminController extends Controller
{   
    public $error;

    public function __construct($route)
    {
        parent::__construct($route);

        $this->view->layout = 'admin';

        //$_SESSION['admin'] = 1;
        //unset ($_SESSION);
    }

    public function loginAction()
    {
        if (isset($_SESSION['admin']))
        {
            $this->redirect('blog_mvc/www/admin/add');
        }
        
        //var_dump($this->route);
        /*$vars = [
            'name' => 'Вася',
            'age' => 40,
        ];*/
        
        $this->error = '';

        if (!empty($_POST))
        {
            if (!$this->loginValidate($_POST))
            {
                $this->view->message('error', $this->error);
            }

            $_SESSION['admin'] = 1;
            $this->view->location('blog_mvc/www/admin/add');
        }        

        $this->view->render('Авторизация'/*, $vars*/);
    }

    public function loginValidate($post)
    {        
        $config = require 'application/config/admin.php';

        $login = trim($post['login']);

        $login = htmlspecialchars($login);

        $loginLen = iconv_strlen($login);

        $password = trim($post['password']);

        $password = htmlspecialchars($password);

        $passwordLen = iconv_strlen($password);

        if ($config['login'] != $login OR $config['password'] != $password)
        {
            $this->error = 'Логин или пароль не верный';
            
            return false;
        }
        
        /*if ($loginLen < 3 OR $loginLen > 15)
        {
            $this->error = 'Логин должен быть от 3 до 15 символов';
            
            return false;
        }
        elseif($passwordLen < 6 OR $passwordLen > 15)
        {
            $this->error = 'Пароль должен быть от 6 до 15 символов';
            
            return false;
        }*/
        
        return true;
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('blog_mvc/www/admin/login');
    }
    
    public function postsAction()
    {
        
        $vars = $this->model->postList();

        $this->view->render('Список постов', $vars);
    }
    
    public function addAction()
    {
                
        if (!empty($_POST))
        {            
            if (!$this->postValidate($_POST, 'add'))
            {
                $this->view->message('error', $this->error);
            }           
            
            $id = $this->model->addPost($_POST);

            if (!$id)
            {               
                $this->view->message('error', 'Ошибка записи в БД');
            }
            
            $this->postImageUplode($_FILES['img']['tmp_name'], $id);
            
            $this->view->location('blog_mvc/www/admin/posts');          
        }

        $this->view->render('Добавление поста'/*, $vars*/);
        
    }

    public function postValidate($post, $type)
    {        

        $nameLen = iconv_strlen($post['name']);
        
        $descriptionLen = iconv_strlen($post['description']);        

        $textLen = iconv_strlen($post['posttext']);

        if ($nameLen < 20 OR $nameLen > 100)
        {
            $this->error = 'Название должно быть от 20 до 100 символов';
            
            return false;
        }
        elseif ($descriptionLen < 20 OR $descriptionLen > 100)
        {
            $this->error = 'Описание должно быть от 20 до 100 символов';
            
            return false;
        }
        elseif ($textLen < 30 OR $textLen > 1000)
        {
            $this->error = 'Текст должен быть от 30 до 1000 символов';
            
            return false;
        }

        if (empty($_FILES['img']['tmp_name']) AND $type == 'add')
        {            
            $this->error = 'Изображение не выбрано';
            return false;            
        }        

        return true;
    }

    public function editAction()
    {
        //var_dump($this->route);
        if (!empty($_POST))
        {
            if (!$this->postValidate($_POST, 'edit'))
            {
                $this->view->message('error', $this->error);
            }

            if ($this->model->postUpdate($_POST, $this->route['id']))
            {                
                $this->view->location('blog_mvc/www/admin/posts');                
            }
            else
            {
                $this->view->message('error', 'Ошибка сохранения');
            }
            
        }        
        
        $res = $this->model->findForEdit($this->route['id']);

        if (!$res)
        {
            $this->view->errorCode(404);
        }
        $item = $res[0];
        
        $this->view->render('Редактирование новости', $item);        
    }

    public function deleteAction()
    {
        //debug($this->route['id']);

        if (!$this->model->isPostExists($this->route['id']))
        {
            $this->view->errorCode(404);
        }
        
        if ($this->model->postDelete($this->route['id']))
        {
            unlink('public/post_img/'. $this->route['id'] . '.jpg');            

            $this->redirect('blog_mvc/www/admin/posts');
        }
        else
        {
            exit('Ошибка удаления ');
        }
        
    }

    public function postImageUplode($path, $id)
    {
        /*$img = new Imagick($path);

        $img->cropThumbnailImage(1024, 800);
              
        $img->setImageCompressionQuality(80);

        $img->writeImage('public/post_img/'. $id . '.jpg');*/

        move_uploaded_file($path, 'public/post_img/'. $id . '.jpg');
    }

    public function redirect($url)
    {
        header('Location: /' . $url);
        exit;
    }
}