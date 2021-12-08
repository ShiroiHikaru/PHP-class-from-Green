<?php
error_reporting(0);
session_start();


/* 로그인 사용자 */
$s_idx = isset($_SESSION['s_idx'])?
$_SESSION['s_idx']:0;

/* DB 접속 */
include "../inc/dbcon.php";

/*쿼리 작성 */
$sql = "select * from members where idx=$s_idx;";

/* 쿼리 전송 */
$result = mysqli_query($dbcon, $sql);

/* 결과 가져오기 */
$array = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보수정</title>
    <style type="text/css">
        body,select,option,button{font-size:16px}
        input{border:1px solid #999;font-size:14px;padding:5px 10px}
        input,button,select,option{vertical-align:middle}
        form{width:700px;margin:auto}
        input[type=checkbox]{width:20px;height:20px}
        span{font-size:14px;color:#f00}
        legend{font-size:20px;text-align:center}
        p span{display:block;margin-left:130px}
        .txt{display:inline-block;width:120px}
        .btn{background:#fff;border:1px solid #999;font-size:14px;padding:4px 10px}
        .btn_wrap{text-align:center}
        .email_sel{width:120px;height:28px}
        .postal_code{width:100px;margin-bottom:5px}
        .addr1{width:300px;margin-bottom:5px}
        .addr2{width:300px;margin-bottom:5px}
    </style>
    <script type="text/javascript">
        function edit_check(){
            
            // 객체 생성
            var pwd = document.getElementById("pwd");
            var repwd = document.getElementById("repwd");
            var mobile = document.getElementById("mobile");

            if(pwd.value){
            var pwd_len = pwd.value.length;
            if( pwd_len < 4 || pwd_len > 8){
                var err_txt = document.querySelector(".err_pwd");
                err_txt.textContent = "비밀번호는 4~8글자만 입력할 수 있습니다.";
                pwd.focus();
                return false;
                };
            };

            if(pwd.value){
                var err_txt = document.querySelector(".err_repwd");
                err_txt.textContent = "비밀번호를 확인해 주세요.";
                repwd.focus();
                return false;
                };
            };

            if(mobile.value){
                var reg_mobile = /^[0-9]+$/g;
                if(!reg_mobile.test(mobile.value)){
                    var err_txt = document.querySelector(".err_mobile");
                    err_txt.textContent = "전화번호는 숫자만 입력할 수 있습니다.";
                    mobile.focus();
                    return false;
                };
            };
        };

        function change_email(){
            var email_dns = document.getElementById("email_dns");
            var email_sel = document.getElementById("email_sel");

            var idx = email_sel.options.selectedIndex;

            var sel_txt = email_sel.options[idx].value;
            email_dns.value = sel_txt;
        };

        function id_search(){
            window.open("search_id.php", "", "width=600, height=250, left=0, top=0");
        };

        function addr_search(){
            window.open("search_addr.php", "", "width=600, height=400, left=0, top=0");
        };
    </script>
</head>
<body>
    <form name="edit_form" action="edit_ok.php" method="post" onsubmit="return edit_check()">
        <fieldset>
            <legend>정보수정</legend>
            <p>
                <p class="txt">이름</span>
                <?php echo $array["u_name"]; ?>
            </p>

            <p>
                <p class="txt">아이디</span>
                <?php echo $array["u_id"]; ?>
            </p>

            <p>
                <label for="pwd" class="txt">비밀번호</label>
                <input type="password" name="pwd" id="pwd" class="pwd">
                <br>
                <span class="err_pwd">* 비밀번호는 4~8글자만 입력할 수 있습니다.</span>
            </p>

            <p>
                <label for="repwd" class="txt">비밀번호 확인</label>
                <input type="password" name="repwd" id="repwd" class="repwd">
                <br>
                <span class="err_repwd"></span>
            </p>

            <p>
                <?php
                    //str_replace("어떤 문자를", "어떤 문자로", "어떤 문장에서");
                    $birth = str_replace("-", "", $array["birth"]);
                ?>
                <label for="repwd" class="txt">생년월일</label>
                <input type="text" name="birth" id="birth" class="birth" value="<?php echo $birth; ?>">
                <br>
                <span>* ex) 20211022</span>
            </p>

            <p>
                <label for="postalCode" class="txt">주소</label>
                <input type="text" name="postalCode" id="postalCode" class="postal_code" value="<?php echo $array["postalcode"]; ?>">
                <button type="button" class="btn" onclick="addr_search()">주소검색</button>
                <br>
                <label for="addr1" class="txt">기본주소 </label>
                <input type="text" name="addr1" id="addr1" class="addr1" value="<?php echo $array["addr1"]; ?>">
                <br>
                <label for="addr2" class="txt">상세주소 </label>
                <input type="text" name="addr2" id="addr2" class="addr2" value="<?php echo $array["addr2"]; ?>">
            </p>

            <p>
                <?php
                    //explode("기준문자", "어떤 문장에서");
                    $email = explode("@", $array["email"]);
                ?>
                <label for="" class="txt">이메일</label>
                <input type="text" name="email_id" id="email_id" class="email_id" value="<?php echo $email[0]; ?>"> @ 
                <input type="text" name="email_dns" id="email_dns" class="email_dns" value="<?php echo $email[1]; ?>"> 
                <select name="email_sel" id="email_sel" class="email_sel" onchange="change_email()">
                    <option value="">직접 입력</option>
                    <option value="naver.com">NAVER</option>
                    <option value="hanmail.net">DAUM</option>
                    <option value="gmail.com">GOOGLE</option>
                </select>
            </p>
            
            <p>
                <label for="mobile" class="txt">전화번호</label>
                <input type="text" name="mobile" id="mobile" class="mobile" value="<?php echo $array["mobile"]; ?>">
                <br>
                <span class="err_mobile">"-"없이 숫자만 입력</span>
            </p>


            <p class="btn_wrap">
                <button type="button" class="btn" onclick="history.back()">이전으로</button>
                <button type="button" class="btn" onclick="location.herf='../index.php'">홈으로</button>
                <button type="submit" class="btn">정보수정</button>
            </p>
        </fieldset>
    </form>
 
</body>
</html>