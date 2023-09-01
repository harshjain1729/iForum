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
    <?php include '../fix/dbconnection.php';?>
    <?php
    include '../fix/header.php';?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * from `thread` where thread_id = $id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $threadtitle = $row['thread_title'];
        $threaddesc = $row['thread_desc'];
    }
    ?>
    <div class="container">
        <br>
        <hr>
        <h1>
            <?php
            echo $threadtitle;
            ?>
        </h1>
        <p>
            <?php
            echo $threaddesc;
            ?>
        </p>
        <hr>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group">
                <label for="comment">Add your comment</label>
                <textarea class="form-control" id="comment" rows="4" name="comments">Post Your Comment Here</textarea>
            </div>
            <button type="submit" class="btn btn-success">Comment Here</button>
        </form>
        <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment = $_POST['comments'];
            $sql1 = "INSERT INTO `comment` (`comment_th_id`, `comment_desc`) VALUES ('$id', '$comment');";
            $result1 = mysqli_query($conn, $sql1);
        }
        ?>
        <br>
        <hr>
        <h2>
            Discussion!
        </h2>
        <br>
        <?php
        $sql2 = "SELECT * from `comment` where comment_th_id=$id";
        $result2 = mysqli_query($conn,$sql2);
        while($row = mysqli_fetch_assoc($result2)){
            $sol = $row['comment_desc'];
            $tm = $row['Time'];
            echo "<b>Posted By an anonymus user</b><br>";
            echo $sol;
            echo '<br>';
            echo '<hr>';
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