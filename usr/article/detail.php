<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
# 변수 수취
$id = $_GET['id'];
$pageTitle = "{$id}번 게시물 상세내용";
require_once __DIR__ . '/../../header.php';

# 변수 수취
$id = $_GET['id'];

# 게시물 쿼리
$sql = "SELECT * FROM `article` WHERE `id` = '$id';";

# 게시물 쿼리 실행
$article = DB__getRow($sql);

# 댓글 쿼리
$replySql = "SELECT * FROM `reply` ORDER BY `id` DESC";

# 댓글 쿼리 실행
$replies = DB__getRows($replySql);

?>

<div>
    <h1><?=$id?>번 게시물</h1>
    <p> 게시물 번호: <?=$article['id']?></p>
    <p> 게시물 제목: <?=$article['title']?></p>
    <p> 게시물 작성일: <?=$article['regDate']?></p>
    <p> 게시물 갱신일: <?=$article['updateDate']?></p>
    <hr>
    <p> 내용: <?=$article['body']?> </p> 
    
</div>
<hr>
<div>
    <a href="list.php"><input type="button" value="게시물 리스트"></a> 
    <?php if(isset($_SESSION['logonMember'])) { ?>
        <?php if ( $article['memIndex'] == $_SESSION['logonMember'] or $_SESSION['admin'] == TRUE ) { ?>
            <a href="modify.php?id=<?=$article['id']?>"><input type="button" value="게시물 수정"></a> 
            <a href="doDelete.php?id=<?=$article['id']?>&boardId=<?=$article['boardIndex']?>"><input type="button" value="게시물 삭제"></a>
        <?php } ?>
    <?php } ?>
</div>
<hr>
<div>
    <h2>
        댓글
    </h2>
</div>
<hr>
<div>
    <?php if(isset($_SESSION['logonMember'])) { ?>
        <form method="POST" action="../reply/doWrite.php">
            <input type="hidden" name="relId" value="<?=$article['id']?>">
            <input type="hidden" name="relTypeCode" value="article">
            <input type="hidden" name="boardIndex" value="<?=$article['boardIndex']?>">
            <input required placeholder="댓글을 입력해주세요" type="text" name="body">
            <input type="submit" value="작성">
        </form>
    <?php } ?>
    <hr>
    <?php if(isset($_SESSION['logonMember'])) { ?>
        <?php foreach( $replies as $reply) {
            if ($reply['relId'] == $article['id']) { ?>
                <div id = "reply">
                    <?=$reply['id']?>번 작성자: <?=DB__getMemNick($reply['memIndex'])?> 댓글: <?=$reply['body']?>
                    <?php if ( $reply['memIndex'] == $_SESSION['logonMember'] or $_SESSION['admin'] == TRUE ) { ?>
                        <a href="../reply/modify.php?id=<?=$reply['id']?>&relId=<?=$reply['relId']?>"><input type="button" value="수정"></a>
                        <a href="../reply/doDelete.php?id=<?=$reply['id']?>&relId=<?=$reply['relId']?>"><input type="button" value="삭제"></a>
                        <br>
                        <br>
                    <?php } ?>      
                </div>
        <?php   }
        }
        ?>
        <?php } ?>
</div>
<?php
require_once __DIR__ . '/../../footer.php';
?>