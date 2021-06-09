<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';

# 아이디 비밀번호 입력 여부 판단하기
if ( isset($_POST['userId']) == false) {
    backToPath("login.php","아이디를 입력하여 주시기 바랍니다.");
}
if ( isset($_POST['userPW']) == false) {
    backToPath("login.php","비밀번호를 입력하여 주시기 바랍니다.");
}

# 로그인 여부 확인
if ( isset($_SESSION['logonMember']) ) {
    backToPath("../board/list.php", "이미 로그인 되었습니다.");
}

# 변수 수취
$userId = $_POST['userId'];
$userPW = $_POST['userPW'];

# 쿼리
$sql = "SELECT * FROM `member`WHERE `memId` = '$userId'";

# 쿼리 실행
$member = DB__getRow($sql);
if ( isset($member) ) {
    $memNick = $member['memNick'];
}

# 로그인 정보 확인
if ( empty($member) ) {
    backToPath("login.php","존재하지 않는 아이디 입니다.");
    exit;
}
if ( $userPW != $member['memPW'] ) {
    backToPath("login.php","비밀번호가 일치하지 않습니다.");
    exit;
}

# 세션에 회원 번호 및 관리자여부 할당
$_SESSION['logonMember'] = $member['id'];
$_SESSION['admin'] = $member['admin'];

# 환영인사
if ( $_SESSION['admin'] == 1) {
    backToPath("../board/list.php", "관리자로 접속합니다.");
}

if ( $_SESSION['admin'] != 1) {
    backToPath("../board/list.php","$memNick 님 환영합니다!");
}

?>