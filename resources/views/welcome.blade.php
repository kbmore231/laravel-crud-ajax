<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="todolist">
                    </div>
                    <div id="modals">
                    </div>
                </div>
            </div>
        </div>
      

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.get("{{ URL::to('tasks') }}", function(data){
                    $('#todolist').html(data);
                });

                $('#todolist').on('click', '#btnAddTask', function(){
                    $.get("{{URL::to('todo/create')}}", function(data){
                        $('#modals').html(data);
                        $('#addTodoTask').modal('show');
                    });
                });

                $('#todolist').on('click', '.btnManage', function(){
                    var id = $(this).data('task');
                    $.get("{{URL::to('todo/edit')}}/"+id, function(data){
                        $('#modals').html(data);
                        $('#editTodoTask').modal('show');
                    });
                });

                $('#modals').on('submit', '#frmAddTask', function(e){
                    e.preventDefault();
                    var frmData = $(this).serialize();
                    // $.post("{{URL::to('todo/save')}}", frmData, function(data, xhrStatus, xhr){
                    //     $('#todolist').html(data);
                    // });
                    // console.log(frmData);
                    $.ajax({
                        url : "{{URL::to('todo/save')}}",
                        type : 'POST',
                        data : frmData,
                    })
                    .done(function(data){
                        $('#modals #errors').html('<li class="alert alert-success">Task added successfully</li>');
                        $('#todolist').html(data);
                    })
                    .fail(function(error){
                        var error = error.responseJSON;
                        $('#modals #errors').empty();
                        error.errors.name.forEach(function(element, index){
                            $('#modals #errors').append('<li class="alert alert-danger">'+element+'</li>');
                        });
                        console.log(error);
                    });
                });
                

                $('#modals').on('click', '#btnDelete', function(){
                    var id = $(this).data('task');
                    $.get("{{URL::to('todo/destroy')}}/"+id, function(data){
                        $('#todolist').html(data);
                    });
                });

                $('#modals').on('submit', '#frmEditTask', function(e){
                    e.preventDefault();
                    var frmData = $(this).serialize();
                    $.post("{{URL::to('todo/update')}}", frmData, function(data, xhrStatus, xhr){
                        $('#todolist').html(data);
                    });
                });
            });
        </script>
    </body>
</html>