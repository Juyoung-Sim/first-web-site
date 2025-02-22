<?php
    $conn = mysqli_connect(
        'localhost', 
        'root', 
        's36543', 
        'opentutorials');
    
    settype($_POST['id'], 'integer');
    $filtered = array(
        'id' => mysqli_real_escape_string($conn, $_POST['id']),
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description'])
    );

    $sql = "
        UPDATE topic
            SET
                title = '{$filtered['title']}',
                description = '{$filtered['description']}'
            WHERE
                id = {$filtered['id']}
        ";

    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요';
        error_log(mysqli_error($conn));
    } else {
        echo '성공했습니다. <a href="index.php">돌아가기</a>';
    }
?>
