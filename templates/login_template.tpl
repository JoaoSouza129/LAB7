<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/css/style_register.css">
    <title>Login</title>
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
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>

    <h2 class="text-center">LOGIN</h2>
    <form class="form_container" action="login_action.php" method="post">
        {if $message ne ''}
            <div class="alert alert-danger text-center">{$message}</div>
        {/if}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value={$email}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            <input type="checkbox" onclick="showPassword()">Show Password
        </div>
        <button type="submit" class="btn btn-primary" name="button">Submit</button>
        
        <label for="createAccount" class="form-label">If you don´t have an account <a href="register.php">Click here</a></label> <br>
        <input type="checkbox" name="rememberME" value="1"> Remeber me <br>
        <a>Forgot password</a>
    </form>
	
	<script>
		  function showPassword() {
			var pass1 = document.getElementById("exampleInputPassword1");

			if (pass1.type === "password") {
				pass1.type = "text"
			} else {
				pass1.type = "password"
			}
		}
	
	</script>
</body>
</html>