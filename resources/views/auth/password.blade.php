<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/auth/password.css') }}">
</head>
<body>
    <div class="container">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <h2>Reset Password</h2>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
