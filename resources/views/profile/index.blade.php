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
                    <div class="card-title">Profile</div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name:</th>
                            <th>Email:</th>
                        </tr>
                        <tr>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                    </table>
                    
                        <label for="myToken">Token</label>
                        <input id="myToken" type="text" class="form-control" value="{{ auth()->user()->user_token() }}" disabled>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <form action="{{ route('tokens.store') }}" method="post">
                                @method('post')
                                @csrf
                                <button type="submit" class="form-control bg-primary text-white"><i class="fas fa-plus"></i> Create Token</button>
                            </form>
                            <form action="{{ route('tokens.update', auth()->user()->id) }}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" class="form-control bg-secondary text-white"><i class="fas fa-sync-alt"></i> Refresh Token</button>
                            </form>
                            <form action="{{ route('tokens.destroy', auth()->user()->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="form-control bg-danger text-white"><i class="fas fa-trash"></i>  Delete Token</button>
                            </form>
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