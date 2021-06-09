<?php
# 초기화 
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';

# 로그인 여부 확인
if ( !isset($_SESSION['logonMember']) ) {
    backToPath("login.php","이미 로그아웃 되었습니다.");
}

# 로그아웃 후 전 페이지로
if ( isset($_SESSION['logonMember']) ) {
    session_unset();
    backToPath("login.php","로그아웃 되었습니다!");
}
?>