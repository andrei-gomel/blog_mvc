<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/blog_mvc/www/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/blog_mvc/www/public/styles/main.css" rel="stylesheet">
        <link href="/blog_mvc/www/public/styles/font-awesome.css" rel="stylesheet">
        <script src="/blog_mvc/www/public/scripts/jquery.js"></script>
        <script src="/blog_mvc/www/public/scripts/form.js"></script>
        <script src="/blog_mvc/www/public/scripts/popper.js"></script>
        <script src="/blog_mvc/www/public/scripts/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/blog_mvc/www/">Это мой блог</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/blog_mvc/www/about">Обо мне</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog_mvc/www/contact">Обратная связь</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?= $content; ?>
        <hr>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="https://www.youtube.com/user/Shift63770" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://vk.com/php.youtube" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-vk fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="/" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">&copy; 2021, IT-ZONE / it-zone.by</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>