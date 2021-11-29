<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dangky.css">
</head>

<body>
    <h2>Chào mừng bạn đến với hiệu sách BOOKBUY</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="xuly.php" method="POST">
                <h1>Đăng ký</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus"></i></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                </div>
                <span>hoặc dùng email của bạn để đăng ký</span>
                <input type="text" placeholder="Name" required name="txtUsername" />
                <input type="email" placeholder="Email" required name="txtEmail" />
                <input type="password" placeholder="Password" required name="txtPassword" />
                <button>Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action='dangnhap.php' method='POST'>
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus"></i></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                </div>
                <span>hoặc dùng tài khoản của bạn</span>
                <input type="text" placeholder="Username" name="txtEmail" />
                <input type="password" placeholder="Password" name="txtPassword" />
                <a href="#">Quên mật khẩu?</a>
                <button name="dangnhap">Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trở lại!</h1>
                    <p>Để giữ liên lạc với hiệu sách chúng tôi vui lòng đăng nhập </p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào bạn!</h1>
                    <p>Hãy đăng kí tài khoản mới và mua sắm sách nào</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
</script>

</html>