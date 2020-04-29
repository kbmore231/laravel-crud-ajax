<div class="modal fade" id="addTodoTask">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Todo New Record</h4>
            </div>
            <form action="{{URL::to('todo/save')}}" method="post" id="frmAddTask">
                @csrf
                <div class="modal-body">
                    <ul id="errors" class="list-unstyled">

                    </ul>
                    <div class="form-group">
                        <label for="txtName">Enter todo Task</label>
                        <input type="text" id="txtName" class="form-control" name="name" placeholder="Input todo tasks">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>