<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?= $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/blog_mvc/www/admin/edit/<?= $vars['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" value="<?= $vars['name'] ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="text" value="<?= $vars['description'] ?>" name="description">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3" name="posttext"><?= $vars['posttext'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input class="form-control" type="file" name="img">
                            </div>                            
                            <button type="submit" class="btn btn-primary btn-block" id="liveToastBtn">Сохранить</button>
                        </form>                        
                    </div>                    
                </div>                
            </div>
        </div>
    </div>
</div>
