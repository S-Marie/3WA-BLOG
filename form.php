<?php

include 'sql/bdd_connection.php';

$pseudo = $_POST['pseudo'];
$comment = $_POST['comments'];
$id = $_POST['postId'];

$query = $pdo->prepare
(
	 'INSERT INTO
	 	Comment
	 	(Nickname, Contents, CreationTimestamp, Post_Id)

	  VALUES
	  	(?, ?,NOW(), ?)'
	);

$query->execute(array($pseudo, $comment, $id));


header('Location: show_post.php?id='.$id);
exit();

?>