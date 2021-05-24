<?php
$dbConn = mysqli_connect("127.0.0.1", "scc211", "12345", "php_blog_2021") or die("DB CONNECTION ERROR");
if ( isset($_GET['id']) == false ) {
  echo "id를 입력해주세요.";    // 없으면 출력
  exit;
}
$articleId = intval($_GET['id']);  // 입력 받은 id int로 
$sql = "
SELECT *
FROM article AS A
WHERE A.id = '$articleId'  
";            
$rs = mysqli_query($dbConn, $sql);
$article = mysqli_fetch_assoc($rs); // 압축된 게시물들 압축 풀어서 article
if ( $article == null ) {    
  echo "${articleId}번 게시물은 존재하지 않습니다.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 상세페이지, <?=$articleId?>번 게시물</title>
</head>
<body>
  <h1><?=$articleId?>번 게시물</h1>

  <div>번호 : <?=$article['id']?></div>
  <div>작성날짜 : <?=$article['regDate']?></div>
  <div>수정날짜 : <?=$article['updateDate']?></div>
  <div>제목 : <?=$article['title']?></div>
  <div>내용 : <?=$article['body']?></div>
  <div>
    <a href="list.php">게시물 리스트로 돌아가기</a>
  </div>
</body>
</html> 