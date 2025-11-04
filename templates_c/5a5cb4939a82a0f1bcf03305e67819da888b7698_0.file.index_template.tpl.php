<?php
/* Smarty version 4.3.4, created on 2025-10-14 20:03:25
  from 'C:\xampp\htdocs\LAB4\php\templates\index_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68ee906d1f0d32_47386145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a5cb4939a82a0f1bcf03305e67819da888b7698' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB4\\php\\templates\\index_template.tpl',
      1 => 1760465002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ee906d1f0d32_47386145 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/style_index.css">
    <title>Forum LAB3</title>
</head>

<body>
   <header>
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LAB3 FORUM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index_template.tpl">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/login_template.html">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">post blog</a>
                </li>
                <li class="nav-item ms-auto">
                    <span class="navbar-text">Bem-vindo, User</span>
                </li>
            </ul>
            </div>
        </div>
    </nav>

   </header>
    <section id="section-grid">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/imagem 1.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../images/imagem 2.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../images/imagem 3.jpg" class="d-block w-100">
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

        <div class="col-3">
            <ul class="list-group">
            <li class="list-group-item active">User</li>
            <li class="list-group-item">Created: 30/09/2025</li>
            <li class="list-group-item">Updated: 10/10/2030</li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Update blog</a></li>
            </ul>
        </div>
        <div class="posts">
           <div id="placeholder_1">
              <p class="menu1">Menu 1</p>
              <p class="elementos_direita">Menu 2</p>
              <p class="elementos_direita">Menu 3</p>
              <p class="elementos_direita">Welcome</p>
          </div>
          <div id="placeholder_2">
              <h2>Posts</h2>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                <div class="post">
                     <div class="bar">
                        <p>User: <?php echo $_smarty_tpl->tpl_vars['post']->value['user_name'];?>
</p>
                        <p>Created: <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>
</p>
                        <p class="update">Updated: <?php echo $_smarty_tpl->tpl_vars['post']->value['updated_at'];?>
</p>
                     </div>
                        <div class="content">
                            
                            <p><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
</p>
                            
                        </div>   
                    <hr>    
                </div>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
             

          </div>
        </div>
    
    </section>
   
</body>
</html><?php }
}
