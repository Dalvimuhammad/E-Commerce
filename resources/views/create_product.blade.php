@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" placeholder="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" placeholder="Description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" placeholder="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Stock">Stock:</label>
                        <input type="number" name="stock" placeholder="stock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <br>
                        <button type="submit" class="btn btn-primary">Submit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection