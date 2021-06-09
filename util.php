<?php
# DB에서 특정 정보만 수집
function DB__getRow($sql) {
    
    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);
    $row = mysqli_fetch_assoc($rs);

    return $row;
}

# DB에서 테이블 정보를 모두 수집
function DB__getRows($sql) {

    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);
    $rows = [];

    while ( $row = mysqli_fetch_assoc($rs) ) {
        $rows[] = $row;
    }

    return $rows;
}

# DB에 row 추가 후, index값 받기
function DB__insert($sql) {
    
    global $dbConn;
    
    $rs = mysqli_query($dbConn, $sql);

    return mysqli_insert_id($dbConn);
}

# DB 특정 row 삭제
function DB__delete($sql) {
    
    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);
    
}

# DB 특정 row 업데이트
function DB__update($sql) {

    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);

}

# DB에서 특정 row 갯수 수집
function DB__countRow($sql) {

    global $dbConn;

    $rs = mysqli_query($dbConn, $sql);
    $count = mysqli_num_rows($rs);

    return $count;
}

# 경고창
function printAlert($msg) {

    echo ("
    <script>
        alert('$msg');
    </script>
    ");

}

# 경고창 출력 후 특정경로로 이동
function backToPath($path, $msg = null) {

    if ( $msg ) {
        printAlert($msg);
    }

    echo ("
    <script>
        location.replace('$path');
    </script>
    ");

}

# 경로창 출력 후 직전 페이지로 이동
function backToHistory($msg = null) {

    if ( $msg ) {
        printAlert($msg);
    }

    echo("
    <script>
        history.back();
    </script>
    ");

}

# 특정 회원의 정보 수집
function DB__getMemInfo($id) {

    global $dbConn;

    $sql = "
    SELECT *
    FROM `member`
    WHERE `id` = '$id'
    ";

    $member = DB__getRow($sql);

    return $member;
}

# 특정 회원 닉네임 조회
function DB__getMemNick($id) {

    global $dbConn;

    $sql = "
    SELECT *
    FROM `member`
    WHERE `id` = '$id'
    ";

    $member = DB__getRow($sql);

    return $member['memNick'];
}

# 아이디으로 회원 정보 조회
function DB__getMemInfoByMemId($memId) {

    global $dbConn;

    $sql = "
    SELECT *
    FROM `member`
    WHERE `memId` = '$memId'
    ";

    $rs = mysqli_query($dbConn, $sql);
    $num = mysqli_num_rows($rs);

    return $num;
}

# 이메일로 회원 정보 조회
function DB__getMemInfoByMemEmail($memEmail) {

    global $dbConn;

    $sql = "
    SELECT *
    FROM `member`
    WHERE `memEmail` = '$memEmail'
    ";

    $rs = mysqli_query($dbConn, $sql);
    $num = mysqli_num_rows($rs);

    return $num;
}
