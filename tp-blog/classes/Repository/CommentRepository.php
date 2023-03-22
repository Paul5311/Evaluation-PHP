<?php

require_once ('AbstractRepository.php');
require_once ('UserRepository.php');
require_once  ('ArticleRepository.php');

class CommentRepository extends AbstractRepository
{

    public function AddComment(Comment $comment, User $user)
    {
        $sql = "INSERT INTO commentaire (comment,userId)
            VALUES (:comment,:userId)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'comment' => $comment->getComment(),
            'userId' => $user->getId()
        ]);
    }

//    public function findCommentaire(int $id): Commentaire|bool
//    {
//        $sql = "SELECT * FROM commentaire WHERE id = :id";
//        $query = $this->db->prepare($sql);
//        $query->execute([
//            'id' => $id
//        ]);
//        return $query->fetchObject(Commentaire::class);
//
//    }

}