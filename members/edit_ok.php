<?php
error_reporting(0);
/* 이전 페이지에서 값 가져오기 */
$pwd = $_POST["pwd"];
$birth = $_POST["birth"];
$postalCode = $_POST["postalCode"];
$addr1 = $_POST["addr1"];
$addr2 = $_POST["addr2"];
$email = $_POST["email_id"]."@".$_POST["email_dns"];
$mobile = $_POST["mobile"];


// 값 확인
echo "비밀번호 : ".$pwd."<br>";
echo "생년월일 : ".$birth."<br>";
echo "우편번호 : ".$postalCode."<br>";
echo "기본주소 : ".$addr1."<br>";
echo "상세주소 : ".$addr2."<br>";
echo "이메일 : ".$email."<br>";
echo "전화번호 : ".$mobile."<br>";



/*  DB 접속 */
include "../inc/dbcon.php"; 

// 자주사용하는 기능들은 별도로 저장하여 필요한 부분들에 불러올 수 있다.

/* 쿼리 작성 */
// insert into 테이블명(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date) values("홍길동", "hong", "1234", "20211203", "06253", "서울 강남구 강남대로 123 (푸르덴셜타워)", "123-456", "hong@abc.com", "01011112222", "2021-12-03");

// $sql = "insert into members(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date) values('홍길동', 'hong', '1234', '20211203', '06253', '서울 강남구 강남대로 123 (푸르덴셜타워)', '123-456', 'hong@abc.com', '01011112222', '2021-12-03');";
// echo $sql;

// $sql = "insert into members(u_name) values('".$u_name."');";
// $sql = "insert into members(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date) values('".$u_name."', '".$u_id."', '".$pwd."', '".$birth."', '".$postalCode."', '".$addr1."', '".$addr2."', '".$email."', '".$mobile."', '".$reg_date."');";
// echo $sql;

// $sql = "insert into members(u_name) values('$u_name');";
// $sql = "insert into members(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date) values('$u_name.', '$u_id', '$pwd', '$birth', '$postalCode', '$addr1', '$addr2', '$email', '$mobile', '$reg_date');";
// echo $sql;

$sql = "insert into members(";
$sql .= "u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date";
$sql .= ") values(";
$sql .= "'$u_name', '$u_id', '$pwd', '$birth', '$postalCode', '$addr1', '$addr2', '$email', '$mobile', '$reg_date'";
$sql .= ");";
echo $sql;

/* 데이터베이스에 쿼리 전송 */
// mysqli_query("연결객체", "전달할 쿼리");
mysqli_query($dbcon, $sql);


/* DB(연결) 종료 */
mysqli_close($dbcon);


/* 리디렉션 */
// echo "
//     <script type=\"text/javascript\">
//         // location.href = 'welcome.php';
//         location.href = \"welcome.php\";
//     </script>
// ";
// 
?>

<!-- <script type="text/javascript">
    location.href = "welcome.php";
</script> -->