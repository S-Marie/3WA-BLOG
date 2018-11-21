<?php

    if(!array_key_exists('id', $_GET) || !ctype_digit($_GET['id']))
    {
        header('Location: index.php');
        exit();
    }

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
		INNER JOIN Author ON Post.Id = Author.Id
		WHERE Post.Id = ?
		ORDER BY CreationTimestamp DESC'
);

$query->execute(array($_GET['id']));
$showPosts = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->prepare(
    '
        SELECT
            NickName,
            Contents,
            CreationTimestamp
        FROM
            Comment
        WHERE
            Post_Id = ?
    ');
    
   $query->execute([$_GET['id']]);
   $comments = $query->fetchAll(PDO::FETCH_ASSOC);

$template = 'show_post';
include 'layout.phtml';
?>