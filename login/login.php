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
            </p>
            <p>
                <label for="pwd">비밀번호</label>
                <input type="password" name="pwd" id="pwd" class="pwd">
            </p>
            <p class="forget">
                <button type="button" name="join" id="join" class="join">회원가입</button>
                <button type="button" name="search" id="search" class="search">아이디/비밀번호 찾기</button>
            </p>
            <p>
                <button type="" name="key" id="key" class="key">로그인하기</button>
            </p>
        </fieldset>
    </form>
</body>
</html>