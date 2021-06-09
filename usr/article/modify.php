<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';
$pageTitle = "게시물 수정";
require_once __DIR__ . '/../../header.php';

# 변수 수취
$id = $_GET['id'];

?>
<div>
    <a href="list.php"><input type="button" value="리스트로 돌아가기"></a>
    <hr>
</div>
<div>
    <form method="POST" action="doModify.php">
        <div>
            <h2>
                <?=$pageTitle?>
            </h2>
        </div>
        <input type="hidden" name="id" value="<?=$id?>">
        <p>
            제목: <input type="text" name="title" autoComplete="off">
        </p>
        <p>
            내용:
        </p>
        <p>
            <textarea name="body" cols="30" rows="10"></textarea>
        </p>
        <input type="submit" value="수정">
    </form>
</div>
<?php
require_once __DIR__ . '/../../footer.php';
?>