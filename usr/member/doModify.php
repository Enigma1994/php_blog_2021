<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';
# 변수 수취
$memId = $_POST['memId'];

# 비밀번호 공백시 백
if ( empty($_POST['memPW']) ) {
    backToHistory("비밀번호를 입력하여 주시기 바랍니다.");
} else {
    $memPW = $_POST['memPW'];
}

# 변수 수취
$memName = $_POST['memName'];
$memNick = $_POST['memNick'];
$memEmail = $_POST['memEmail'];
$memPHNum = $_POST['memPHNum'];
# 닉네임 중복체크 (미구현)
#$checkDuple = dupleNickCheck($_POST['memNick']);
#if ( $checkDuple ) {
#    $memNick = $_POST['memNick'];
#} else {
#    echo ("
#    <script>
#        alert('중복된 닉네임 입니다.');
#        history.back();
#    </sciprt>
#    ");
#}

# 쿼리
$sql = "UPDATE `member` SET `memPW` = '$memPW', `memEmail` = '$memEmail', `memNick` = '$memNick', `memPHNum` = '$memPHNum', `updateDate`= NOW() WHERE `memId` = '$memId';";

# 쿼리 실행
DB__update($sql);

# 수정 후 이전 페이지로 복귀
backToPath("../board/list.php","수정이 완료되었습니다.");
?>