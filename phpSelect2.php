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
    'title'=>'노래 제목과 가수 이름을 적어주세요',
    'singer'=>'숨은 명곡을 알려주세요 :)'
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
        <title>추천노래</title>
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