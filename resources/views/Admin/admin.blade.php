@extends('admin.app')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning ">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>{{ auth()->user()->email }}</h3>
                    {{ __('You are logged in as Admin!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
