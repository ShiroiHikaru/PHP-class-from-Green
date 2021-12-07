<?php
//세션시작 
session_start();


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        a{
            text-decoration: none;
            color: #000;
        }
        a:hover{
            background: #ff8800;
        }
    </style>
</head>
<body>
    <h2>* 인덱스 *</h2>
    <p>인덱스 문서입니다.</p>

    <!-- 로그인 전 -->
    <p>
        <a href="login/login.php">로그인</a>
        <a href="members/join.php">회원가입</a>
    </p>

    <!-- 로그인 후 -->
    <p>
        <!-- 관리자 로그인 -->
        <a href="">관리자</a>
        <a href="">로그아웃</a>
        <a href="">정보수정</a>
    </p>    
</body>
</html>