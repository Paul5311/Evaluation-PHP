<?php
//session_start();
//require_once('classes/Commentary.php');
//require_once('classes/User.php');
//require_once('classes/Repository/CommentaryRepository.php');
//require_once('classes/Repository/UserRepository.php');
//
//$user = User::isLogged();
//
//if($user === false) {
//header('Location: login.php');
//}
//
//$commentRepository = new CommentaryRepository();
//
////Je récupère l'id du commentaire à supprimer
//$commentId = $_GET['id'];
////Récupération du commentaire et on vérifie si je suis bien l'auteur du commentaire
//$comment = $commentRepository->findComment($commentId);
//var_dump($comment);
//if($user->getId() !== $comment->getUserId()) {
//
//header('Location: index.php');
//}
////Suppression du commentaire
//$commentRepository->deleteComment($commentId);
////Je redirige vers show article
//header('Location: show-article.php');