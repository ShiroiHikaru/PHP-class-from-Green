<?php

$user_n = $_POST["user_nm"];
$user_i = $_POST["user_id"];
$pw = $_POST["pass"];
$bd = $_POST["bday"];
$zip = $_POST["zip"];
$add01 = $_POST["add1"];
$add02 = $_POST["add2"];
$em = $_POST["emid"]."@".$_POST["emdm"];
$moblie = $_POST["mobile"];
$reg_date = date("Y-m-d");



// 값 확인
echo "이름 : ".$user_n."<br>";
echo "아이디 : ".$user_i."<br>";
echo "비밀번호 : ".$pw."<br>";
echo "생년월일 : ".$bd."<br>";
echo "우편번호 : ".$zip."<br>";
echo "기본주소 : ".$add01."<br>";
echo "상세주소 : ".$add02."<br>";
echo "이메일 : ".$em."<br>";
echo "전화번호 : ".$moblie."<br>";
echo "가입일 : ".$reg_date;


$dbcon = mysqli_connect("localhost", "root", "", "front") or die("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8");


$sql = "insert into joinlist(";
$sql .= "user_n, user_i, pw, bd, zip, add01, add02, em, mobile, reg_date";
$sql .= ") values(";
$sql .= "'$user_n', '$user_i', '$pw', '$bd', '$zip', '$add01', '$add02', '$em', '$mobile', '$reg_date'";
$sql .= ");";

echo $sql;



mysqli_query($dbcon, $sql);

/*DB(연결) 종료 */
// parameter : 값이 필요한 오류.
mysqli_close($dbcon);


/* 리디렉션 */
echo "
    <script type=\"text/javascrip\">
        location.herf = \"result.php\";
    </scirpt>
";
?>