<?php

include 'sql/bdd_connection.php';

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$category = $_POST['category'];

$query = $pdo->prepare
(
	 'INSERT INTO
	 	Post
	 	(Title, Contents, CreationTimestamp, Author_Id, Category_Id)

	  VALUES
	  	(?, ?, NOW(), ?, ?)'
	);

$query->execute(array($title, $content, $author, $category));


header('Location: nouveau.php');
exit();

?>