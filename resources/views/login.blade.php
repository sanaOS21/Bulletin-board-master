<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
</head>

<body>
  <form action="{{route('login')}}" method="post">
    <p>ログイン</p>
    <label for="">メールアドレス: </label>
    <input type="text" value=""><br>
    <label for="">パスワード:</label>
    <input type="text" value=""><br>
    <input type="submit" value="ログイン">
    <p>新規登録は<nobr><a href="{{ route('register')}}">こちら</a></p>
  </form>
</body>

</html>
