<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\AuthorRepository;
use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\IdeaRepository;

class CreateNewIdeaService
{
    private $ideaRepository;
    private $authorRepository;

    public function __construct(
        IdeaRepository $ideaRepository,
        AuthorRepository $authorRepository)
    {
        $this->ideaRepository = $ideaRepository;
        $this->authorRepository = $authorRepository;
    }

    public function execute(CreateNewIdeaRequest $request)
    {
        $ideaTitle = $request->ideaTitle();
        $ideaDescription = $request->ideaDescription();
        $authorName = $request->authorName();
        $authorEmail = $request->authorEmail();

        $ideaId = new IdeaId();
        $author = $this->authorRepository->byEmail($authorEmail);

        $idea = new Idea(
            $ideaId,
            $ideaTitle,
            $ideaDescription,
            $author
        );

        $this->ideaRepository->save($idea);
    }

}