<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "NotFound Title" }}</title>
</head>
<body>
    <h1>{{ $data ?? "NotFound Data Title" }}</h1>
    <p>{{ $description ?? "NotFound Data Description" }}</p>

    <span>{{ $id ?? "Route Parameter notFound" }}</span>

    <h4>Link : <a href="{{ route("products") }}">Click in Here</a></h4>
</body>
</html>
