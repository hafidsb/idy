<?php

namespace Idy\Idea\Controllers\Web;

use Idy\Idea\Application\CreateNewIdeaRequest;
use Idy\Idea\Application\CreateNewIdeaService;
use Idy\Idea\Infrastructure\SqlauthorRepository;
use Idy\Idea\Infrastructure\SqlIdeaRepository;
use Phalcon\Mvc\Controller;

class IdeaController extends Controller
{
    /**
     * @var CreateNewIdeaService
     */
    private $createNewIdeaService;

    /**
     * @var ViewAllIdeaService
     */
    private $viewAllIdeasService;

    private $ideaTitleRequestKey = 'title';
    private $ideaDescriptionRequestKey = 'description';
    private $authorNameRequestKey = 'name';
    private $authorEmailRequestKey = 'email';

    public function onConstruct()
    {
        $mysqlpdoBuilder = new MySQLPdo();
        $mysqlpdo = $mysqlpdoBuilder->build();
        $sqlIdeaRepository = new SqlIdeaRepository($mysqlpdo);
        $sqlAuthorRepository = new SqlAuthorRepository($mysqlpdo);
        $this->createNewIdeaService = new CreateNewIdeaService($sqlIdeaRepository, $sqlAuthorRepository);
    }

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
            $createNewIdeaRequest = new CreateNewIdeaRequest(
                $this->request->getPost($this->ideaTitleRequestKey),
                $this->request->getPost($this->ideaDescriptionRequestKey),
                $this->request->getPost($this->authorNameRequestKey),
                $this->request->getPost($this->authorEmailRequestKey)
            );

            $response = $this->createNewIdeaService->execute($createNewIdeaRequest);
            return $this->response->redirect('/');
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