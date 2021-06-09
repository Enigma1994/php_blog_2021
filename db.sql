# 데이터 베이스 조회
SHOW DATABASES;

# 기 데이터 베이스 삭제
DROP DATABASE `php_my_blog_2021`;
DROP DATABASE `php_test_blog`;

# 데이터 베이스 생성
CREATE DATABASE `php_my_blog_2021`;

# 데이터 베이스 사용
USE `php_my_blog_2021`;

# 관리자 생성
GRANT ALL PRIVILEGES
ON *.*
TO `example`@`%`
IDENTIFIED BY '1234';

# 기 테이블 제거
DROP TABLE `article`;

# 게시물 테이블 생성
CREATE TABLE `article`(
    `id` INT(30) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,   
    `title` CHAR(50) NOT NULL,
    `body` TEXT NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL,
    `memIndex` INT(20) UNSIGNED NOT NULL,
    `boardIndex` CHAR(50) NOT NULL
);

# 게시물에 작성자 정보 등록
## article에 memIndex 컬럼 추가
## article 구조 확인
DESC `article`;
## 쿼리
#alter table `article` add column `memIndex` int(20) unsigned not null;
## article에 게시판 코드 추가
#alter table `article` add column `boardTypeCode` char(50) not null;

# 테스트 게시물 생성
INSERT INTO `article`
SET `title` = '제목1',
`body` = '내용1',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 2,
`boardIndex` = 2;

INSERT INTO `article`
SET `title` = '제목2',
`body` = '내용2',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 2,
`boardIndex` = 2;

INSERT INTO `article`
SET `title` = '제목3',
`body` = '내용3',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 2,
`boardIndex` = 2;

INSERT INTO `article`
SET `title` = '제목4',
`body` = '내용4',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 2,
`boardIndex` = 2;

# 게시물 최신순 조회
SELECT *
FROM `article`
ORDER BY id DESC;

# 게시물 상세사항
#SELECT *
#FROM `article`
#WHERE `id` = '';

# 게시물 삭제
#DELETE FROM `article`
#WHERE `id` = ;

# 게시물 수정
#UPDATE `article`
#SET `title` = ,
#`body` = ,
#`updateDate` = NOW()
#WHERE id = ;

# 테이블 확인
SHOW TABLES;

# article 구조 확인
DESC `article`;

# 댓글 테이블 삭제
#drop table `reply`;

# 댓글 테이블 생성
CREATE TABLE `reply` (
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `relId` INT(30) UNSIGNED NOT NULL,
    `memIndex` INT(30) UNSIGNED NOT NULL,
    `boardIndex` INT(30) UNSIGNED NOT NULL,
    `body` TEXT NOT NULL,
    `relTypeCode` CHAR(20) NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL
);

# reply 구조 확인
DESC `reply`;

# 모든 댓글 최신순 조회
SELECT *
FROM `reply`
ORDER BY id DESC;

# 테스트 댓글 추가
INSERT INTO `reply`
SET `relid` = ,
`body` = ,
`relTypeCode` = ,
`regDate` = NOW(),
`updateDate` = NOW();

# 댓글 삭제
#DELETE FROM `reply`
#WHERE id = ;

# 댓글 수정
#UPDATE `reply`
#SET `body` = ,
#`updateDate` = NOW()
#WHERE `id` = ;


# 회원 테이블 생성
CREATE TABLE `member`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL,
    `memId` CHAR(20) NOT NULL,
    `memPW` CHAR(100) NOT NULL,
    `memEmail` CHAR(30) NOT NULL,
    `memName` CHAR(6) NOT NULL,
    `memNick` CHAR(20) NOT NULL,
    `memPHNum` CHAR(20) NOT NULL,
    `delSatatus` BOOL NOT NULL,
    `admin` BOOL NOT NULL
); 

# member 구조 확인
DESC `member`;

# member 테이블 제거 
DROP TABLE `member`;

# 테스트 회원 생성
INSERT INTO `member`
SET `regDate` = NOW(),
`updateDate` = NOW(),
`memId` = 'admin',
`memPW` = '1234',
`memEmail` = 'admin@admin.com',
`memName` = '관리자',
`memNick` = '관리자',
`memPHNum` = '01000000000',
`delSatatus` = FALSE,
`admin` =  TRUE;

INSERT INTO `member`
SET `regDate` = NOW(),
`updateDate` = NOW(),
`memId` = 'user1',
`memPW` = '1234',
`memEmail` = 'user1@test.com',
`memName` = '김또치',
`memNick` = 'User1',
`memPHNum` = '01011111111',
`delSatatus` = FALSE,
`admin` =  FALSE;

# 회원 전체 조회
SELECT *
FROM `member`;

# 특정 회원 선택
#SELECT *
#FROM `member`
#WHERE `memId` = 'admin'

# 회원 정보 수정
#UPDATE `member`
#SET `memPW` = ,
#`memEmail` = ,
#`memNick` = ,
#`memPHNum` = 
#WHERE `memId` = ;

# 테이블 조회
SHOW TABLES;

# board 테이블 삭제
#DROP TABLE `board`;

# 게시판 테이블 생성
CREATE TABLE `board`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` CHAR(20) NOT NULL,
    `boardCode` CHAR(20) NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL,
    `memId` INT(20) UNSIGNED NOT NULL
);

# 테스트 게시판 생성
INSERT INTO `board`
SET `name` = '공지사항',
`boardCode` = 'notice',
`regDate` = NOW(),
`updateDate` = NOW(),
`memId` = 1;

INSERT INTO `board`
SET `name` = '자유',
`boardCode` = 'free',
`regDate` = NOW(),
`updateDate` = NOW(),
`memId` = 1;

# 게시판 조회
SELECT *
FROM `board`;

SELECT * 
FROM `reply`;

SELECT *
FROM `member`;

