@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transaction History') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>

                                    <td>{{ $transaction->getSenderId() }}</td>
                                    <td>{{ $transaction->getReceiverId() }}</td>
                                    <td>${{ $transaction->getAmount() }}</td>
                                    <td>{{ $transaction->formattedCreatedAt  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
