<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIREBOOK Register</title>
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
    <div class="container">
        <h2>VIREBOOK REGISTER</h2>
        <form id="registerForm" action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="options">
            <a href="{{ route('login.form') }}">Already have an account? Login!</a>
        </div>
    </div>
</body>
</html>