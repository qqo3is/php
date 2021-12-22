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

if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from music where id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['singer'] = $row['singer'];
}

?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>추천노래</title>
    </head>
    <body>
        <h1>추천노래 목록</h1>    
        <ol>
            <?php 
                echo $list; 
            ?>
        </ol>

        <form action = "process_create2.php" method = "POST">
            <p><input type = "text" name = "title" placeholder = "노래제목을 입력해주세요"></p>
            <p><textarea name = "singer" placeholder = "가수를 입력해주세요"></textarea></p>
            
            <p><input type = "submit" value = "추천하기"></p>
        </form>

        <h2>
            <?php 
                echo $article['title']; 
            ?>
        </h2>
        <h4>
            <?php 
                echo $article['singer']; 
            ?>
        </h4>
        <img src = "music.png" width = "400" height = "280">
    </body>
</html>