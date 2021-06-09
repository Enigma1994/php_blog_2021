<?php 
# 페이지에 공통적으로 적용되어야 할 사항
## 로그인을 위한 세션
session_start();

## 유틸
require_once __DIR__ . '/util.php';

## DB연결
$dbConn = mysqli_connect("127.0.0.1","scc211","12345","php_my_blog_2021");
