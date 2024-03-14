<h3>管理登入</h3>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo "$a + $b =";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('admin')">確定</button>
</div>

<script>
    function login(table) {
        let ans = $("#ans").val();
        $.post("./api/chk_ans.php", {
            ans
        }, (res) => {
            if (parseInt(res) == 0) {
                alert("對不起，您輸入的驗證碼有誤請您重新輸入");
            } else {
                $.post("./api/chk_pw.php", {
                    table,
                    acc: $("#acc").val(),
                    pw: $("#pw").val()
                }, (res) => {
                    if (parseInt(res) == 1) {
                        location.href = "back.php";
                    } else {
                        alert("帳號或密碼錯誤，請重新輸入");

                    }
                })
            }
        })
    }
</script>