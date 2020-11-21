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
                    <div class="card-title">View Cities</div>
                    <div class="card-tools"><a href="{{ route('cities.create') }}" class="btn btn-warning">Create</a></div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($cities as $city )
                            <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                <div>
                                    <a class="text-decoration-none" href="{{ route('cities.show', $city->id) }}">{{ $city->name }}</a>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('cities.edit', $city->id) }}" class="d-block"><i class="fas fa-edit text-warning"></i></a>
                                    <a href="{{ route('cities.destroy', $city->id) }}" class="d-block"
                                    onclick="event.preventDefault();
                                                     document.getElementById('delete-city').submit();"
                                    ><i class="fas fa-trash text-danger"></i></a>
                                    <form id="delete-city" action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display: none;">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endforeach
                        
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