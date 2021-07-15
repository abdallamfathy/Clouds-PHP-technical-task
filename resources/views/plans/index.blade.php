@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"  style="margin-top: 20px">
                <div class="card-header"><h3 style="font-weight: bold">Plans:</h3></div>
                <div class="card-body">
                    @if ($plans->count() == 0)
                    There is no plans right now, Admin should create plan first to complete registeration.
                @else
                    <ul class="list-group">
                        @foreach($plans as $plan)
                        <li class="list-group-item clearfix">
                            <div class="pull-left">
                                <h3>{{ $plan->name }}</h3>
                                <br>
                                <h6>${{ number_format($plan->cost, 2) }}  / {{$plan->time}}</h6>
                                <br>
                                <h5>{{ $plan->description }}</h5>
                                <br>
                                
                                <div class="form-group">
                                <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary pull-right">Choose</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection