<?php
session_start();
require_once('classes/Commentary.php');
require_once('classes/User.php');
require_once('classes/Repository/CommentaryRepository.php');

$user = User::isLogged();

$commentaryRepository = new CommentaryRepository();

//Je récupère l'id de l'article à supprimer
$commentaryId = $_GET['idComment'];

//Récupération de l'article et on vérifie si je suis bien l'auteur de l'article
//$commentary = $commentaryRepository->findCommentary($commentaryId);

//Suppression de l'article
$commentaryRepository->deleteCommentary($commentaryId);

//Je redirige vers l'accueil
header('Location: index.php');