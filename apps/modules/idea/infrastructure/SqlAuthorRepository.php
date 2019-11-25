<?php 

namespace Idy\Idea\Infrastructure;

use Idy\Idea\Domain\Model\Author;
use Idy\Idea\Domain\Model\AuthorRepository;

class SqlAuthorRepository implements AuthorRepository
{

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Helper functions
    private function execute($sql, array $parameters)
    {
        $st = $this->pdo->prepare($sql);

        $st->execute($parameters);

        return $st;
    }

    private function buildAuthor($row)
    {
        return new Author(
            $row['name'],
            $row['email']
        );
    }

    public function byEmail(String $email)
    {
        $st = $this->execute(
            'SELECT * FROM authors WHERE email = :email', 
            ['email' => $email]
        );

        if($row = $st->fetch(\PDO::FETCH_ASSOC)) {
            return $this->buildAuthor($row);
        }

        return null;
    }

    public function save(Author $author)
    {

    }

    public function allAuthors()
    {
        
    }

}