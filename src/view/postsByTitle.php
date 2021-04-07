<?php
    require_once '../../vendor/autoload.php';
    include_once 'head.php';

    use \blog\controller\PostController;

    $postController = new PostController();
    $title = $_GET['title'];
    $postByTitle = $postController->findPostByTitle($title);

?>

<?php if ($postByTitle != null): ?>

<section>
    <?php foreach ($postByTitle as $post): ?>
    <div class="card m-3 shadow pb-3">
        <div class="card-body ">
            <a href="#" class="stretched-link text-decoration-none text-body">
                <h3 class="card-title"><?= $post->getTitle(); ?></h3>
            </a>
            <p>Autor: <?= $post->getUser() ?></p>
            <p class="card-text">
                Publicado em:
                <?= $post->getCreationDate();?>
            </p>
            <p class="card-text">
                <?= // Limita a quantidade de caracteres que aparecem no conteúdo do post
                strlen($post->getContent()) > 300 ?
                    substr($post->getContent(), 0, 300) . '...' : $post->getContent();
                ?>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
</section>

<?php
    else:
        header('location: posts.php');
    endif;
?>

<?php include_once 'bottom.php'; ?>