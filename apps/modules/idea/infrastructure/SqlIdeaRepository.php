<?php 

namespace Idy\Idea\Infrastructure;

use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\IdeaRepository;

class SqlIdeaRepository implements IdeaRepository
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
        var_dump($st);
        exit();
        return $st;
    }

    private function buildIdea($row)
    {
        return new Idea(
            $row['id'],
            $row['title'],
            $row['description'],
            $row['author']
        );
    }

    private function insert(Idea $idea)
    {
        $sql = 'INSERT INTO ideas (id, title, description, author, ratings, votes)
        VALUES (:id, :title, :description, :author, :ratings, :votes )';

        $this->execute($sql, [
            'id' => $idea->id()->id(),
            'title' => $idea->title(),
            'description' => $idea->description(),
            'author' => $idea->author()->email(),
            'ratings' => 0,
            'votes' => $idea->votes()
        ]);
    }

    public function byId(IdeaId $id) 
    {
        $st = $this->execute(
            'SELECT * FROM ideas WHERE id = :id', 
            ['id' => $id]
        );

        if($row = $st->fetch(\PDO::FETCH_ASSOC)) {
            return $this->buildIdea($row);
        }

        return null;
    }

    public function byEmail(String $email)
    {
        $st = $this->execute(
            'SELECT * FROM ideas WHERE email = :email', 
            ['email' => $email]
        );

        if($row = $st->fetch(\PDO::FETCH_ASSOC)) {
            return $this->buildIdea($row);
        }

        return null;
    }

    public function save(Idea $idea)
    {
        $this->insert($idea);
    }

    public function allIdeas()
    {

    }
    
}