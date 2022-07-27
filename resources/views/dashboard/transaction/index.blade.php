@php
$transactions = [
    [
        'date' => '2022-Jul-11',
        'time' => '09:12 AM',
        'type' => 'balance payment (full)',
        'amount' => '40.00',
        'client' => '14',
        'provider' => '---',
    ],
    [
        'date' => '2022-Jul-11',
        'time' => '09:30 AM',
        'type' => 'balance payment (partial)',
        'amount' => '50.00',
        'client' => '3',
        'provider' => '---',
    ],
    [
        'date' => '2022-Jul-11',
        'time' => '11:30 AM',
        'type' => 'balance payment (partial)',
        'amount' => '2500.00',
        'client' => '---',
        'provider' => '2',
    ],
];
@endphp
<x-layouts.dashboard pageSlug='transactions' page='Transactions' section='transactions'>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Transactions</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#transactionModal">
                                New Transaction
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('alerts.success') --}}

                    <div class="" style="overflow-x: scroll">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Date</th>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Client</th>
                                <th>Provider</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction['date'] }}</td>

                                        <td>{{ $transaction['time'] }}</td>

                                        <td>{{ $transaction['type'] }}</td>

                                        <td>{{ $transaction['amount'] }}</td>

                                        <td>{{ $transaction['client'] }}</td>

                                        <td>{{ $transaction['provider'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{--  $transactions->links('vendor.pagination.bootstrap-4')  --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <a href="" class="btn btn-sm btn-primary">Payment</a>
                        <a href="" class="btn btn-sm btn-primary">Income</a>
                        <a href="" class="btn btn-sm btn-primary">Expense</a>
                        <a href="" class="btn btn-sm btn-primary">Sale</a>
                        <a href="" class="btn btn-sm btn-primary">Transfer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.dashboard>
