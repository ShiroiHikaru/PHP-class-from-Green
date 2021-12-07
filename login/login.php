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
    <form action="" method="get" name="login">
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
            </p>
            <p class="forget">
                <button type="button" name="join" id="join" class="join">이전으로</button>
                <button type="button" name="key" id="key" class="key" onsubmit="return login_check()">로그인</button>
            </p>
        </fieldset>
    </form>
</body>

<script type="text/javascript">
    function login() {
        var uid = document.getElementById("u_id")
        if(uid.value == ""){
                var err_txt = document.querySelector(".err_id");
                err_txt.textContent = "아이디를 입력하세요.";
                uid.focus();
                return false;
        };
    }
</script>
</html>