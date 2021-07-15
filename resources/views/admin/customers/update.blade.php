@extends('layouts/app') @section('content') @include('admin/includes/errors')

<div class="card">
    @csrf

    <div class="card-header">Update user:
        {{$user->name}}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('user/update',['id'=>$user->id]) }}">
            @csrf
            {{ method_field('POST') }}

            <div class="form-group">

                <label>
                    <h5>Name</h5>
                </label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                <br>
                <label>
                    <h5>Email</h5>
                </label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control">

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                @csrf
            </div>
            @csrf
        </form>
    </div>

</div>

@stop