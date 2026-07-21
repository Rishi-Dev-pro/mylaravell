<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
    @include('header')
</head>
<body>

<h2>Employee Registration Form</h2>

<form action="" method="POST">
    @csrf
    <label>Employee ID:</label><br>
    <input type="text" name="emp_id"><br><br>

    <label>Employee Name:</label><br>
    <input type="text" name="emp_name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Department:</label><br>
    <input type="text" name="department"><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary"><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>