<?php
$list='';
$conn = mysqli_connect("localhost", "root", "123456", "pknu_db");
$sql = "select * from music";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    $list = $list."<li><a href = \"phpSelect2.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
    'title'=>'당신의 취향을 공유해주세요',
    'singer'=>''
);


$update_link = '';

if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from music where id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['singer'] = htmlspecialchars($row['singer']);
}

?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>추천하기</title>
        <div>
        </div>
    </head>
    <body>
        <h2>취향더하기</h2>    
        <ol>
            <?php 
                echo $list; 
            ?>
        </ol>

        <a href = "create2.php">추천노래 넣기</a>
        <p><a href = "create3.php">추천드라마 넣기</a></p>
        <p><a href = "create4.php">추천책 넣기</a></p>
        
        <h3>
            <?php
                echo $article['title']; 
            ?>
        </h3>

        <h4>
            <?php 
                echo $article['singer']; 
            ?>
        </h4>
        <img src = "music.png" width = "400" height = "280">
    </body>
</html>