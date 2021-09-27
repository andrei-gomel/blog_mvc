<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?= $title; ?></div>
            <div class="card-body">
            <table class="table table-striped">
                <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Редактировать</th>
                <th>Удалить</th>
                </tr>
                    
                <?php foreach ($vars as $item): ?>

                    <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><a href="/blog_mvc/www/admin/edit/<?= $item['id'] ?>" class="btn btn-primary btn-sm">Редактировать</a></td>
                    <td><a href="/blog_mvc/www/admin/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Удалить</a></td>
                    </tr>

                <?php endforeach; ?>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>