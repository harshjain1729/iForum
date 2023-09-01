<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>iForum</title>
</head>

<body>
    <!-- navbar -->
    <?php include '../fix/dbconnection.php';?>
    <?php
    include '../fix/header.php';?>
    <?php 
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>
    <div class="container">
        <h1>
            <?php echo "Welcome to ". $catname ." forums";?>
        </h1>
        <p>
            <?php echo $catdesc;?>
        </p>
        <hr>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp"
                    placeholder="Enter query" name="title">
                <small id="title" class="form-text text-muted">Keep title small and crsip!</small>
            </div>
            <div class="form-group">
                <label for="description">Elaborate your concern</label>
                <input type="text" class="form-control" id="description" placeholder="Elaborate Here"
                    name="description">
            </div>
            <button type="submit" class="btn btn-success">Post Your Query</button>
        </form>
        <hr>
        <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $sql1 = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`) VALUES ('$title', '$description', '$id')";
            $result1 = mysqli_query($conn, $sql1);
        }
        ?>
        <!-- <hr> -->
        <?php 
        $sql2 = "SELECT * FROM `thread` WHERE thread_cat_id=$id";
        $result2 = mysqli_query($conn, $sql2);
        $ques = false;
        while($row = mysqli_fetch_assoc($result2)){
            $ques = true;
            $threadid = $row['thread_id'];
            $threadtitle = $row['thread_title'];
            $threaddesc = $row['thread_desc'];
            echo '<h3>Q.<a href="thread.php?threadid='.$threadid.'">'. $threadtitle.'</a></h3>';
            echo '<p>'.$threaddesc.'</p>';
        }
        if(!$ques){
            echo '<h1> Be First To Post a query!! </h1>';
        }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>