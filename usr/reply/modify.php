<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT']  . '/webinit.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logincheck.php';
$pageTitle = "댓글 수정";
require_once __DIR__ . '/../../header.php';

# 변수 수취
$id = $_GET['id'];
$relId = $_GET['relId'];

?>
<h2><?=$pageTitle?></h2>
<hr>
<div>
    <form method="POST" action="doModify.php">
        <input required type="hidden" name="id" value="<?=$id?>">
        <input required type="hidden" name="relId" value="<?=$relId?>">
        <p> 댓글 : <input type="text" name="body"> <input type="submit" value="수정"></p>
    </form>    
</div>
<hr>
<a href="../article/detail.php?id=<?=$relId?>"><input type="button" value="취소"></a>
<?php
require_once __DIR__ . '/../../footer.php';
?>