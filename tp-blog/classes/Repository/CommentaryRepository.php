<?php

require_once('AbstractRepository.php');
require_once('UserRepository.php');
require_once('ArticleRepository.php');

class CommentaryRepository extends AbstractRepository
{

    public function addCommentary(Commentary $commentary, User $user)
    {
        $sql = "INSERT INTO commentary (commentary , userId)
            VALUES (:commentary, :userId)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'commentary' => $commentary->getCommentary(),
            'userId' => $user->getId(),

        ]);
    }

    /**
     * @return Commentary[]
     */
    public function getAllCommentary(): array
    {
        $sql = "SELECT * FROM commentary";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }




}