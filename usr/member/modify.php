<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';
$pageTitle = "회원정보 수정";
require_once __DIR__ . '/../../header.php';

# 기 회원정보 수취
## 쿼리
$memId = $_SESSION['logonMember'];
$sql = "SELECT * FROM `member` WHERE `id` = '$memId'";

## 쿼리 실행
$member = DB__getRow($sql);

?>
<div>
    <form method="POST" action="doModify.php">
        <h2> 회원정보 </h2>
        <hr>
        <table>
            <tr>
                <td>아이디</td>
                <td><input type="text" name="memId" value="<?=$member['memId']?>" readonly></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input required type="password" name="memPW"></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><input type="text" name="memName" value="<?=$member['memName']?>" readonly></td>
            </tr>
            <tr>
                <td>닉네임</td>
                <td><input required type="text" name="memNick" value="<?=$member['memNick']?>"></td>
            </tr>
            <tr>
                <td>이메일</td>
                <td><input required type="text" name="memEmail" value="<?=$member['memEmail']?>"></td>
            </tr>
            <tr>
                <td>전화번호</td>
                <td><input required type="text" name="memPHNum" value="<?=$member['memPHNum']?>"></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="수정"> &nbsp; <a href="../article/list.php"><input type="button" value="취소"></a>
        </div>
    </form>
    <hr>
    <a href="doDelete.php"><input type="button" value="회원탈퇴"></a>
</div>


<?php require_once __DIR__ . '/../../footer.php'; ?>