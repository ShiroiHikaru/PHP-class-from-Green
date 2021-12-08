<?php
//세션시작 
session_start();

include "../inc/admin_ss.php";


/* DB 접속 */
include "../../inc/dbcon.php";

/*쿼리 작성 */
$sql = "select * from members;";

/* 쿼리 전송 */
$result = mysqli_query($dbcon, $sql);

/* 결과 가져오기 */
//$array = mysqli_fetch_array($result); // for문
$num = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보수정</title>
    <style type="text/css">
        body{font-size:16px}
       table tr td{border: 1px solid #000; text-align: center;}
    </style>
    <script type="text/javascript">
        
    </script>
</head>
<body>
    <h2>* 관리자 페이지 *</h2>
        <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
         <p>
            <a href="../index.php" class="bar">홈으로</a>
            <!-- <a href="board/board_list.php">게시판 관리</a> -->
            <a href="#none" class="bar">게시판 관리
            <a href="members/list.php" class="bar">회원관리</a>
            <a href="../../login/logout.php">로그아웃</a>
         </p>
    <hr>

    <p>총 <?php echo $num; ?>명</p>
    <table>
        <tr>
            <td>번호</td>
            <td>이름</td>
            <td>아이디</td>
            <td>생년월일</td>
            <td>우편번호</td>
            <td>주소</td>
            <td>이메일</td>
            <td>전화번호</td>
            <td>가입일</td>
        </tr>

        <?php
            //for($i = 1; $i <= $num; $i++){};
            $i = 1;
            while($array = mysqli_fetch_array($result)){
        ?>
        <tr class="brd">
            <td><?php echo $i; ?></td>
            <td><?php echo $array["u_name"]; ?></td>
            <td><?php echo $array["u_id"]; ?></td>
            <td><?php echo $array["birth"]; ?></td>
            <td><?php echo $array["postalCode"]?></td>
            <td><?php echo $array["addr1"].$array["addr2"]; ?></td>
            <td><?php echo $array["email"]; ?></td>
            <td><?php echo $array["mobile"]; ?></td>
            <td><?php echo $array["reg_date"]; ?></td>
            <td><a href="edit.php">수정</a></td>
            <td><a href="delete.php">삭제</a></td>
        </tr>
        <?php 
            $i++;
            }; 
        ?>
    </table>
</body>
</html>