<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了</title>
</head>

<body>
  <form action="{{route('added')}}" method="post">
    <p>登録ありがとうございます</p>
    <a href="/login">
      <input type="submit" value="ログイン画面へ"></a>
  </form>
</body>

</html>
