<?php

namespace Idy\Idea;

use Phalcon\Mvc\Router\Group as RouterGroup;

class IdeaRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPrefix('/idea');

        $this->addGet('/add', [
            'namespace' => 'Idy\Idea\Controllers\Web',
            'module' => 'idea',
            'controller' => 'Idea',
            'action' => 'addForm'
        ]);

        $this->addPost('/add', [
            'namespace' => 'Idy\Idea\Controllers\Web',
            'module' => 'idea',
            'controller' => 'Idea',
            'action' => 'add'
        ]);
    }
}