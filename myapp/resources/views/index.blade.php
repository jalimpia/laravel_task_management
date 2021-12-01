@extends('layout.app')
@section('content')

<style>
    .myDragClass {
        background-color: #ecf0f1;
        font-size: 14px;
    }
</style>

<div class="row my-5">
    <div class="col-12">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        <div>
            <button class="btn btn-primary my-3" data-toggle="modal" data-target="#addProduct">Add New</button>
        </div>
        <form action="{{route('update_order')}}" method="POST" id="ordering_form">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <table class="table" id="data">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Ordering</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr id="{{$loop->index}}">
                        <input type="hidden" value="{{$task->id}}" name="id[]">
                        <td>{{$task->name}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->priority}}<input type="hidden" value="{{$task->priority}}" class="sorting_order" name="ordering[]"></td>
                        <td>
                            <a href="{{route('edit_task',$task->id)}}">Edit</a>
                            <a href="{{route('delete_task',$task->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('post_task')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Task Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Task Name">
                    </div>
                    <div class="form-group">
                        <label for="">Task Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Priority</label>
                        <input class="form-control" name="priority" type="number" placeholder="Priority">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js" integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#data').DataTable({
            "order": [
                [2, "asc"]
            ]
        });
    });
    $(document).ready(function() {
        // Initialise the table
        $("#data").tableDnD({
            onDragClass: "myDragClass",
            onDrop: function(table, row) {
                let i = 1;
                $(".sorting_order").each(function() {
                    this.value = i;
                    i = i + 1;
                });
                $("#ordering_form").submit();
            },
            onDragStart: function(table, row) {
                console.log("Test " + row.id);
            }
        });
    });
</script>


@endsection