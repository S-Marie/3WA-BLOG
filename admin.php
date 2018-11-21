<?php

include 'sql/bdd_connection.php';

$query = $pdo->prepare
(
     'SELECT
      	Post.Id,
     	Title, 
     	Contents, 
     	FirstName,
     	Name
		FROM Post
		INNER JOIN Author 
		ON Post.Author_Id = Author.Id
		INNER JOIN Category
		ON Post.Category_Id = Category.Id
		ORDER BY CreationTimestamp DESC'		
);

$query->execute();
$allposts = $query->fetchAll(PDO::FETCH_ASSOC);

$template = 'admin';
include 'layout.phtml';
?>