<?php
//세션시작 

    
    $s_id = isset($_SESSION["s_id"]) ? $_SESSION["s_id"]:""; 
    $s_name = isset($_SESSION["s_name"]) ? $_SESSION["s_name"]:"";
    

    if(!$s_id || ($s_id != "admin")){
        echo "
        <script type=\"text/javascript\">
            alert(\"관리자 로그인이 필요합니다.\");
            location.href = \"/index.php\";
        </script>
        ";
    };

?>