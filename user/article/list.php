<?php
$dbConn = mysqli_connect("127.0.0.1", "scc211", "12345", "php_blog_2021") or die("DB CONNECTION ERROR");
// db와 연동
$sql = "
SELECT *
FROM article AS A
ORDER BY A.id DESC
";
// 쿼리 작성
$rs = mysqli_query($dbConn, $sql);
// 쿼리 날려서 나온 결과물 rs

$articles = [];
// 빈 배열 생성

while ( $article = mysqli_fetch_assoc($rs) ) {
  $articles[] = $article;
}
// rs 압축풀고 결과 article에
// while ($article)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 리스트</title>
</head>
<body>
  <h1>게시물 리스트</h1>
  <hr>

  <div>
    <?php foreach ( $articles as $article ) { ?>
      <?php
      $detailUri = "detail.php?id=${article['id']}";
      ?>
      <a href="<?=$detailUri?>">번호 : <?=$article['id']?></a><br>
      작성 : <?=$article['regDate']?><br>
      수정 : <?=$article['updateDate']?><br>
      <a href="<?=$detailUri?>">제목 : <?=$article['title']?></a><br>
      <hr>
    <?php } ?>
  </div>
</body>
</html> 