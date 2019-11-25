<?php

namespace Idy\Idea\Domain\Model;

interface AuthorRepository
{
    /**
     * @param string $email
     *
     * @return Author
     */
    public function byEmail(String $email);

    public function save(Author $author);
    
    /**
     * @param null
     *
     * @return Author
     */
    public function allAuthors();
}