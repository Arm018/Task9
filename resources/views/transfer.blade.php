@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transfer Money') }}</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('transfer') }}">
                            @csrf

                            <div class="form-group">
                                <label for="receiver_email">{{ __('Recipient Email') }}</label>
                                <input type="email" id="receiver_email" name="receiver_email" class="form-control @error('receiver_email') is-invalid @enderror" value="{{ old('receiver_email') }}" required autofocus>
                                @error('receiver_email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">{{ __('Amount to Transfer') }}</label>
                                <input type="number" step="0.01" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" required>
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary" style="margin-top: 10px">
                                {{ __('Transfer') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
