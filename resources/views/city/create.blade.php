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
                    <div class="card-title">Create City</div>
                    <div class="card-tools"><a href="{{ route('cities.index') }}" class="btn btn-warning">View</a></div>
                </div>

                <div class="card-body">
                    <form action="{{ route('cities.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- right side of home --}}
        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection