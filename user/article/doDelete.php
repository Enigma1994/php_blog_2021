<?php

$dbConn = mysqli_connect("127.0.0.1", "scc211", "12345", "php_blog_2021");

if ( isset($_GET['id']) == false ) {
  echo "id를 입력해주세요.";   
  exit;
}

$articleId = intval($_GET['id']);  

$sql = "DELETE FROM article WHERE id = $articleId ;";

$rs = mysqli_query($dbConn, $sql);

if ($articleId == null){
    echo "id를 확인하여 주시기 바랍니다.";
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 게시물 삭제</title>
</head>
<body>
    <h1> 해당 게시물이 삭제되었습니다. </h1>
    <a href = "list.php">게시물 리스트로 돌아가기</a>
</body>
</html>