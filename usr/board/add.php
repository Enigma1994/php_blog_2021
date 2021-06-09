<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
$pageTitle = "게시판 생성";
require_once __DIR__ . '/../../header.php';

# 관리자 여부 확인
if (!isset($_SESSION['logonMember']) != 1 && $_SESSION['admin'] != 1) {
    backToPath("list.php","게시판 작성 권한이 없습니다.");
}

?>
<section>
    <div>
        <a href="list.php"><input type="button" value="메인으로"></a>
        <hr>
    </div>
    <div>
        <form method="POST" action="doAdd.php">
            <h2> 게시판 추가 </h2>
            <hr>
            <table>
                <tr>
                    <td>게시판 이름</td>
                    <td><input required type="text" name="name"></td>
                </tr>
                <tr>
                    <td>게시판 코드</td>
                    <td><input required type="text" name="code"></td>
                </tr>
            </table>
            <input type="submit" value="생성"> <a href="list.php"><input type="button" value="취소"></a>
        </form>
    </div>
</section>

<?php require_once __DIR__."/../../footer.php"; ?>