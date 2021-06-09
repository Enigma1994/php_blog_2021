<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';

# 로그인 여부 확인
if ( isset($_SESSION['logonMember']) ) {
    backToPath("../board/list.php", "이미 로그인 되었습니다.");
}

# 변수 수취
## ID로 중복체크
if ( DB__getMemInfoByMemId($_POST['memId']) >= 1 or $_POST['memId'] == 'admin') {
    backToHistory("이미 가입하신 회원입니다.");
    exit;
} else {
    $memId = $_POST['memId'];
}
$memPW = $_POST['memPW'];
## Email로 중복체크
if ( DB__getMemInfoByMemEmail($_POST['memEmail']) >= 1) {
    backToHistory("이미 가입하신 이메일입니다.");
    exit;
} else {
    $memEmail = $_POST['memEmail'];
}
$memName = $_POST['memName'];
$memNick = $_POST['memNick'];
$memPHNum = $_POST['memPHNum'];

# 쿼리
$sql = "
INSERT INTO `member`
SET `regDate` = NOW(),
`updateDate` = NOW(),
`memId` = '$memId',
`memPW` = '$memPW',
`memEmail` = '$memEmail',
`memName` = '$memName',
`memNick` = '$memNick',
`memPHNum` = '$memNick',
`delSatatus` = FALSE,
`admin` =  FALSE;
";

# 쿼리 실행
DB__insert($sql);

# 알림 후 복귀
backToPath("login.php","회원가입이 완료되었습니다.");

?>