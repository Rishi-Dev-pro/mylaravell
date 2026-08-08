<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>
    @include('header')
</head>
<body>

<h2>Employee Registration Form</h2>

<form action="{{ route('employee.register') }}" method="POST">
    @csrf

    <label>Employee Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br>
    @error('name')
        <span style="color: red;">{{ $message }}</span><br>
    @enderror
    <br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required><br>
    @error('email')
        <span style="color: red;">{{ $message }}</span><br>
    @enderror
    <br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="{{ old('phone') }}" required><br>
    @error('phone')
        <span style="color: red;">{{ $message }}</span><br>
    @enderror
    <br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    @error('password')
        <span style="color: red;">{{ $message }}</span><br>
    @enderror
    <br>

    <label>Confirm Password:</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">Register</button>
</form>

</body>
</html>