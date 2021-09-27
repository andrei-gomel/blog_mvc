<header class="masthead" style="background-image: url('public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>IT-ZONE - Зона IT</h1>
                    <span class="subheading">простой блог на php - oop - mvc</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($vars)): ?>
                <p>Список постов пуст</p>
            <?php else: ?>
                <?php foreach ($vars as $val): ?>
                    <div class="post-preview">
                        <a href="/blog_mvc/www/post/<?= $val['id']; ?>">
                            <h2 class="post-title"><?= $val['name'] ?></h2>
                            </a>    
                            <h5 class="post-subtitle"><?= $val['description'] ?></h5>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="clearfix">
                    <?php //echo $pagination; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

