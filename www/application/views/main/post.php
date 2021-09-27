<header class="masthead" style="background-image: url('/blog_mvc/www/public/post_img/<?= $vars['id']; ?>.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?= $vars['name'] ?></h1>
                    <span class="subheading"><?= $vars['description'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?= $vars['posttext'] ?></p>
        </div>
    </div>
</div>