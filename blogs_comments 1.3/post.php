<?php
include("conn.php");


$id = $_GET["id"];


$query = "SELECT title, lead, body, cover, blogs.created_at, users.name  FROM BLOGS INNER JOIN users ON users.id = blogs.user_id  WHERE blogs.id = ".$id." ORDER BY created_at DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if( $row==null){
include("404.php");
exit;
}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.php">Sample Post</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('images/<?php print $row['cover'];?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php print $row['title'];   ?></h1>
                            <h2 class="subheading"><?php print $row['lead'];?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php print $row['name'];?></a>
                                on <?php print $row['created_at'];?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                      <?php print $row['body'];?>
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    <form method="POST" enctype="multipart/form-data"  > 
                    <h5 class="mt-5 mb-5">Add your comment</h5>  
                    <div class=" mt-5 input-group" >
                       
                        <span class="input-group-text">Comment</span>
                        <textarea class="form-control" aria-label="With textarea" id="comment" name="comment"></textarea>
                        <span class="input-group-text">Name</span>
                        <textarea class="form-control" aria-label="With textarea" id="name" name="name"></textarea>
                        <input class="btn btn-primary" type="submit" value="Submit" id="rendben" name="rendben">
                        <!-- <button class="btn btn-outline-secondary" type="button" id="rendben" name="rendben">Küldés</button> -->
                    </div>
                    </form> 
                    </div>
                    
                   <?php
                   

if(isset($_POST['rendben'])){
    require("conn.php");
    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $id = $_GET['id'];

        $sql = "INSERT INTO comments (comment, name, post_id) VALUES ('{$comment}', '{$name}', '{$id}') ";
    
       $result2=mysqli_query($conn, $sql);
    
    
}

$sql2 = "SELECT * FROM comments WHERE post_id = ".$id."";
$result3 = mysqli_query($conn, $sql2);

while(  $row2 = mysqli_fetch_assoc($result3)){


   
        print    " <div class='col-md-10 col-lg-8 col-xl-7 mb-5 mt-5'>";
        print    " <form method='POST'>";
        print    "<textarea class='form-control' aria-label='With textarea'>";
        print       $row2['comment'];
        print    "</textarea>";
        print    "<span class='input-group-text'>Name</span><textarea class='form-control' aria-label='With textarea'> ";
        print        $row2['name'];
        print    "</textarea>";
        /* print    "</form>";
        print    " <form method='POST'>"; */
        /* print    "<button type='submit' class='btn btn-danger w-100 mt-3' id='delete' name='delete'><a href='post.php?comment_id={$row2['comment_id']}'>Delete</a></button>"; */
        print    "<button type='submit' class='btn btn-danger w-100 mt-3' id='delete' name='delete'  value='".$row2['comment_id']."' onclick=".delete($conn).">Delete</button>";
        /* print    "<button type='button' class='btn btn-danger w-100 mt-3' id='delete' name='delete'><a href='post.php?comment_id={$row2['comment_id']}'>Delete</a></button>"; */
      
       /*  print    "<button type='button' class='btn btn-danger w-100 mt-3' id='delete' name='delete'><a href='delete.php?comment_id={$row2['comment_id']}'>Delete</a></button>"; */
       print    "</form>";
        print    " </div>";
       
        };




   
       





/*HA onclickre hívom meg a függvényt--------------------- */


        
        function delete($conn){
    
       if(isset($_POST['delete'])){
        global $conn;
        global $row2;
        $comment_id = $row2['comment_id'];
            $post_id = $row2['post_id'];    
            $comment = $row2['comment'];   
            $id = $_GET['id'];
           
       $sql3= "DELETE FROM comments WHERE comment_id = {$comment_id}";
       $result5=mysqli_query($conn, $sql3);
    
       }; 
      
  
   
        };


        /* function delete($conn){
    
       if(true){
        global $conn;
        global $row2;
        $comment_id = $row2['comment_id'];
            $post_id = $row2['post_id'];    
            $comment = $row2['comment'];   
            $id = $_GET['id'];
           
       $sql3= "DELETE FROM comments WHERE post_id = {$id} and comment_id = comment_id";
       $result5=mysqli_query($conn, $sql3);
    
       }; 
      
  
   
        }; */










/*ONCLICK -re függvény vége------------------------------- */    

/* while(  $row3 = mysqli_fetch_assoc($result4)){

    print    " <div class='col-md-10 col-lg-8 col-xl-7 mb-5 mt-5'>";
    print    "<textarea class='form-control' aria-label='With textarea'>";
    print       $row3['comment'];
    print    "</textarea>";
    print    "<span class='input-group-text'>Name</span><textarea class='form-control' aria-label='With textarea'> ";
    print        $row3['name'];
    print    "</textarea>";
    print    "<button type='button' class='btn btn-danger w-100 mt-3' id='delete' name='delete'>Delete</button>";
    print    " </div>";


};

 */
                   ?>
                   <!-- <button type='button' class='btn btn-danger w-100 mt-3' id='delete' name='delete'>Delete</button> -->        
                </div>
            </div>
        </article>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
