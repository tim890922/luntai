<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Document
    </title>
</head>

<body>
    <h1>
        登入
    </h1>
    @if (isset($err))
        {{ $err }}
    @endif
    <form action="login" method="post">
        <input name="account" type="text">
        <input name="pass_word" type="password">
        <input type="submit" value="登入">
        @csrf
    </form>

</body>

</html>
