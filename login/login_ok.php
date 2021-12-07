<?php
/* 세션 시작 */
session_start();


// 이전 페이지에서 값 가져오기
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];

echo "ID : ".$u_id." / PW : ".$pwd;

/* DB접속 */
include "../inc/dbcon.php"; 


/* 쿼리작성 */
$sql = "select idx, u_name, u_id, pwd, from members where u_id='$u_id';";

echo $sql;

/* 쿼리 전송(연결 객체) */
$result = mysqli_query($dbcon, $sql);

// DB에서 결과값 가져오기
//mysqli_fetch_row // 피드 순서
//mysqli_fetch_array // 필드명
//mysqli_num_rows // 결과행의 갯수
$num = mysqli_num_rows($result); //<< 변수저장
//echo

/* 조건 처리 */
//아이디가 존재하면


if($num){//아이디가 존재하지 않으면
    // 메세지 출력 후 이전 페이지로 이동
    echo "
        <script type=\"text/javascript\">
            alert(\"일치하는 아이디가 없습니다.\");
            history.back();
        </script>
    ";
    exit;
} else{ // 아이디가 존재하면

        // DB에서 사용자 정보 가져오기
        $array = mysqli_fetch_array($result);
        //$g_idx = $array["idx"];        
        //$g_u_name = $array["u_name"];
        //$g_u_id = $array["u_id"];
        $g_pwd = $array["pwd"];

        //사용자가 입력한 비밀번호와 DB에 저장된 비밀번호가 일치하지 않는다면
        if($pwd != $g_pwd){
            echo "
            <script type=\"text/javascript\">
                alert(\"비밀번호가 일치하지 않습니다.\");
                history.back();
            </script>
        ";
        exit; 
    } else{ // 비밀번호가 일치한다면
        // 세션 변수 생성
        //$_SESSION["세션변수명"] = 저장할 값;

    }
};



/* DB연결 종료 */




/* 
history.back - 뒤로가기
history.foword - 앞으로 가기
history.go(-2) - 페이지 만큼 뒤로가기 
?>
