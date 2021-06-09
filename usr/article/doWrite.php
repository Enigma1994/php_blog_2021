<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';

# 변수수취
$title = $_POST['title'];
$body = $_POST['body'];

if ( $_SESSION['admin'] != 1 ) {
    if ($_POST['boardId'] == 1) {
        backToHistory("권한이 없습니다.");
    }

    if($_POST['boardId'] != 1) {
        $boardId = $_POST['boardId'];    
    }
} else {
    $boardId = $_POST['boardId'];
}
$memIndex = $_SESSION['logonMember'];

# 쿼리
$sql = "INSERT INTO `article` SET `title` = '$title', `body` = '$body', `regDate` = NOW(), `updateDate` = NOW(), `memIndex` = '$memIndex', `boardIndex`='$boardId'";

# 쿼리 실행
$id = DB__insert($sql);
backToPath("list.php?boardId=$boardId","게시물이 생성되었습니다.");

?>