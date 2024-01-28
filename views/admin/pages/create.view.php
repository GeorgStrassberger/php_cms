<h1>Eine neue Seite anlegen</h1>
<hr>
<a href=".?route=admin/page">Seiten Verwalten</a>
<hr>

<?php if (!empty($error)) : ?>
    <p><?php echo e($error); ?></p>
<?php endif; ?>

<form action="./?route=admin/page/create" method="POST">

    <label for="pages-create-title">Titel:</label><br>
    <input id="pages-create-title" type="text" name="title" value="<?php if (!empty($_POST['title'])) echo e($_POST['title']); ?>"><br>

    <label for="pages-create-slug">Slug:</label><br>
    <input id="pages-create-slug" type="text" name="slug" value="<?php if (!empty($_POST['slug'])) echo e($_POST['slug']); ?>"><br>

    <label for="pages-create-content">Content:</label><br>
    <textarea id="pages-create-content" name="content" cols="30" rows="10"><?php if (!empty($_POST['content'])) echo e($_POST['content']); ?></textarea><br>

    <input type="submit" value="Abschicken!">
</form>