<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{   
    public $error;

    public function indexAction()
    {
       
        //var_dump($this->route);
        /*$vars = [
            'name' => 'Вася',
            'age' => 40,
        ];*/

        $res = $this->model->getNews();
        //debug($this->model);

        /*$vars = [
            'news' => $result,
        ];*/

        $this->view->render('Главная страница', $res);
    }

    public function contactAction()
    {
        if (!empty($_POST))
        {
            if (!$this->contactValidate($_POST))
            {
                $this->view->message('error', $this->error);
            }
            $this->view->message('success', 'Сообщение отправлено Администратору');
            // admin_itzone@site.ru
            mail('andr_vol@mail.ru', 'Сообщение от ' . $_POST['name'], 'Email отправителя: ' . $_POST['email'], 'Сообщение: ' . $_POST['text']);
        }
        $this->view->render('Контакты'/*, $vars*/);
    }

    public function aboutAction()
    {
        $this->view->render('Обо мне'/*, $vars*/);
    }

    public function postAction()
    {
        //var_dump($this->route);
        $res = $this->model->post($this->route['id']);
        $var = $res[0];
        $this->view->render('Вывод новости', $var);
    }

    public function contactValidate($post)
    {
        $nameLen = iconv_strlen($post['name']);

        $textLen = iconv_strlen($post['text']);

        if ($nameLen < 3 OR $nameLen > 20)
        {
            $this->error = 'Имя должно быть от 3 до 20 символов';
            
            return false;
        }
        elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->error = 'Email не верный';

            return false;
        }
        elseif ($textLen < 10 OR $textLen >500)
        {
            $this->error = 'Сообщение должно быть от 10 до 500 символов';
            return false;
        }

        return true;
    }
}