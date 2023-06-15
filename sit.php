<?php 

$query = "SELECT * FROM posts ORDER BY post_id DESC";
$data = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($data)){

    $post_text = $row["post_text"];
    $post_date = $row["post_date"];

?>

<div class="sit__box">
    <div class="sit__left">
        <img src="images/avatar.png" alt="">
    </div>
    <div class="sit__body">
        <div class="sit__header">
            <div class="sit__name">Code Addict</div>
            <p class="sit__username">@CodeAddict</p>
            <p class="sit__date"><?php echo date('M d', strtotime($post_date)); ?></p>
        </div>

        <p class="sit__text"><?php echo $post_text; ?></p>
        <div class="sit__icons">
            <a href=""><i class="far fa-comment"></i></a>
            <a href=""><i class="far fa-reply"></i></a>
            <a href=""><i class="far fa-heart"></i></a>
            <a href=""><i class="far fa-upload"></i></a>
            <a href=""><i class="far fa-chart-bar"></i></a>

        </div>
    </div>

    <div class="sit__del">
        <div class="dropdown">
            <div class="dropbtn">
                <button class="dropbtn"><span class="fa fa-ellipsis-h"></span></button>
                <div class="dropdown-content">
                    <a href="index.php?del=<?php echo $row['post_id']; ?>"><i class="fas fa-trash"></i><span>Delete</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
