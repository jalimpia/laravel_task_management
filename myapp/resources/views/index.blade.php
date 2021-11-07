@extends('layout.app')
@section('content')



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
        <table class="table" id="data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('edit_product',$product->id)}}">Edit</a>
                        <a href="{{route('delete_product',$product->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('post_product')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <input class="form-control" name="name" type="text" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="description" type="text" placeholder="Product Description">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="price" type="text" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="image" type="text" placeholder="Image Url">
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
<script>
    $(document).ready(function() {
        $('#data').DataTable();
    });
</script>

@endsection