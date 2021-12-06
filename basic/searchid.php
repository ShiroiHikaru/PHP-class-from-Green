<!DOCTYPE html>
<html lang="ko">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>아이디 찾기</title>
</head>
<body>
      <form action="result.html" name="search" method="get" onsubmit="return check_id()">
            <fieldset>
                  <legend>아이디입력</legend>
                  <p>
                        <label for="id">아이디</label>
                        <input type="text" name="input_id" id="input_id" autofocus>
                        <span class="err_id"></span>
                        <button type="submit" onclick="check()">검색</button>
                  </p>
            </fieldset>
      </form>
      
</body>
<script>
      function check(){
        
        var input_id = document.getElementById("input_id");

       
        if(input_id.value == ""){
            var er_msg = document.querySelector(".err_id");
            er_msg.textContent = "아이디를 입력해 주세요.";
            input_id.focus();
            return false;
        };

        var uid_len = input_id.value.length;
        if(uid_len < 4 || uid_len > 10){
            var err_msg = document.querySelector(".err_id");
            err_msg.textContent = "아이디는 최소 4글자, 최대 10글자 까지 입력할 수 있습니다.";
            input_id.focus();
            return false;
        };

        window.open("check_id.html", "", "width=600 height=400 left=0 top=0");
    };
    </script>
</html>