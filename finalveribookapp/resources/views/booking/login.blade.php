<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIREBOOK Login</title>
    <link rel="stylesheet" href="/css/logInCss.css">
</head>
<body>
    <div class="container">
        <h2>VIREBOOK LOGIN</h2>
        <form id="loginForm" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
        <div class="options">
            <a href="{{ route('register.form') }}">Don't have an account? Register!</a>
            <br>
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </div>
</body>
</html>