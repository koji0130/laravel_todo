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
        <form action="/search" class="form-inline my-2 my-lg-0">
          <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="タスク検索">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
        </form>
    </div>
  </nav>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('success_update'))
    <div class="alert alert-primary">
        {{ session('success_update') }}
    </div>
    @endif
    @if(session('success_delete'))
    <div class="alert alert-danger">
        {{ session('success_delete') }}
    </div>
    @endif
    @if(session('success_restore'))
    <div class="alert alert-info">
        {{ session('success_restore') }}
    </div>
    @endif
        <div class="">
                <p class="text-center mt-5 font-weight-bold" style="font-size:30px;">今日は何する？</p>
                <form action="/task" method="post">
                  @csrf
                        <input type="text" name="task_name" class="form-control form-control-lg" placeholder="洗濯物をする..." style="margin:0 auto; width:40%;"/>
                    <button type="submit" class="btn btn-success" style="display:block; margin:0 auto; margin-top:40px; margin-bottom:40px; width:20%;">
                        追加する
                    </button>
                </form>
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
              <td><a href="/tasked/{{ $task->id }}" class="text-success">完了</a></td>
              <td><a href="/task/{{ $task->id }}/edit" class="text-primary">編集</a></td>
              <td><a href="/task/{{ $task->id }}/delete" class="text-danger" onclick="return confirm('こちらのタスクを削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <footer style="width:10%; margin:0 auto;"><p>{{ $tasks->links() }}</p></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js?v=1"></script>
</body>

</html>
