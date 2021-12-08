<?php
//세션시작 
session_start();


//$s_id = isset(조건) ? A : B; 자바스크립트의 삼항연산자 
    
    $s_id = isset($_SESSION["s_id"]) ? $_SESSION["s_id"]:""; 
    $s_name = isset($_SESSION["s_name"]) ? $_SESSION["s_name"]:"";
    

    /*관리자가 아닌 경우 index문서로 이동*/
    if(!$s_id || ($s_id != "admin")){
        echo "
        <script type=\"text/javascript\">
            alert(\"관리자 로그인이 필요합니다.\");
            location.href = \"../index.php\";
        </script>
        ";
    };
// DB접속
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        a{··
            text-decoration: none;
            color: #000;
        }
        a:hover{
            background: #ff8800;
        }
    </style>
</head>
<body>
    <h2>* 관리자 페이지 *</h2>
        <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
         <p>
            <a href="#website/admin/admin.php" class="bar">홈으로</a>
            <!-- <a href="board/board_list.php">게시판 관리</a> -->
            <a href="#none" class="bar">게시판 관리
            <a href="members/list.php" class="bar">회원관리</a>
            <a href="../login/logout.php">로그아웃</a>
         </p>
    <hr>
    
</body>
</html>