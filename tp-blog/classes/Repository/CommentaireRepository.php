<?php

require_once ('AbstractRepository.php');
require_once ('UserRepository.php');
require_once  ('ArticleRepository.php');

class CommentaireRepository extends AbstractRepository
{
    public function AddCommentaire()
    {
        $sql = "INSERT INTO commentaire (commentaire,userId)
            VALUES (:comentaire,:userId)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'commentaire' => $commentaire->getContent(),
            'userId' => $user->getId()
        ]);
    }
}