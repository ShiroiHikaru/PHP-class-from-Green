<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<style>
    body{font-size:18px}


</style>
<body>
    <h1>LOG-IN</h1>
    <form action="login_ok.php" method="post" name="login_ok" onsubmit="return login_check()">
        <fieldset>
            <legend>로그인하기</legend>
            <p>
                <label for="u_id">아이디</label>
                <input type="text" name="u_id" id="u_id" class="u_id">
                <span class="err_id"></span>
            </p>
            <p>
                <label for="pwd">비밀번호</label>
                <input type="password" name="pwd" id="pwd" class="pwd">
                <span class="err_pwd"></span>
            </p>
            <p class="btn_wrap">
                <button type="button" class="btn" onclick="history.back()">이전으로</button>
                <button type="submit" class="btn">로그인</button>
            </p>
        </fieldset>
    </form>
</body>

<script type="text/javascript">
    function login_check(){
        var uid = document.getElementById("u_id");
        var pwd = document.getElementById("pwd");

        if(uid.value == ""){
                var err_txt = document.querySelector(".err_id");
                err_txt.textContent = "아이디를 입력하세요.";
                uid.focus();
                return false;
            };
            var uid_len = uid.value.length;
            if( uid_len < 4 || uid_len > 12){
                var err_txt = document.querySelector(".err_id");
                err_txt.textContent = "아이디는 4~12글자만 입력할 수 있습니다.";
                uid.focus();
                return false;
            };

            if(pwd.value == ""){
                var err_txt = document.querySelector(".err_pwd");
                err_txt.textContent = "비밀번호를 입력하세요.";
                pwd.focus();
                return false;
            };
            var pwd_len = pwd.value.length;
            if( pwd_len < 4 || pwd_len > 8){
                var err_txt = document.querySelector(".err_pwd");
                err_txt.textContent = "비밀번호는 4~8글자만 입력할 수 있습니다.";
                pwd.focus();
                return false;
            };
    };
</script>
</html>