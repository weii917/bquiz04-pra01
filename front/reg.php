<h2 class="ct">會員註冊</h2>

<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc">
            <button onclick="chkacc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>

</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button>
</div>
<script>
    function chkacc() {
        $.post("./api/chkacc.php", {
            acc: $("#acc").val()
        }, (res) => {
            if (parseInt(res) == 1 || $("#acc").val() == 'admin') {
                alert(`此帳號${$("#acc").val()}已存在`)
            } else {
                alert(`此帳號${$("#acc").val()}可使用`)

            }
        })
    }

    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            tel: $("#tel").val(),
            addr: $("#addr").val(),
            email: $("#email").val(),
            name: $("#name").val()
        }
        $.post("./api/chkacc.php", {
            acc: user.acc
        }, (res) => {
            if (parseInt(res) == 1 || user.acc == 'admin') {
                alert(`此帳號${user.acc}已存在`)
            } else {
                $.post("./api/save_mem.php", user, () => {
                    alert("註冊成功")
                    location.reload();
                })

            }
        })

    }

    function clean() {
        $("input[type='text'],input[type='password'],input[type='number'],input[type='radio']").val("");
    }
</script>