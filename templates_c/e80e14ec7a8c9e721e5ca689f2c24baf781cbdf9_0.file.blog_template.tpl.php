<?php
/* Smarty version 4.3.4, created on 2025-10-28 22:32:25
  from 'C:\xampp\htdocs\LAB7\templates\blog_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_69013669ab3e25_64445060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e80e14ec7a8c9e721e5ca689f2c24baf781cbdf9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB7\\templates\\blog_template.tpl',
      1 => 1761687140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69013669ab3e25_64445060 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postar blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
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
        <form action="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" method="post" class="form-flex">
            <div class="textbox">
                <textarea name="content" id="textarea" rows="7" cols="50"><?php echo $_smarty_tpl->tpl_vars['blog']->value;?>
</textarea>
            </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['micropost_id']->value))) {?>
                <input type="hidden" name="micropost_id" value="<?php echo $_smarty_tpl->tpl_vars['micropost_id']->value;?>
">
            <?php }?>
            <div class="buttons">
                
                <input id="Go" type="submit" value="Go">   
                <input id="Cancel" type="button" value="Cancel" onclick="document.location.href='index.php'">
            </div>
        </form>
    </section>
    
</body>


</html><?php }
}
