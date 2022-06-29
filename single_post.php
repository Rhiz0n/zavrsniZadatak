<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Post Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="styles/styles.css" rel="stylesheet">

</head>

    <body>

        <?php include 'header.php' ?>
        <?php include 'dataBase.php' ?>
            <div>
                <main>
                    
                    <?php

                        if (isset($_GET['id'])) {

                            $sql = "SELECT * FROM posts WHERE id = {$_GET['id']}";

                            $statement = $connection->prepare($sql);
                            $statement->execute();
                            $statement->setFetchMode(PDO::FETCH_ASSOC);
                            $singlePost = $statement->fetch();
                            
                            $sql = "SELECT * FROM comments WHERE post_id =  {$_GET['id']}";
                            $statement = $connection->prepare($sql);
                            $statement->execute();
                            $statement->setFetchMode(PDO::FETCH_ASSOC);
                            $comments = $statement->fetchAll();

                    ?>
                    
            <article>
                    
                <header>

                    <h1><?php echo ($singlePost['title']) ?></h1>
                    <div><?php echo ($singlePost['created_at']) ?> by <?php echo ($singlePost['author']) ?></div>

                </header>

                    <div>
                        <p><?php echo $singlePost['body'] ?></p>
                    </div>
            </article>

            <div>
                <strong><p>Comments<p></strong>
                    <ul>
                        <?php foreach ($comments as $comment) { ?>
                            
                            <li>
                                <strong><div><?php echo ($comment['author']) ?></div></strong>
                                <div><?php echo ($comment['text']) ?></div>
                                <hr>
                            </li>

                        <?php } ?>
                </ul>
            </div>
                    <?php
                    } 
                    ?>

                </main>
            </div>


        <?php include 'side_bar.php' ?>
        <?php include 'footer.php' ?>

    </body>


</html>