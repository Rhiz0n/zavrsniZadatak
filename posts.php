<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Page</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="styles/styles.css" rel="stylesheet">
    
</head>

    <body>

        <?php include 'header.php' ?>
        <?php include 'dataBase.php' ?>

            <?php

            $sql = "SELECT * FROM posts ORDER BY created_at DESC";

            $statement = $connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();

            ?>
            
            <?php foreach ($posts as $post) {?>

                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="single_post.php?id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h2>
                    <p class="blog-post-meta"><?php echo($post['created_at']) ?> by <?php echo($post['author']) ?></p>
                
                    <p><?php echo($post['body']) ?> </p>
                </div>
            <?php
            }
            ?>
        <?php include 'side_bar.php' ?>
        <?php include 'footer.php' ?>

    </body>


</html>