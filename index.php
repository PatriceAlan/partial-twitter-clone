<?php require_once "header.php"; ?>

<body>

<?php
    if(isset($_POST['btn_add_post']))
    {
        $Post_Text = $_POST['post_text'];

        if ($Post_Text != ""){

            $sql = "INSERT INTO posts (post_text, post_date) VALUES('$Post_Text', NOW())";
            $result = mysqli_query($conn, $sql);

            // if ($result) {
            //     echo "Post added successfully";
            // } else {
            //     echo "Error: " . mysqli_error($conn);
            // }
        }
    }
    ?>

    <div class="grid-container">

        <?php require_once "left-sidebar.php"; ?>

            <div class="main">
                <p class="page__title">Home</p>

                <div class="sit__box sit__add">
                    <div class="sit__left">
                        <img src="images/avatar.png" alt="">
                    </div>

                    <div class="sit__body">
                        <form action="" method="post">
                            <textarea name="post_text" cols="100" rows="3" placeholder="What's happening?"></textarea>
                            <div class="sit__icons-wrapper">
                                <div class="sit__icons-add">
                                    <i class="far fa-image"></i>
                                    <i class="far fa-chart-bar"></i>
                                    <i class="far fa-smile"></i>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            
                            <button class="button__sit" type="submit" name="btn_add_post">
                                Sit
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
        
        
                <?php require_once "sit.php"; ?>
            
        </div>
    

<?php require_once "right-sidebar.php"; ?>    

</div>
    
<?php 

if(isset($_GET['del']))
{
    $Del_ID = $_GET['del'];
    $sql = "DELETE FROM posts WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $Del_ID);
    $post_query = mysqli_stmt_execute($stmt);

    if($post_query)
    {
        header("Location: index.php");
        exit;
    }
}

?>    



</body>

</html>
