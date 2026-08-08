<!DOCTYPE html>
<html>
<head>
    <title>Employee Login</title>
    @include('header')
</head>
<body>

<h2>Employee Login</h2>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if($errors->has('login'))
    <div style="color: red; margin-bottom: 15px;">
        {{ $errors->first('login') }}
    </div>
@endif

<form action="{{ route('employee.login.submit') }}" method="POST">
    @csrf

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required><br>
    @error('email')
        <span style="color: red;">{{ $message }}</span><br>
    @enderror
    <br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    @error('password')
        <span style="color: red;">{{ $message }}</span><br>
    @enderror
    <br>

    <button type="submit">Login</button>
</form>

<br>
<p>Don't have an account? <a href="{{ route('employee.register') }}">Register here</a></p>

</body>
</html>
