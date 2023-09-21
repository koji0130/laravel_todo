<!-- ①topページを表示させる -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>

<body class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <p class="navbar-brand" style="margin:0 auto;">TODOアプリ</p>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="">TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">完了したタスク</a>
        </li>
      </ul>
    </div>
  </nav>
                <p class="text-center mt-5 font-weight-bold" style="font-size:30px;">今日は何する？</p>
                <form action="" method="">
                  @csrf
                        <input type="text" name="task_name" class="form-control form-control-lg" placeholder="洗濯物をする..." style="margin:0 auto; width:40%;"/>
                    <button type="submit" class="btn btn-success" style="display:block; margin:0 auto; margin-top:40px; margin-bottom:40px; width:20%;">
                        追加する
                    </button>
                </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js?v=1"></script>
</body>

</html>

<!-- ②タスクの登録をできるようにする -->
<!-- formタグのaction属性とmethodを下記のように記載する -->
<form action="/task" method="post">

<!-- ③タスクの内容を表示させる -->
        <table class="table" style="margin:0 auto; width:50%;">
          <thead class="thead-light">
            <tr>
              <th>タスク一覧</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $task->content}}</td>
              <td><a href="" class="text-success">完了</a></td>
              <td><a href="" class="text-primary">編集</a></td>
              <td><a href="" class="text-danger" onclick="return confirm('こちらのタスクを削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
<!-- ④タスクの編集を行う -->
<!-- aタグのhref属性下記のように記載する -->
              <td><a href="/task/{{ $task->id }}/edit" class="text-primary">編集</a></td>
<!-- ⑤編集画面の表示 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>

<body class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <p class="navbar-brand" style="margin:0 auto;">TODOアプリ</p>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="">TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">完了したタスク</a>
        </li>
      </ul>
    </div>
  </nav>
                <p class="text-center mt-5 font-weight-bold" style="font-size:30px;">タスクの編集</p>
                <form action="" method="">
                  @csrf
                        <input type="text" name="task_name" class="form-control form-control-lg" value="{{ $task->content }}" style="margin:0 auto; width:40%;"/>
                        <input type="hidden" name="id" value="{{ $task->id}}"/>
                    <button type="submit" class="btn btn-success" style="display:block; margin:0 auto; margin-top:40px; margin-bottom:40px; width:20%;">
                        編集する
                    </button>
                </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js?v=1"></script>
</body>

</html>
<!-- ⑥タスクの編集をできるようにする -->
<!-- formタグのaction属性とmethodを下記のように記載する -->
<form action="/update" method="post">

<!-- ⑦タスクの削除を行う -->
<!-- aタグのhref属性下記のように記載する -->
              <td><a href="/task/{{ $task->id }}/delete" class="text-danger" onclick="return confirm('こちらのタスクを削除してもよろしいでしょうか？')">削除</a></td>

<!-- ⑧タスクの完了処理を行う -->
<!-- aタグのhref属性下記のように記載する -->
              <td><a href="/tasked/{{ $task->id }}" class="text-success">完了</a></td>
<!-- ⑨完了したタスクの表示を行う -->
<!-- aタグのhref属性下記のように記載する -->
<a class="nav-link" href="/finished/task">完了したタスク</a>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>

<body class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <p class="navbar-brand" style="margin:0 auto;">TODOアプリ</p>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/top">TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/finished/task">完了したタスク</a>
        </li>
      </ul>
    </div>
  </nav>
        <p class="text-center mt-5 font-weight-bold" style="font-size:30px;">完了済タスク</p>

        <table class="table" style="margin:0 auto; width:50%;">
          <thead class="thead-light">
            <tr>
              <th>タスク一覧</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $task->content}}</td>
              <td><a href="" class="text-info" onclick="return confirm('こちらのタスクを復元してもよろしいでしょうか？')">復元</a></td>
              <td><a href="" class="text-primary">編集</a></td>
              <td><a href="" class="text-danger" onclick="return confirm('こちらのタスクを削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js?v=1"></script>
</body>

</html>
<!-- ⑩完了したタスクの復元の処理を行う -->
<!-- aタグのhref属性下記のように記載する -->
<td><a href="/task/{{ $task->id }}/restore" class="text-info" onclick="return confirm('こちらのタスクを復元してもよろしいでしょうか？')">復元</a></td>
