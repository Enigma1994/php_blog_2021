<?php
# 필수기능 불러오기
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';
$pageTitle = "게시물 작성";
require_once __DIR__."/../../header.php";

# 변수 수취
$boardId = $_GET['boardId'];

?>
<section>
    <div>
        <a href="list.php"><input type="button" value="리스트로 돌아가기"></a>
        <hr>
    </div>
    <div>
        <form method="POST" action="doWrite.php">
            <span>
                <h2>
                    <?=$pageTitle?>
                </h2>
            </span>
            <p> 제목: <input required type="text" name="title" autoComplete="off"></p>
            <div>
                <div>내용: </div>
                <textarea required name="body" cols="30" rows="10"></textarea>
            </div>
            <input type="hidden" name="boardId" value="<?=$boardId?>">
            <input type="submit" value="작성">
        </form>
    </div>
</section>
<?php require_once __DIR__."/../../footer.php"; ?>