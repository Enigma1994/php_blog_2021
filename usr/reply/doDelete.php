<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';

# 변수 수취
$id = $_GET['id'];
$relId = $_GET['relId'];
$logonMember = $_SESSION['logonMember'];

# 쿼리
$delSql = "DELETE FROM `reply` WHERE id = $id;";
$getSql = "SELECT * FROM `reply` WHERE `id` = $id";

# 쿼리 실행
$reply = DB__getRow($getSql);

if ( $reply['boardIndex'] == 1 ) {
    if ( $_SESSION['admin'] == 1 ){
        DB__delete($delSql);
        backToPath("../article/detail.php?id=$relId","댓글이 삭제되었습니다.");    
    } else if ($_SESSION['admin'] != 1 ) {
        backToPath("../article/detail.php?id=$relId","권한이 없습니다.");    
    } else {
        backToPath("../article/detail.php?id=$relId","권한이 없습니다.");
    }
} else if ( $reply['boardIndex'] != 1 ) {
    if ( $reply['memIndex'] == $logonMember or $_SESSION['admin'] == 1 ) {
        DB__delete($delSql);
        backToPath("../article/detail.php?id=$relId","댓글이 삭제되었습니다.");
    } else if ( $reply['memIndex'] != $logonMember ) {
        backToPath("../article/detail.php?id=$relId","권한이 없습니다.");        
    } else {
        backToPath("../article/detail.php?id=$relId","권한이 없습니다.");
    }
    backToPath("../article/detail.php?id=$relId","권한이 없습니다.");
}

?>