<?php
/* if(isset($_GET['delete'])){
   
        require("conn.php");
        $delete =(int)$_GET['delete'];
        
    $sql3= "DELETE FROM comments WHERE comment_id = {$delete}";
    mysqli_query($conn, $sql3);
    
    
    };
    
    
    header("Location: post.php"); */





 /*    require("conn.php");

if(isset($_GET['comment_id'])){
    
    $comment_id =$_GET['comment_id'];
    $delete=mysqli_query($conn, "DELETE FROM comments WHERE comment_id = {$comment_id}");
    header("Location: post.php");
    die();


} */






require ("conn.php");
/* require ("post.php"); */
if(isset($_POST['delete'])){
    /*  global $conn;
     global $row2; */
     /* $comment_id = $row2['comment_id'];
         $post_id = $row2['post_id'];    
         $comment = $row2['comment']; */   
         
        /* echo $id = $_GET["id"]; */
         $id = $_GET["id"];
    
        $sql3= "DELETE FROM comments WHERE comment_id = 178";
        $result5=mysqli_query($conn, $sql3);
        


       /*  if($row2==null){
            include("post.php");
        }; */
    }; 

    /* header("Location: post.php"); */



 /* $delete = $_POST['delete'];
    $comment = $_POST['comment'];
        $name = $_POST['name'];  
        $commentid= $_POST['id']; */
?>
