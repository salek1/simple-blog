<?php

require '../../vendor/autoload.php';
include_once 'head.php';

use blog\controller\PostController;

    $posts = new PostController();

?>

<section>
    <h1 class="text-center">Seus posts</h1>

    <?php foreach ($posts->listaPosts() as $post): ?>
        <div class="card m-3 shadow pb-3">
            <div class="card-body ">
                <a href="#" class="stretched-link text-decoration-none text-body"><h3 class="card-title"><?= $post->getTitle(); ?></h3></a>
                <p class="card-text">
                    Publicado em:
                    <?= $post->getCreationDate(); ?>
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

<?php include_once 'bottom.php'; ?>