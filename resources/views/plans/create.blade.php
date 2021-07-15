@extends('layouts.app') @section('content')

<div class="container">
    <div class="card" style="width:24rem;margin:auto;">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="card-body">
            <form action="{{route('store.plan')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="plan name">Plan Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Enter Plan Name">
                </div>
                <div class="form-group">
                    <label for="cost">Cost:</label>
                    <input type="text" class="form-control" name="cost" placeholder="Enter Cost">
                </div>
                <div class="form-group">
                    <label for="cost">Plan Description:</label>
                    <input
                        type="text"
                        class="form-control"
                        name="description"
                        placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label name="time">Select list:</label>
                    <select class="form-control" name="time">
                        <option value="month">Monthly</option>
                        <option value="year">Yearly</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection