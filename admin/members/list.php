<?php
//세션시작 
session_start();
error_reporting(0);

include "../inc/admin_ss.php";


/* DB 접속 */
include "../../inc/dbcon.php";

/*쿼리 작성 */
$sql = "select * from members;";

/* 쿼리 전송 */
$result = mysqli_query($dbcon, $sql);

/* 결과 가져오기 */
//$array = mysqli_fetch_array($result); // for문
//$num = mysqli_num_rows($result);

/* paging : 전체 데이터 수 */
$num = mysqli_num_rows($result);

/* paging : 한 페이지당 데이터 갯수 */
$list_num = 5;

/* paging : 한 블럭 당 페이지 수 */
$page_num = 3;

/* paging : 현재 페이지 */
$page = isset($_GET["page"])? $_GET["page"] : 1;

/* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 갯수, ceil(올림값) / floor(내림값) / round(반올림)  */
$totalPG =  ceil($num / $list_num);

echo "전체 페이지 수 : ".$totalPG;

/* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
$totalBK = ceil($totalPG / $page_num);

/* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
$nowBK = ceil($page / $page_num);

/* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭 당 페이지 수 + 1 */
$SpageNum = ($nowBK - 1) * $page_num + 1;
// 데이터가 0개인 경우 
if($SpageNum <= 0){
    $SpageNum = 1;
};

/* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
$EpageNum = $nowBK * $page_num;
// 마지막 번호가 전체 페이지 수를 넘지 않도록
if($EpageNum > $totalPG){
    $EpageNum = $totalPG;
};

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
        table tr td {padding:5px;}
        table .title{border: 1px solid #000; text-align: center; background: #ccc;}
        table .brd{border-bottom : 1px solid #ccc;}

        .cont-btn{
            border: 1px solid #aaa;
            border-radius: 10px;
        }

        .cont-btn a{
            text-decoration : none;
            color: #000;
        }

        .cont-btn:hover{background: #0088ff;}
        .cont-btn a:hover{color: #fff;}
    </style>
    <script type="text/javascript">
           function del_check(idx){
            var i = confirm("정말 삭제하시겠습니까?\n삭제한 아이디는 복원하실 수 없습니다.")
            if(i == true){
                location.herf = "delete.php?u_idx="+idx;
            };
        };
    </script>
</head>
<body>
    <h2>* 관리자 페이지 *</h2>
        <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
         <p>
            <a href="../../index.php" class="bar">홈으로</a>
            <!-- <a href="board/board_list.php">게시판 관리</a> -->
            <a href="#none" class="bar">게시판 관리
            <a href="members/list.php" class="bar">회원관리</a>
            <a href="../../login/logout.php">로그아웃</a>
         </p>
    <hr>

    <p>총 <?php echo $num; ?>명</p>
    <table>
        <tr class="title">
            <td>번호</td>
            <td>이름</td>
            <td>아이디</td>
            <td>생년월일</td>
            <td>우편번호</td>
            <td>주소</td>
            <td>이메일</td>
            <td>전화번호</td>
            <td>가입일</td>
            <td>수정</td>
            <td>삭제</td>
        </tr>

        <?php
            //for($i = 1; $i <= $num; $i++){};
            // $i = 1;
            // while($array = mysqli_fetch_array($result)){

            /*paging : 시작 번호 = (현재 페이지 번호)*/
            $start = ($page - 1) * $list_num;

            /*paging : 쿼리 작성 - limit 인덱스 : 몇개
                select * from members;*/
            $sql = "select * from members limit $start, $list_num;";

            /*paging : 쿼리전송*/
            $result = mysqli_query($dbcon, $sql);
            
            /*paging : 쿼리전송*/
            $cnt = $start + 1;
            /* paging : 회원 정보 가져오기(반복) */
            while($array = mysqli_fetch_array($result)){

        ?>
        <tr class="brd">
            <td><?php echo $cnt; ?></td>
            <td><?php echo $array["u_name"]; ?></td>
            <td><?php echo $array["u_id"]; ?></td>
            <td><?php echo $array["birth"]; ?></td>
            <td><?php echo $array["postalCode"]?></td>
            <td><?php echo $array["addr1"].$array["addr2"]; ?></td>
            <td><?php echo $array["email"]; ?></td>
            <td><?php echo $array["mobile"]; ?></td>
            <td><?php echo $array["reg_date"]; ?></td>
            <td class="cont-btn"><a href="edit.php?u_idx=<?php echo $array["idx"]; ?>">수정</a></td>
            <td class="cont-btn"><a href="#" onclick="del_check(<?php echo $array["idx"]; ?>)">삭제</a></td>
        </tr>
        <?php 
            $cnt++;
        };
        ?>
    </table>
    <p class="pager">
        <?php
          /* paging : 이전 페이지 */
        if($page <= 1){
         ?>
         이전
         <?php  } else{ ?>
         <a href="list.php?page=<?php echo($page-1); ?>">이전</a>
        <?php }; ?>   
  

        <?php
        /* 페이지 번호 출력 */
        for($print_page = $SpageNum; $print_page <= $EpageNum; $print_page++){
            ?>
            <a href="list.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
        <?php }; ?>
        
           
        <?php
        /* 다음 페이지 */
        if($page >= $totalPG){
        ?>
        다음    
        <?php } else{ ?>
            <a href="list.php?page=<?php echo ($page+1); ?>">다음</a>
        <?php };?>
    </p>
</body>
</html>