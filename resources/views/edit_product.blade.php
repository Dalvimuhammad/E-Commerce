@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Product') }}</div>

                    <div class="card-body">
                        <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" name="name" placeholder="Change Name" value="{{$product->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" name="description" placeholder="Change Description" value="{{$product->description}}" class="form-control">
                            <div class="form-group"></div>
                                <label for="price">Price:</label>
                                <input type="number" name="price" placeholder="Change Price" value="{{$product->price}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" name="stock" placeholder="Change Name" value="{{$product->stock}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Image: </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Change Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection