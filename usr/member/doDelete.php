<?php
# 초기화 
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';

# 로그인 여부 확인
if ( !isset($_SESSION['logonMember']) ) {
    backToHistory("../board/list.php", "로그인 되어있지 않습니다.");
}

# 회원번호 색인
$id = $_SESSION['logonMember'];

# 쿼리
$sql = "
UPDATE `member`
SET `regDate` = '',
`updateDate` = '',
`memId` = '',
`memPW` = '',
`memEmail` = '',
`memName` = '',
`memNick` = '',
`memPHNum` = '',
`delSatatus` = True
WHERE `id` = $id
";

# 쿼리 실행
DB__update($sql);

# 강제 로그아웃
session_unset();

# path로 복귀
backToPath("../board/list.php","정상적으로 탈퇴되었습니다.");

?>