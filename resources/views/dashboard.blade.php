<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h1>Halo, {{ Auth::user()->nama }}!</h1>
    <p>Email: {{ Auth::user()->email }}</p>

    <a href="/logout">
        <button>Logout</button>
    </a>
</body>

</html>