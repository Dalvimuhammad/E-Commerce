@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            @endif
                            <form action="{{route('edit_profile')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value='{{$user->name}}' class="form-control">
                                </div>
                                <label for="email">Email</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prezzpend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="role" class="form-control" value="{{$user->is_admin ? 'admin' : 'member'}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" name="passord_confirmation" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Change Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
