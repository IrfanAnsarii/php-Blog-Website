<?php require '../includes/header.php'?>
<?php //require_once '../config/config.php'?>

<?php

if ( isset( $_GET[ 'upd_id' ] ) ) {
    $id = $_GET[ 'upd_id' ];

    //1st way
    $select = $conn->query( "SELECT * FROM posts WHERE id ='$id' " );
    $select->execute();
    $rows = $select->fetch( PDO::FETCH_OBJ );

    //2nd way
    if ( isset( $_POST[ 'submit' ] ) ) {

        if ( $_POST[ 'title' ] == '' or $_POST[ 'subtitle' ] == '' or $_POST[ 'body' ] == ''){
            echo 'one input or more are empty';
        } else {


          unlink("images/" . $rows->img. "");


            $title = $_POST[ 'title' ];
            $subtitle = $_POST[ 'subtitle' ];
            $body = $_POST[ 'body' ];
            $img = $_FILES[ 'img' ][ 'name' ];
            $dir = 'images/' . basename( $img );

            $update = $conn->prepare( "UPDATE posts SET title = :title, subtitle=:subtitle, 
            body=:body, img = :img WHERE id = '$id' " );

            $update->execute( [
                'title'=>$title,
                'subtitle'=>$subtitle,
                'body'=>$body,
                'img'=>$img

            ] );
            
            if ( move_uploaded_file( $_FILES[ 'img' ][ 'tmp_name' ], $dir ) ) {
                    header( 'location: http://localhost/blog/index.php' );
                }
            
            
            //header( 'location: http://localhost/blog/index.php' );
        }
    }
}

?>

<form method = 'POST' action = "update.php?upd_id= <?php echo $id; ?>" enctype="multipart/form-data" >
<!-- Email input -->
<div class = 'form-outline mb-4'>
<input type = 'text' name = 'title' value = "<?php echo $rows->title; ?>" id = 'form2Example1' class = 'form-control' placeholder = 'title' />

</div>

<div class = 'form-outline mb-4'>
<input type = 'text' name = 'subtitle' value = "<?php echo $rows->subtitle; ?>"  id = 'form2Example1' class = 'form-control' placeholder = 'subtitle' />
</div>

<div class = 'form-outline mb-4'>
<textarea type = 'text' name = 'body'  id = 'form2Example1' class = 'form-control' placeholder = 'body' > <?php echo $rows->body;
?></textarea>
</div>

<?php echo "<img src='images/".$rows->img."' width='400' height='200' />"; ?>

<div class = 'form-outline mb-4'>
<input type = 'file' name = 'img' id = 'form2Example1' class = 'form-control' placeholder = 'image' />
</div>

<!-- Submit button -->
<button type = 'submit' name = 'submit' class = 'btn btn-primary  mb-4 text-center'>Update</button>

</form>

<?php require '../includes/footer.php'?>
