@extends('layouts.app')

@section('content')
    <h1>Transactions</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>From Account</th>
                <th>To Account</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr class="transaction-row" data-bs-toggle="modal" data-bs-target="#transactionModal-{{ $transaction->id }}">
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->fromAccount->name ?? 'N/A' }}</td>
                    <td>{{ $transaction->toAccount->name ?? 'N/A' }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>

                @include("components.transaction", ['transaction' => $transaction])
            @endforeach
        </tbody>
    </table>

    <style>
        .transaction-row:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }
    </style>
@endsection
