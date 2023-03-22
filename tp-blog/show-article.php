<?php
session_start();
require_once('classes/Article.php');
require_once('classes/Repository/ArticleRepository.php');
require_once('classes/User.php');
require_once('classes/Repository/UserRepository.php');
require_once('classes/Comment.php');
require_once('classes/Repository/CommentRepository.php');


$user = User::isLogged();

$articleRepository = new ArticleRepository();
$userRepository = new UserRepository();
$commentRepository = new CommentRepository();
$comment = new Comment();
$commentErreurs = [];

const ERROR_COMMENT_REQUIRED = 'Veuillez renseigner ce champ';
const ERROR_COMMENT_TO_SHORT = 'Le commentaire est trop court';



//Si le paramètre id n'existe pas
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

//On récupère l'id de l'article qu'on a dans l'url
$articleId = $_GET['id'];
$commentId = $_GET['id'];
//On va chercher dans la liste des articles, l'article qui correspond à l'id qu'on a dans l'url
$articleToShow = $articleRepository->findArticle($articleId);

//Si aucun article ne correspond dans la liste
if ($articleToShow === false) {
    header('Location: index.php');
}

$auteur = $userRepository->getById($articleToShow->getUserId());



$comment->setComment(htmlentities($_POST['comment']));

if (empty($comment->getComment())) {
    $errors['title'] = ERROR_COMMENT_REQUIRED;
} elseif (strlen($comment->getComment()) < 5) {
    $errors['title'] = ERROR_COMMENT_TO_SHORT;
}

if (empty($commentErreurs)) {
    if (!empty($_POST['comment'])) {
        $commentRepository->AddComment($comment, $user);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="/public/css/show-article.css">
    <title>Article</title>
</head>

<body>
<div class="container">
    <?php require_once 'includes/header.php' ?>
    <div class="content">
        <div class="article-container">
            <a class="article-back" href="/">Retour à la liste des articles</a>
            <div class="article-cover-img"
                 style="background-image:url(<?= $articleToShow->getImageFullPath() ?>)"></div>
            <h1 class="article-title"><?= $articleToShow->getTitle() ?></h1>
            <span>Rédigé par : <?= $auteur->getNom() . ' ' . $auteur->getPrenom() ?></span>
            <div class="separator"></div>
            <p class="article-content"><?= $articleToShow->getContent() ?></p>
            <?php if ($user !== false && ($auteur->getId() === $user->getId())): ?>
                <div class="action">
                    <a class="btn btn-secondary" href="/delete-article.php?id=<?= $articleId ?>">Supprimer</a>
                    <a class="btn btn-primary" href="/form-article.php?id=<?= $articleId ?>">Editer l'article</a>
                </div>
            <?php endif; ?>
            <form action="#" method="post">
                <div class="form-control">
                    <label for="comment">Commentaire</label>
                    <input type="text" name="comment" id="comment"
                           value=" <?= $comment->getComment() ?? ''?> ">

                </div>
                <div class="form-actions">
                    <a href="/" class="btn btn-secondary" type="button">Annuler</a>
                    <button class="btn btn-primary" type="submit">Ajouter un commentaire</button>
                </div>
                <div>
<!--                    <p class="article-title">--><?php //= $commentaireToShow->findCommentaire() ?><!--</p>-->
<!--                    <span>Commenté par : --><?php //= $auteur->getNom() . ' ' . $auteur->getPrenom() ?>
                </div>
            </form>
        </div>
    </div>
    <?php require_once 'includes/footer.php' ?>
</div>

</body>

</html>