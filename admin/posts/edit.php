<?php
include '../../app/controllers/posts.php';
?>

<?php include '../../app/include/head.php'; ?>

<body>
<?php include '../../app/include/header.php'; ?>


<main class="main">

    <div class="container-md">
        <div class="admin__wrapper">
            <?php include '../../app/include/sidebar-admin.php'; ?>

            <section class="admin__posts">
                <h2 class="admin__main-title">Редактирование записи</h2>
                <?php include '../../app/helpers/error-info.php'; ?>
                <form action="edit.php" method="post" enctype="multipart/form-data" class="admin__form">
                    <input name="id" value="<?= $id ?>" type="hidden">
                    <div class="admin__form-control admin__form-control--line">
                        <label for="post-title">Название статьи</label>
                        <input type="text" id="post-title" name="post-title" placeholder="Название статьи"
                               value="<?= $title ?>">
                    </div>
                    <div class="admin__form-control">
                        <label for="editor">Содержимое статьи</label>
                        <textarea name="post-text" id="editor" cols="100" rows="10" placeholder="Текст статьи"
                                  class="editor"><?= $text ?></textarea>
                    </div>
                    <div class="admin__form-control admin__form-control--line">
                        <label for="post-image">Выберите обложку для статьи</label>
                        <input type="file" name="post-image" id="post-image">
                    </div>
                    <div class="admin__form-control admin__form-control--line">
                        <div>
                            <label for="post-topics">Категория</label>
                            <select name="post-topics" id="post-topics">
                                <?php foreach ($topics as $key => $top): ?>
                                    <option value="<?= $top['id'] ?>" <?php if ($top['id'] === $topic): ?> selected <?php endif; ?>>
                                        <?= $top['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <?php if (empty($publish) || $publish === 0): ?>
                                <input type="checkbox" name="publish" id="publish">
                                <label for="publish">Опубликовать</label>
                            <?php else: ?>
                                <input type="checkbox" name="publish" id="publish" value="1" checked>
                                <label for="publish">Опубликовать</label>
                            <?php endif; ?>
                        </div>
                    </div>
                        <button type="submit" name="edit-post" class="admin__form-save-btn"
                        >Сохранить</button>
                </form>

            </section>
        </div>
    </div>
</main>


<?php include '../../app/include/footer.php'; ?>

<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script src="../../assets/js/script.js"></script>
</body>

</html>