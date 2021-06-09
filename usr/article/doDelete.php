<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';

# 쿼리
$id = $_GET['id'];
$boardId = $_GET['boardId'];
$delsql = "DELETE FROM `article` WHERE `id` = $id;";
$getSql = "SELECT * FROM `article` WHERE `id` = $id;";

# 쿼리 실행
$article = DB__getRow($getSql);

# 삭제 실행
if ( $article['boardIndex'] == 1) {
    if ($_SESSION['admin'] != 1) {
        backToHistory("권한이 없습니다.");
    }
    DB__delete($delsql);
    backToPath("list.php?boardId=$boardId","게시물이 성공적으로 삭제되었습니다.");
}
if ( $article['boardIndex'] != 1) {
    if($_SESSION['admin'] == 1) {
        DB__delete($delsql);
        backToPath("list.php?boardId=$boardId","[관리자] 게시물이 성공적으로 삭제되었습니다.");
    } else if ($_SESSION['logonMember'] != $article['memIndex']) {
        backToHistory("권한이 없습니다.");
    } else if ($_SESSION['logonMember'] == $article['memIndex']) {
        DB__delete($delsql);
        backToPath("list.php?boardId=$boardId","게시물이 성공적으로 삭제되었습니다.");
    }
    else {
        DB__delete($delsql);
        backToPath("list.php?boardId=$boardId","게시물이 성공적으로 삭제되었습니다.");
    }
}
?>