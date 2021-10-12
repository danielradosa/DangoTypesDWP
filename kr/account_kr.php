<!DOCTYPE html>
<html lang="en">

<?php require('../public/header_kr.php'); ?>

<main>
    <h2 class="latest">로그인</h2>
    <h4 class="site-desc">계정 정보를 입력하여 로그인</h4>
</main>

<div class="form-wrapper">
    <form action="public/login_pro.php" method="POST">
        <label for="loginMail">이메일</label> <br />
        <input type="email" id="loginMail" name="loginMail" placeholder="당신의 이메일" required />
        <br />
        <label for="yourEmail">비밀번</label> <br />
        <input type="password" id="loginPassword" name="loginPassword" placeholder="당신의 비밀번" required />
        <br />
        <label for="subject">아직 계좌가 없습니까? <a href="register_kr.php">여기에 등록하세요.</a></label>
        <br />
        <div class="form-buttons">
            <button type="submit" name="login" class="send" value="LOGIN">로그 인</button>
            <button type="reset" class="messup">어머나, 비밀번호를 잊어버렸어...</button>
        </div>
    </form>
</div>
</body>

</html>