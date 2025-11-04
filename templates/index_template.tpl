<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="styles/css/style_index.css">
    <title>Forum LAB3</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <p class="navbar-brand" >LAB3 FORUM</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        {if !isset($username)}
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item ms-auto">
                                <p class="navbar-text">Bem-vindo</p>
                            </li>

                        {else}
                            <li class="nav-item">
                                <a class="nav-link" href="blog.php">Post Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout_action.php">Logout</a>
                            </li>
                            <li class="nav-item ms-auto">
                                <p class="navbar-text">Bem-vindo, {$username}</p>
                            </li>
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    {if isset($message)}
        <div class="alert alert-danger text-center">{$message}</div>
    {/if}
    <section id="section-grid">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/imagem 1.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/imagem 2.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/imagem 3.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="posts">
            <div id="placeholder_1">
                <p class="menu1">Menu 1</p>
                <p class="elementos_direita">Menu 2</p>
                <p class="elementos_direita">Menu 3</p>
                <p class="elementos_direita">Welcome</p>
            </div>
            
                <div id="placeholder_2">
                    <h2 class="text">Posts</h2>
                    
                    {foreach $posts as $post}
                        {if $post.user_id==$userid}
                           <div class="post">
                                <span class="col-3">
                                    <ul class="list-group">
                                        <li class="list-group-item active">{$username}</li>
                                        <li class="list-group-item">Created:{$post.created_at}</li>
                                        <li class="list-group-item">Updated:{$post.updated_at}</li>
                                        <li class="list-group-item"><a href="blog.php?micropost_id={$post.id}" class="text-decoration-none">Update blog</a></li>
                                    </ul>
                                </span>

                                <div class="content">
                                    <p><b>{$post.content}</b></p>
                                </div>
                                <hr>
                           </div>

                        {else}
                            <div class="post">
                                <span class="col-3">
                                    <ul class="list-group">
                                        <li class="list-group-item active">{$post.user_name}</li>
                                        <li class="list-group-item">Created:{$post.created_at}</li>
                                        <li class="list-group-item">Updated:{$post.updated_at}</li>
                                    </ul>
                                </span>

                                <div class="content">
                                    <p><b>{$post.content}</b></p>
                                </div>
                                <hr>
                            </div>
                        {/if}

                    {/foreach}
                </div>
            
        </div>

    </section>

</body>

</html>