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