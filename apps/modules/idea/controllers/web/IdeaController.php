<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;

class IdeaController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('home');
    }


    public function addFormAction()
    {
        $this->view->pick('add');
    }

    public function addAction()
    {
        
        if($this->request->isPost()){
            return "HEHE";
        }
        
        return "LOLO"; 
    }

    public function voteAction()
    {
        return "L";
    }

    public function rateAction()
    {
        
    }

}