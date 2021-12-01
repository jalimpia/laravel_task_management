@extends('layout.app')
@section('content')


<div class="row my-5">
    <div class="col-12">
        <h1 class="text-center">Update Task</h1>
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
        <form action="{{route('patch_task',$task->id)}}" method="POST">
            {{ csrf_field()  }}
            {{ method_field('PATCH') }}
            <div class="modal-body">

                <div class="form-group">
                    <label>Product Name:</label>
                    <input value="{{$task->name}}" class="form-control" name="name" type="text" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label>Product Description:</label>
                    <input value="{{$task->description}}" class="form-control" name="description" type="text" placeholder="Product Description">
                </div>
                <div class="form-group">
                        <label for="">Priority</label>
                        <input value="{{$task->priority}}" class="form-control" name="priority" type="number" placeholder="Priority">
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>




@endsection