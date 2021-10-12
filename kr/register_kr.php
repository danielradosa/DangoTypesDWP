<!DOCTYPE html>
<html lang="en">

<?php require('../public/header_kr.php'); ?>

<main>
    <h2 class="latest">가입하다</h2>
    <h4 class="site-desc">이 양식을 작성하여 등록</h4>
</main>

<div class="form-wrapper">
    <form action="public/register_pro.php" method="POST">
        <label for="registerMail">당신의 이메일</label> <br />
        <input type="email" id="registerMail" name="registerMail" placeholder="당신의 이메일" required />
        <br />
        <label for="registerPassword">비밀번</label> <br />
        <input type="password" id="registerPassword" name="registerPassword" placeholder="당신의 비밀번" required />
        <br />
        <label for="registerPasswordTwo">암호를 비밀번</label> <br />
        <input type="password" id="registerPasswordTwo" name="registerPasswordTwo" placeholder="암호를 비밀번" required />
        <br />
        <label for="subject">이미 계정이 있습니까? <a href="account_kr.php">여기에 로그인하십시오.</a></label>
        <br />
        <div class="form-buttons">
            <button type="submit" name="login" class="send" value="LOGIN">가입하다</button>
            <button type="reset" class="messup">양식을 재설정하십시오. 어떤 암호를 사용했는지 잊어버렸습니다...</button>
        </div>
    </form>
</div>
</body>

</html>