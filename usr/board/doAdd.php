<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';

# 관리자 여부 확인
if (!isset($_SESSION['logonMember']) != 1 && $_SESSION['admin'] != 1) {
    backToPath("list.php","게시판 작성 권한이 없습니다.");
}

# POST로 정보받기
$name = $_POST['name'];
$code = $_POST['code'];

# 게시판 생성자 정보
if ( isset($_SESSION['logonMember']) ) {
    $memId = $_SESSION['logonMember'];
}

# 쿼리
$sql = "
INSERT INTO `board`
SET `name` = '$name',
`boardCode` = '$code',
`regDate` = NOW(),
`updateDate` = NOW(),
`memId` = '$memId';
";

# 쿼리실행
$id = DB__insert($sql);

# 생성 완료 후 리스트로
backToPath("list.php","게시판 생성이 완료되었습니다.")

?>