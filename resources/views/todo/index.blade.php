<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">All Todo Tasks List <span class="pull-right"><button type="button" class="btn btn-success btn-xs" id="btnAddTask">+</button></span></h3>
    </div>
    <div class="panel-body">
        <ul class="list-group list-unstyled">
            @if($tasks->all())
                @foreach($tasks as $task)
        <li class="list-group-item">{{$task->id}} - {{$task->name}} <span class="pull-right"><button type="button" data-task="{{$task->id}}" class="btn btn-success btn-xs btnManage"><i class="glyphicon glyphicon-cog"></i></button></span></li>
                @endforeach
            @else
                <li class="alert alert-danger"><strong>No Records Found..</strong></li>
            @endif
        </ul>
    </div>
    <div class="panel-footer">
        Copyright &copy; 2020 Khushal
    </div>
</div>