<?php

namespace Idy\Idea\Application;

class CreateNewIdeaRequest
{
    private $ideaTitle;
    private $ideaDescription;
    private $authorName;
    private $authorEmail;

    public function __construct($ideaTitle, $ideaDescription, $authorName, $authorEmail)
    {
        $this->ideaTitle = $ideaTitle;
        $this->ideaDescription = $ideaDescription;
        $this->authorName = $authorName;
        $this->authorEmail = $authorEmail;
    }

    public function ideaTitle()
    {
        return $this->ideaTitle;
    }

    public function ideaDescription()
    {
        return $this->ideaDescription;
    }

    public function authorName()
    {
        return $this->authorName;
    }

    public function authorEmail()
    {
        return $this->authorEmail;
    }

}