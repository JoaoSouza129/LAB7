<?php

$hostname = "localhost";
$db_name = "db_name";
$db_user = "db_user";
$db_passwd = "db_password";

// mostra uma mensagem de erro vinda do mysql
function showerror($db)
{
	// If $db is a mysqli object/resource
	if ($db) {
		die("MySQL Error " . mysqli_errno($db) . " : " . mysqli_error($db));
	}
	// fallback
	die("MySQL Error: unknown error");
} 


// faz uma conexão a uma base de dados

function dbconnect($hostname,$db_name,$db_user,$db_passwd){
		// Enable mysqli exceptions so we get more useful stack traces
		if (function_exists('mysqli_report')) {
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		}

		// try to connect and return mysqli object
		try {
			$db = mysqli_connect($hostname, $db_user, $db_passwd, $db_name);
			// set charset
			if ($db) {
				mysqli_set_charset($db, 'utf8mb4');
			}
			return $db;
		} catch (Throwable $e) {
			// Provide a clear error message for debugging in development
			// Do NOT expose detailed errors in production
			die("Database connection error: " . $e->getMessage());
		}
}


?>
