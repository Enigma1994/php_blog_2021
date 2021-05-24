<?php
$dbConn = mysqli_connect("127.0.0.1", "scc211", "12345", "php_blog_2021") or die("DB CONNECTION ERROR");

if ( isset($_GET['title']) == false ) {
  echo "title을 입력해주세요.";
  exit;
}

if ( isset($_GET['body']) == false ) {
  echo "body를 입력해주세요.";
  exit;
}

$title = $_GET['title'];
$body = $_GET['body'];

$sql = "
INSERT INTO article
SET regDate = NOW(),
updateDate = NOW(),
title = '${title}',
`body` = '${body}'
";
mysqli_query($dbConn, $sql);

$articleId = mysqli_insert_id($dbConn); // 쿼리로 실행된 마지막 아이디
?>

<div><?=$articleId?>번 게시물이 생성되었습니다.</div>
<div><a href="detail.php?id=<?=$articleId?>">생성된 게시물</a></div>
<div><a href="list.php">게시물 리스트로 돌아가기</a></div>