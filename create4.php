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
    'title'=>'책 제목과 작가 이름을 적어주세요',
    'singer'=>'인생 도서를 알려주세요 :)'
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
        <title>추천도서</title>
    </head>
    <body>
        <h1>추천도서 목록</h1>    
        <ol>
            <?php 
                echo $list; 
            ?>
        </ol>

        <form action = "process_create2.php" method = "POST">
            <p><input type = "text" name = "title" placeholder = "책제목을 입력해주세요"></p>
            <p><textarea name = "singer" placeholder = "작가를 입력해주세요"></textarea></p>
            
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
        <img src = "book.jpg" width = "450" height = "280">
    </body>
</html>