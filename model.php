<?php

// get 
function get_posts($db)
{
  // Busca posts e nome do usuário usando JOIN
  $query  = "SELECT microposts.*, users.name AS user_name FROM microposts LEFT JOIN users ON microposts.user_id = users.id";

  if(!($result = @ mysqli_query($db, $query)))
   showerror($db);

  $nrows  = mysqli_num_rows($result);
  
  for($i=0; $i<$nrows; $i++) {
    $posts[$i] = mysqli_fetch_assoc($result);
  }

  // opcional: fechar a ligação à base de dados
  mysqli_close($db);

  return $posts;
}

function get_post_content($db,$id)
{
  // Busca posts e nome do usuário usando JOIN
  $query  = "SELECT content FROM microposts WHERE id='$id'";

  if(!($result = @ mysqli_query($db, $query)))
    showerror($db);

	$result_rows  = mysqli_num_rows($result);
  $row=mysqli_fetch_assoc($result);

  // opcional: fechar a ligação à base de dados
  mysqli_close($db);

  return $row['content'];
}
