<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
$pageTitle = "게시판";
require_once __DIR__ . '/../../header.php';

# 게시물 쿼리
$sql = "SELECT * FROM `article` ORDER BY id DESC;";

# 게시물 쿼리 실행
$articles = DB__getRows($sql);

# 게시판 정보 입력 없을 시, 공지사항으로
if ( !isset($boardId) ) {
    $boardId = 1;
}

# 번호가 있다면 해당 게시판으로
if ( !empty($_GET['boardId']) ){
    $boardId = $_GET['boardId'];
}

# 게시판 쿼리
$boardSql = "SELECT * FROM `board` WHERE `id` = $boardId;";

# 게시판 쿼리 실행
$board = DB__getRow($boardSql);

?>
<div>
    <span style="margin-top:20px;">
        <h1>
            <?=$board['name']?> 게시판
        </h1>
        <hr>
    </span>
    <table class="table table-hover mytableCSS" style="margin-top: 15px;">
        <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">제목</th>
                <th scope="col">작성일</th>
                <th scope="col">작성자</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $articles as $article ) {?>
            <?php $memInfo = DB__getMemInfo($article['memIndex']) ?>
            <?php if ($article['boardIndex'] == $board['id']) { ?>
                <tr>
                    <th scope="row"><?=$article['id']?></td>
                    <td><a href="detail.php?id=<?=$article['id']?>"><?=$article['title']?></a></td>
                    <td><?=$article['regDate']?></td>
                    <td><?=$memInfo['memNick']?>님</td>
                    <td>
                    <?php if ( isset($_SESSION['logonMember'])) { ?>
                        <?php if ( $boardId == 1 ) { ?>
                        <?php if ( isset($_SESSION['logonMember']) && $_SESSION['admin'] == 1) { ?>
                            <div class= "atoleft">
                                <a href="doDelete.php?id=<?=$article['id']?>&boardId=<?=$article['boardIndex']?>>"><button type="button" class="btn btn-outline-primary" style="font-size: 12px;">삭제</button></a>
                            </div>
                            <?php } else { ?>
                                <div class= "atoleft">
                                    <a href="#"><button type="button" class="btn btn-outline-secondary" style="font-size: 12px;">삭제 불가</button></a>
                                </div>
                            <?php }?>
                        <?php } else { ?>
                            <div class= "atoleft">
                                <a href="doDelete.php?id=<?=$article['id']?>&boardId=<?=$article['boardIndex']?>"><button type="button" class="btn btn-outline-primary" style="font-size: 12px;">삭제</button></a>
                            </div>
                        <?php }?>
                    <?php }?>    
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
    <div class="bottomLevelButton">
    <?php if ( isset($_SESSION['logonMember'])) { ?>
        <?php if ( $boardId == 1 ) { ?>
            <?php if ( isset($_SESSION['logonMember']) && $_SESSION['admin'] == 1) { ?>
                <div class= "atoleft">
                    <a href="Write.php?boardId=<?=$board['id']?>"><button type="button" class="btn btn-outline-primary" style="font-size: 12px;">게시물 작성</button></a>
                </div>
            <?php } else { ?>
                <div class= "atoleft">
                    <a href="#"><button type="button" class="btn btn-outline-secondary" style="font-size: 12px;">게시물 작성 불가</button></a>
                </div>
            <?php }?>
        <?php } else { ?>
            <div class= "atoleft">
                <a href="Write.php?boardId=<?=$board['id']?>"><button type="button" class="btn btn-outline-primary" style="font-size: 12px;">게시물 작성</button></a>
            </div>
        <?php }?>
    <?php }?>
    </div>
</div>

<!-- # 푸터 불러오기 -->
<?php 
require_once __DIR__."/../../footer.php"; 
?>