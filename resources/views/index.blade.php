
<html>
<head>

    <title>CRUD Practise</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <form action="/create_task" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            <div class="form-group">
                <h4><label for="task" class="col-sm-3 control-label">Task Title</label></h4>
                <div class="col-sm-5">
                    <input type="text" name="title" id="task_title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <h4><label for="task" class="col-sm-3 control-label">Description</label></h4>
                <div class="col-sm-5">
                    <textarea type="text" name="description" class="form-control"></textarea>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" class="btn btn-success ">
                    <i class="fa fa-plus">Create New Task</i>
                </button>
            </div>
        </div>



    </form>


        @if(count($tasks)>0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </thead>

                        <tbody>
                            @foreach($tasks as $tasks)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$tasks->name}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$tasks->description}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$tasks->created_at}}</div>
                                    </td>


                                    <td>

                                        <form action="/task/{{ $tasks->id }}" method="POST">
                                            <button class="btn btn-danger btn-xs">Delete</button>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
@endif
</body>
</html>
