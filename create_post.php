<?php
    
    include ('dataBase.php');

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];
        if(empty($title) || empty($body) || empty($author)) {
            echo("Sva polja moraju biti popunjena!");
    
        } else {
            $currentDate = date("Y-m-d h:i");
            $sql = "INSERT INTO posts (title, body, author, created_at)
            VALUES ('$title', '$body', '$author', '$currentDate')";

            $statement = $connection->prepare($sql);
            $statement->execute();
            header("Location:./index.php");
            echo ("Upisi u bazu");
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Create New Post</title>

    <link rel="stylesheet" href="css/styles.css">
</head>


<body class="va-l-page va-l-page--homepage">

    <?php
    include('header.php');
    ?>
    <div class="blog-post">

        <h1 class="blog-post-title"> Create new post </h1>

        <form action="create_post.php" method="POST">

            <ul>

                <li>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter title">
                </li>

                <li>
                    <label for="body">Body</label>
                    <textarea name="body" placeholder="Enter content/text" rows="10"></textarea><br>
                </li>

                <li>
                    <label for="author">Author</label>
                    <textarea name="author" placeholder="Enter your name" rows="1"></textarea><br>
                </li>

                <li>
                    <button type="submit" name="submit">Submit</button>
                </li>

            </ul>

        </form>

    </div>

        <?php
            include ('side_bar.php');
            include('footer.php');
        ?>

    </html>