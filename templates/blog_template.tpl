<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postar blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/css/style_blog.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navBar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog_template.html">post blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <section class="section">
        <form action="{$action}" method="post" class="form-flex">
            <div class="textbox">
                <textarea name="content" id="textarea" rows="7" cols="50">{$blog}
                </textarea>
            </div>
            {if isset($micropost_id)}
                <input type="hidden" name="micropost_id" value="{$micropost_id}">
            {/if}
            <div class="buttons">
                
                <input id="Go" type="submit" value="Go">   
                <input id="Cancel" type="button" value="Cancel" onclick="document.location.href='index.php'">
            </div>
        </form>
    </section>
    
</body>


</html>