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
                <p class="text-center mt-5 font-weight-bold" style="font-size:30px;">タスクの編集</p>
                <form action="/update" method="post">
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
