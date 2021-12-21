<?php
    //var_dump($_POST);
    $conn = mysqli_connect("localhost", "root", "123456", "pknu_db");

    $filtered = array(
        'title'=>mysqli_real_escape_string($conn ,$_POST['title']),
        'singer'=>mysqli_real_escape_string($conn ,$_POST['singer'])
        );
        
    $sql = "
    INSERT INTO music 
        (title, description) 
        VALUES(
            '{$filtered['title']}',
            '{$filtered['singer']}');
    ";

    //die($sql);

    $result = mysqli_query($conn, $sql);
    if($result === false)
    {
        echo '문제가 발생했습니다.';
        echo mysqli_error($conn);
    }
    else
    {
        echo '추천해주셔서 감사합니다.<p> <a href = "phpSelect2.php">또 추천하기!</a>';
    }
?>