<?php

    require '../../../vendor/autoload.php';
    include_once '../users/head.php';

    use blog\controller\PostController;
    use \blog\helpers\DateFormat;

    $postController = new PostController;
    $id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_STRING);

    $postById = $postController->findPostById($id);

?>

<section>
    <div class="d-flex" id="content-top">
        <h1 class="text-center py-5">
            <?= $postById->getTitle(); ?>
        </h1>
        <div class="container-fluid d-flex bg-dark rounded text-white mb-4 px-4 py-2 justify-content-center">
            <p>
                Publicado por:
                <?= $postById->getUser(); ?>
            </p>
            <p>
                Data de publicação:
                <?= DateFormat::brazil_date($postById->getCreationDate()); ?>
            </p>
            <p>
                Atualizado em:
                <?= DateFormat::brazil_date($postById->getUpdateDate()); ?>
            </p>
        </div>
    </div>
    <article>
        <p>
            <?= $postById->getContent(); ?>
        </p>
    </article>
</section>

<?php include_once '../users/bottom.php';?>
