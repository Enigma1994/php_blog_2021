<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
$pageTitle = "회원가입";
require_once __DIR__ . '/../../header.php';

# 로그인 여부 확인
if ( isset($_SESSION['logonMember']) ) {
    backToHistory("이미 로그인 상태입니다.");
}
?>
<div>
    <form method="POST" action="doJoin.php">
        <div style="margin: 20px;">
            <h2> 회원 정보 </h2>
            <hr>
        </div>
        <table class="myinfo">
            <tr>
                <td>아이디</td>
                <td>
                    <input required placeholder="ID" type="text" class="form-control" id="inputDefault" name="memId" autoComplete="off" style="font-size : 8px;">
                </td>
            </tr>
            <tr>
                <td>비밀번호   </td>
                <td>
                    <input required placeholder="Password" type="password" class="form-control" id="inputDefault" name="memPW" style="font-size : 8px;">
                </td>
            </tr>
            <tr>
                <td>이름</td>
                <td>
                    <input required placeholder="Name" type="text" class="form-control" id="inputDefault" name="memName" autoComplete="off" style="font-size : 8px;">
                </td>
            </tr>
            <tr>
                <td>닉네임</td>
                <td>
                    <input required placeholder="Nickname" type="text" class="form-control" id="inputDefault" name="memNick" autoComplete="off" style="font-size : 8px;">
                </td>
            </tr>
            <tr>
                <td>이메일</td>
                <td>
                    <input required placeholder="Email" type="email" class="form-control" id="inputDefault" name="memEmail" autoComplete="off" style="font-size : 8px;">
                </td>
            </tr>
            <tr>
                <td>전화번호</td>
                <td>
                    <input required placeholder="PhoneNo" type="text" class="form-control" id="inputDefault" name="memPHNum" autoComplete="off" style="font-size : 8px; width: 220px;">
                </td>
            </tr>
        </table>
        <div style="margin :25px;">
            <button type="submit" class="btn btn-outline-primary">회원가입</button>
            &nbsp;
            <a href="login.php"><button type="button" class="btn btn-outline-secondary">취소</button></a>
        </div>
    </form>
    <hr>
</div>
<?php require_once __DIR__ . '/../../footer.php'; ?>