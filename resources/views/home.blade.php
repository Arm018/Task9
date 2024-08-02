@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h4>Welcome, {{ Auth::user()->name }}</h4>
                        <p>Your current balance: <strong>${{ Auth::user()->balance }}</strong></p>

                        <a href="{{ route('transfer') }}" class="btn btn-primary">Transfer Money</a>
                        <a href="{{ route('transactions') }}" class="btn btn-secondary" style="margin-left: 20px">View Transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
