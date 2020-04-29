<div class="modal fade" id="editTodoTask">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Todo Record - {{$task->id}}</h4>
            </div>
            <form action="{{URL::to('todo/update')}}" method="post" id="frmEditTask">
                @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
                {{-- {{csrf_field()}} --}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtName">Update todo Task</label>
                        <input type="text" id="txtName" class="form-control" name="name" value="{{$task->name}}" placeholder="Input todo tasks">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" data-task="{{$task->id}}" id="btnDelete" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>