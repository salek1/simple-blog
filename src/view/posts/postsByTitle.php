<?php
    require '../../../vendor/autoload.php';
    include_once '../users/head.php';

    use \blog\controller\PostController;

    $postController = new PostController();
    $title = $_GET['title'];
    $postByTitle = $postController->findPostByTitle($title);

?>

<?php if ($postByTitle[0] == "erro"): ?>
    <section>
        <h3 class="alert-info">Não foi possível encontrar o post na base de dados! :(</h3>
    </section>  
<?php elseif(!empty($postByTitle)): ?>

   <section>
    <?php foreach ($postByTitle as $post): ?>
    <div class="card m-3 shadow pb-3">
        <div class="card-body ">
            <a href="postContent.php?id=<?= $post->getId(); ?>"
               class="stretched-link text-decoration-none text-body">
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

<?php else:
        $postController->postView();
    endif;
?>

<?php include_once '../users/bottom.php'; ?>