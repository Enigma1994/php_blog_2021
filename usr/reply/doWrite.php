<?php
#  초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';

# 변수 수취
$relId = $_POST['relId'];
$body = $_POST['body']; 
$relTypeCode = $_POST['relTypeCode'];
$boardIndex = $_POST['boardIndex'];
$memIndex = $_SESSION['logonMember'];

# 쿼리
$sql = "INSERT INTO `reply` SET `relid` = '$relId', `memIndex` = '$memIndex',  `boardIndex` = '$boardIndex', `body` = '$body', `relTypeCode` = '$relTypeCode', `regDate` = NOW(), `updateDate` = NOW();";

# 댓글 작성 후 돌아가기
DB__insert($sql);
backToPath("../article/detail.php?id=$relId", "댓글이 작성되었습니다.");
?>