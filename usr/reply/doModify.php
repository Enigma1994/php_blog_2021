<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';

# 변수 수취
$id = $_POST['id'];
$relId = $_POST['relId'];
$body = $_POST['body'];

$logonMember = $_SESSION['logonMember'];

# 쿼리
$modSql = "UPDATE `reply` SET `body` = '$body', `updateDate` = NOW() WHERE `id` = $id;";
$getSql = "SELECT * FROM `reply` WHERE `id` = $id";

# 쿼리 실행
$reply = DB__getRow($getSql);

# 수정 실행
if ( $logonMember == $reply['memIndex'] or $_SESSION['admin'] == 1){
    DB__update($modSql);
    backToPath("../article/detail.php?id=$relId","댓글이 성공적으로 수정되었습니다.");
} else if ( $logonMember != $reply['memIndex'] ) {
    backToHistory("권한이 없습니다.");
} else {
    backToHistory("권한이 없습니다.");
}

?>