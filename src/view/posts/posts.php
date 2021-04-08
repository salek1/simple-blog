<?php

    require '../../../vendor/autoload.php';
    include_once '../users/head.php';

    use blog\controller\PostController;
    use blog\helpers\DateFormat;

    $postController = new PostController();
    $allPosts = $postController->listaPosts();

?>

<?php if ($allPosts == null): ?>
    <section>
        <h3 class="alert-info p-3">Não temos posts ainda! :( </h3>
    </section>
<?php else: ?>
    <section>
        <h1 class="text-center">Ultimos Posts</h1>

        <?php foreach ($allPosts as $post): ?>
            <div class="card m-3 shadow pb-3">
                <div class="card-body ">
                    <a href="postContent.php?id=<?= $post->getId(); ?>"
                       class="stretched-link text-decoration-none text-body">
                        <h3 class="card-title"><?= $post->getTitle(); ?></h3>
                    </a>
                    <p>Autor: <?= $post->getUser() ?></p>
                    <p class="card-text">
                        Publicado em:
                        <?= DateFormat::brazil_date($post->getCreationDate());?>
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
<?php endif;?>

<?php include_once '../users/bottom.php'; ?>