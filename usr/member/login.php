<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
$pageTitle = "로그인";
require_once __DIR__."/../../header.php";

# 로그인 여부 확인
if ( isset($_SESSION['logonMember']) ) {
    backToHistory("이미 로그인 상태입니다.");
}

?>
<section class = "my_contentsCSS">
    <div>
        <form method="POST" action="doLogin.php">
            <h2> <?=$pageTitle?> </h2>
            <hr>
             <table class = "my_tableCSS">
                 <tr>
                     <td>아이디</td>
                     <td>
                        <input required placeholder="ID를 입력해주세요" type="text" class="form-control" id="inputDefault" name="userId" autoComplete="off" style="font-size : 8px";>    
                    </td>
                 </tr>
                 <tr>
                     <td>비밀번호</td>
                     <td>
                        <input required placeholder="Password를 입력해주세요" type="password" class="form-control" id="floatingPassword" name="userPW" autoComplete="off" style="font-size : 8px">
                    </td>
                 </tr>
             </table>
             <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">로그인</button>
        </form>
    </div>
</section>
<?php require_once __DIR__."/../../footer.php"; ?>