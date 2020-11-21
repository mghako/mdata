@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
</div>
    
@endif
<div class="container">
    <div class="row justify-content-center">
        {{-- left side of home --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title">{{ $city->name }} City</div>
                    <div class="card-tools"><a href="{{ route('cities.index') }}" class="btn btn-success">View</a></div>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Township List</h4>
                    </div>
                    <div id="city_list" class="my-2">
                        <ul class="list-group">
                            @foreach($city->townships as $township)
                            <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                <div>
                                    {{ $township->name }}
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('townships.edit', $township->id) }}" class="d-block"><i class="fas fa-edit text-warning"></i></a>
                                    <a href="{{ route('townships.destroy', $township->id) }}" class="d-block"
                                    onclick="event.preventDefault();
                                                     document.getElementById('delete-township').submit();"
                                    ><i class="fas fa-trash text-danger"></i></a>
                                    <form id="delete-township" action="{{ route('townships.destroy', $township->id) }}" method="POST" style="display: none;">
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
        </div>
        {{-- right side of home --}}
        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection