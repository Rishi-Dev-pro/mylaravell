<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    @include('header')
</head>
<body>

<h2>Employee Dashboard</h2>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<div>
    <h3>Welcome, {{ session('employee_name', 'Employee') }}!</h3>
    <p><strong>Employee ID:</strong> {{ session('employee_id', 'N/A') }}</p>
</div>

<hr>

<div>
    <h3>Profile & Personal Information</h3>
    <p><em>(Personal information details will be displayed here)</em></p>
</div>

<div>
    <h3>Salary Information</h3>
    <p><em>(Salary details will be displayed here)</em></p>
</div>

<div>
    <h3>Attendance</h3>
    <p><em>(Attendance record will be displayed here)</em></p>
</div>

<div>
    <h3>Other Employee Information</h3>
    <p><em>(Additional details will be displayed here)</em></p>
</div>

<hr>

<div>
    <form action="{{ route('employee.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
</div>

</body>
</html>
