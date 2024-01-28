<h1>Seite editieren</h1>
<hr>
<a href=".?route=admin/page">Seiten Verwalten</a>
<hr>

<?php if (!empty($error)) : ?>
    <p><?php echo e($error); ?></p>
<?php endif; ?>


<form method="POST" action="./?route=admin/page/edit&id=<?php echo e($page->id); ?>">

    <label for="pages-create-title">Titel:</label><br>
    <input id="pages-create-title" type="text" name="title" value="<?php if (isset($_POST['title'])) {
                                                                        echo e($_POST['title']);
                                                                    } else {
                                                                        echo e($page->title);
                                                                    } ?>">
    <br>

    <label for="pages-create-content">Content:</label><br>
    <textarea id="pages-create-content" name="content" cols="30" rows="10"><?php if (isset($_POST['content'])) echo e($_POST['content']);
                                                                            else echo e($page->title); ?></textarea>
    <br>

    <input type="submit" value="Editieren!">
</form>