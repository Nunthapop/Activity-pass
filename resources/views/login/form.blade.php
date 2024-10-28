<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
</head>

<body>
    <div class="login-container">
        <!-- ฟอร์มการเข้าสู่ระบบ -->
        <form action="{{ route('authenticate') }}" method="post" class="login-form">
            @csrf <!-- ป้องกันการโจมตี CSRF -->

            <!-- ฟิลด์สำหรับกรอกอีเมล -->
            <label class="form-label">
                E-mail 
                <input type="text" name="email" required class="form-input" />
            </label><br />

            <!-- ฟิลด์สำหรับกรอกรหัสผ่าน -->
            <label class="form-label">
                Password 
                <input type="password" name="password" required class="form-input" />
            </label><br />

            <!-- ปุ่มเข้าสู่ระบบ -->
            <button type="submit" class="submit-button">Log-in</button>

            <!-- แสดงข้อผิดพลาดเมื่อข้อมูลไม่ถูกต้อง -->
            @error('credentials')
                <div class="warn">{{ $message }}</div>
            @enderror
        </form>
    </div>
</body>

</html>
