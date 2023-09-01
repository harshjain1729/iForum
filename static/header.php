<?php
include "fix/signupmodal.php";
// echo var_dump($_SESSION['status']);
include "fix/loginmodal.php";
// echo var_dump($_SESSION['status']);

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">iforum</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="../php/index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../php/about.php">About<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../php/contact.php" tabindex="-1">Contact</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>';
    if(!$_SESSION['status']){
        echo '<button class="btn btn-outline-success ml-2"  data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="btn btn-outline-success mx-2"   data-toggle="modal" data-target="#signupModal">Signup</button>';
    }
    else{
        echo '<div class = "text-light my-2 ml-2">'.$_SESSION['username'].'</div>
        <a href = "../php/Logout.php"><button class="btn btn-outline-success mx-2">Logout</button></a>';
    }
echo '</div>
</nav>';
?>