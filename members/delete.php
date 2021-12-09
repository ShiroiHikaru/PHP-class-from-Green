<?php
//$u_idx = $_GET["idx"]
session_start();
$u_idx = $_GET['u_idx'];
// echo $idx;
//exit;




/*  DB 접속 */
include "../inc/dbcon.php"; 
// 자주사용하는 기능들은 별도로 저장하여 필요한 부분들에 불러올 수 있다.

/* 쿼리 작성 */
$sql = "delete from members where idx=$u_idx;";
//echo $sql;
//exit;

/* 데이터베이스에 쿼리 전송 */
// mysqli_query("연결객체", "전달할 쿼리");
mysqli_query($dbcon, $sql);



/* DB(연결) 종료 */
mysqli_close($dbcon);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"list.php\";
    </script>
";
?>