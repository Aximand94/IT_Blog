<?php
echo <<<END
<!-- Footer -->
<footer class="container-fluid">
    <div class="footer-content container">
        <div class="row">
            <div class="footer-section col-md-4 col-12">
                <h3>About</h3>
                <p>blog text</p>
                <div class="contacts">
                    <span><i class="foo-email">sdrwe@gmail.com</i></span>
                    <span><i class="foo-phone">+10050073278</i></span>
                </div>
            </div>

            <div class="social col-md-2 col-12">
                <h3>Social</h3>
                <ul>
                    <li><a href="#"><i class="social-btn">VK</i></a></li>
                    <li><a href="#"><i class="social-btn">Facebook</i></a></li>
                    <li><a href="#"><i class="social-btn">Instagram</i></a></li>
                    <li><a href="#"><i class="social-btn">Twitter</i></a></li>
                </ul>
            </div>
            <div class="form-contact col-md-6 col-12">
                <h3>Свяжитесь с нами в случае проблеммы используя форму ниже:</h3>
                <form action="#" method="post">
                    <input type="email" class="form-control" name="cf-useremail" placeholder="send your email...">
                    <textarea class="form-control"></textarea>
                    <input type="submit" class="btn btn-primary" value="Отправить">
                </form>
            </div>
        </div>
    </div>
</footer>
END;