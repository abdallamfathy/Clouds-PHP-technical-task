@extends('layouts.app')

@section('content')

@include('admin/includes/error')

<div class="search" style="margin-top:20px; margin-left:1035px;">
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required/>
        <button class="btn btn-info" type="submit">Search users</button>
    </form>
</div>


<div class="card">
    <table class="table table-hover">

        <thead>

            <th>Name</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>



        <tbody>
            @if($users->count()>0)
            @foreach($users as $user)                
            <tr>
                <td>{{$user->name}}</td>

                <td>@if($user->status == '1')
                <a href="{{route('user/deactivate',['id'=>$user->id])}}" class="btn btn-danger">Deactivate</a>

                @else
                <div ><a href="{{route('user/activate',['id'=>$user->id])}}" class="btn btn-success">Activate</a></div> 

                @endif</td>

                

                <td>
                    <div ><a href="{{route('user/edit',['id'=>$user->id])}}" class="btn btn-info">Update</a></div>

                </td>
                <td>
                @if(Auth::id() !== $user->id)
                <div ><a href="{{route('user/destroy',['id'=>$user->id])}}" class="btn btn-danger">Delete</a></div>
                @endif
                </td>
            </tr>
            
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">No users</th>
            </tr>
            @endif
        </tbody>


    </table>
</div>

@stop

