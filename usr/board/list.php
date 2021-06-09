<?php
# 초기화
require_once $_SERVER['DOCUMENT_ROOT'] . '/webinit.php';
$pageTitle = "게시판 목록";
require_once __DIR__ . '/../../header.php';

# 쿼리
$sql = "SELECT * FROM `board` ORDER BY id;";

# 쿼리 실행
$boards = DB__getRows($sql);

?>
<div>
    <span style="margin-top:50px;">
        <h1>
            게시판 목록
        </h1>
        <hr>
    </span>
    <table class="table table-hover mytableCSS" style="margin-top: 15px;">
        <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">이름</th>
                <th scope="col">코드</th>
            
            </tr>
        </thead>
        <tbody>
        <?php foreach( $boards as $board ) {?>
            <tr>
                <th scope="row"><?=$board['id']?></td>
                <td><a href="../article/list.php?boardId=<?=$board['id']?>"><?=$board['name']?></a></td>
                <td><?=$board['boardCode']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="bottomLevelButton">
    <?php if (isset($_SESSION['logonMember'])) { ?>
        <div class= "atoleft">
            <a href="add.php"><button type="button" class="btn btn-outline-primary" style="font-size: 12px;">게시판 생성</button></a>
        </div>
    <?php }?>
    </div>
</div>
<?php 
require_once __DIR__."/../../footer.php"; 
?>