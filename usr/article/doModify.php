<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';

# 변수 수취
$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];

# 쿼리
$modsql = "UPDATE `article` SET `title` = '$title', `body` = '$body', `updateDate` = NOW() WHERE id = $id;";
$getSql = "SELECT * FROM `article` WHERE `id` = $id";

# 쿼리 실행
$article = DB__getRow($getSql);

# 수정 실행
if ( $article['boardIndex'] == 1) {
    if ($_SESSION['admin'] != 1) {
        backToHistory("권한이 없습니다.");
    }
    DB__update($modsql);
    backToPath("list.php","게시물이 성공적으로 수정되었습니다.");
}
if ( $article['boardIndex'] != 1) {
    if($_SESSION['admin'] == 1) {
        DB__update($modsql);
        backToPath("list.php","[관리자] 게시물이 성공적으로 수정되었습니다.");
    } else if ($_SESSION['logonMember'] != $article['memIndex']) {
        backToHistory("권한이 없습니다.");
    } else {
        backToHistory("권한이 없습니다.");
    }
}

?>
