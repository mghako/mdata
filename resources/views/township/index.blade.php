@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        {{-- left side of home --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title">View Townships</div>
                    <div class="card-tools"><a href="{{ route('townships.create') }}" class="btn btn-warning">Create</a></div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        {{-- @foreach ($cities as $city )
                            <li class="list-group-item list-group-item-action"><a class="d-block text-decoration-none" href="{{ route('cities.show', $city->id) }}">{{ $city->name }}</a></li>
                        @endforeach --}}
                        
                    </ul>
                </div>
            </div>
        </div>
        {{-- right side of home --}}
        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection