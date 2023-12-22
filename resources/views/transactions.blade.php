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

                <div class="modal fade" id="transactionModal-{{ $transaction->id }}" tabindex="-1"
                    aria-labelledby="transactionModalLabel-{{ $transaction->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transactionModalLabel-{{ $transaction->id }}">Transaction
                                    Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>ID: {{ $transaction->id }}</p>
                                <p>From Account: {{ $transaction->fromAccount->name ?? 'N/A' }}</p>
                                <p>To Account: {{ $transaction->toAccount->name ?? 'N/A' }}</p>
                                <p>Description: {{ $transaction->description }}</p>
                                <p>Amount: {{ $transaction->amount }}</p>
                                <p>Date: {{ $transaction->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <style>
        .transaction-row:hover {
            background-color: #f5f5f5;
        }
    </style>
@endsection
