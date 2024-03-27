<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="text-center">
    
    <form class="form-signin" action="authenticate.php" method="post">
        <img class="mb-4" src="logo.png" alt="" width="72" height="72"> <!-- Thay thế logo.png bằng logo thực của bạn -->
        <h1 class="h3 mb-3 font-weight-normal">Vui lòng đăng nhập</h1>
        <label for="inputEmail" class="sr-only">Tên đăng nhập</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Tên đăng nhập" required autofocus name="username">
        <label for="inputPassword" class="sr-only">Mật khẩu</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required name="password">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Ghi nhớ đăng nhập
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
