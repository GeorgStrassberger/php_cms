<h1>Admin: Seiten verwalten</h1>

<?php if (!empty($pages)) : ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Titel</th>
                <th>Aktionen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page) : ?>
                <tr>
                    <td><?php echo e($page->id); ?></td>
                    <td><?php echo e($page->slug); ?></td>
                    <td><?php echo e($page->title); ?></td>
                    <td>Aktionen ...</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Es wurden noch keine Seiten angelegt.</p>
<?php endif; ?>