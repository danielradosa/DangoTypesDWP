<!DOCTYPE html>
<html lang="kr">
   
    <?php require('../public/header_kr.php')  ?>

        <main>
            <h2 class="latest">질문 있습니까?</h2>
            <h4 class="site-desc">이 양식을 작성하여 문의해 주십시오</h4>
        </main>

        <div class="form-wrapper">
            <form action="../public/contact_form.php" method="POST">
                <label for="name">정식 이름 ✍🏻</label> <br />
                <input
                    type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="정식 이름"
                    required
                />
                <br />
                <label for="yourEmail">당신의 이메일 📧</label> <br />
                <input
                    type="email"
                    id="customerEmail"
                    name="customerEmail"
                    placeholder="당신의 이메일"
                    required
                />
                <br />
                <label for="subject"
                    >우리에게 연락한 이유가 무엇입니까? 🧐</label
                >
                <br />
                <select id="subject" name="subject">
                    <option value="basic">주제 선택</option>
                    <option value="general">질문이 있습니다</option>
                    <option value="collaboration">
                    공동 작업을 제안하고 싶습니다
                    </option>
                    <option value="other">
                    다른 생각이 있어요
                    </option>
                </select>
                <br />
                <label for="message">우리에게 보내는 당신의 메시지 👨🏻‍💻</label> <br />
                <textarea
                    name="message"
                    id="message"
                    cols="40"
                    rows="6"
                ></textarea
                ><br />
                <div class="form-buttons">
                    <button type="submit" class="send">부치다</button>
                    <button type="reset" class="messup">잠깐, 내가 망쳤어...</button>
                </div>
            </form>
        </div>
    </body>
</html>
