<!-- HTML 시작 -->
<?php require_once __DIR__ . '/util.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link rel="stylesheet" href="/header.css">
    <script src="/header.js"></script>
    <title><?=$pageTitle?></title>
</head>
<body>
<div class = "topnav">
  <a href="/usr/board/list.php">HOME</a>
  <div class = "topnav-right">
    <?php if ( !isset($_SESSION['logonMember']) ) {?>
        <a class="nav-link" href="../member/login.php">로그인</a>
        <a class="nav-link" href="../member/join.php">회원가입</a>
    <?php } ?>
    <?php if ( isset($_SESSION['logonMember']) ) {?>
        <a class="nav-link" href="../member/doLogout.php">로그아웃</a>
        <a class="nav-link" href="../member/modify.php">정보수정</a>
    <?php } ?>
  </div>
</div>

