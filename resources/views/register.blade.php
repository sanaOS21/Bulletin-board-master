<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
</head>

<body>
  <form action="{{route('register')}}" method="post">
    <p>新規登録</p>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <label for="">ユーザー名:</label>
    <input type="text" name="username" value="{{ old('username')}}"><br>
    <label for="">メールアドレス:</label>
    <input type="text" name="email" value="{{ old('email')}}"><br>
    <label for="">パスワード:</label>
    <input type="text" name="password" value="{{ old('password')}}"><br>
    <label for="">パスワード確認:</label>
    <input type="text" name="password_confirmation" value="{{ old('password_confirmation')}}">
    @csrf
    <input type="submit" value="新規登録" onclick="return confirm('登録してよろしいですか。')">
  </form>


</body>

</html>
