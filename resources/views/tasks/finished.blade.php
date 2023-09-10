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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        <div class="">
                <p class="text-center mt-5 font-weight-bold" style="font-size:30px;">完了済タスク</p>
        </div>

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
              <td><a href="/task/{{ $task->id }}/restore" class="text-info" onclick="return confirm('こちらのタスクを復元してもよろしいでしょうか？')">復元</a></td>
              <td><a href="/task/{{ $task->id }}/edit" class="text-primary">編集</a></td>
              <td><a href="/task/{{ $task->id }}/delete" class="text-danger" onclick="return confirm('こちらのタスクを削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js?v=1"></script>
</body>

</html>
