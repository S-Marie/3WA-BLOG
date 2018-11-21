<?php
include 'sql/bdd_connection.php';

$query = $pdo->prepare
(
     'SELECT
     	Title,
     	Post.Id, 
     	Contents, 
     	CreationTimestamp,
     	FirstName,
     	LastName
		FROM Post
		INNER JOIN Author 
		ON Post.Author_Id = Author.Id
		ORDER BY CreationTimestamp DESC'		
);

$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

$template = 'index';
include 'layout.phtml';

?>


