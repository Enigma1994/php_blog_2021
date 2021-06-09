<?php
# 로그인 후 이용하여야 하는 컨텐츠에 사용
if ( !isset($_SESSION['logonMember']) ) {
    backToPath("/usr/member/login.php", "로그인 후 이용해주세요.");
}