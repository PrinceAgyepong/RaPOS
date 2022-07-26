@php
$stats = [
    'today' => [
        'transactions' => 5,
        'income' => 700,
        'expense' => 150,
        'balance' => 250,
    ],
    'yesterday' => [
        'transactions' => 3,
        'income' => 500,
        'expense' => 0,
        'balance' => 150,
    ],
    'this week' => [
        'transactions' => 12,
        'income' => 7100,
        'expense' => 550,
        'balance' => 730,
    ],
    'last week' => [
        'transactions' => 13,
        'income' => 6120,
        'expense' => 490,
        'balance' => 860,
    ],
    'this month' => [
        'transactions' => 43,
        'income' => 2070,
        'expense' => 1560,
        'balance' => 1250,
    ],
    'last month' => [
        'transactions' => 45,
        'income' => 2260,
        'expense' => 1620,
        'balance' => 1310,
    ],
    'this year' => [
        'transactions' => 111,
        'income' => 70685,
        'expense' => 1058,
        'balance' => 2250,
    ],
];
@endphp
<x-layouts.dashboard pageSlug='stats' page='Statistics' section='transactions'>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Transaction Statistics</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">
                                View Transactions
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Period</th>
                            <th>Transactions</th>
                            <th>Income</th>
                            <th>Expenses</th>
                            <th>Net Cash</th>
                            <th>Cash Balance</th>
                            <th>Total Cash</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($stats as $period => $stat)
                                <tr>
                                    <td>{{ $period }}</td>
                                    <td>{{ $stat['transactions'] }}</td>
                                    <td>GHC {{ $stat['income'] }}</td>
                                    <td>GHC {{ $stat['expense'] }}</td>
                                    <td>GHC {{ $stat['income'] - $stat['expense'] }}</td>
                                    <td>GHC {{ $stat['balance'] }}</td>
                                    <td>GHC {{ $stat['income'] - $stat['expense'] + $stat['balance'] }}</td>
                                </tr>
                            @endforeach
                            {{-- @foreach ($transactionsperiods as $period => $data)
                                    <tr>
                                        <td>{{ $period }}</td>
                                        <td>{{ $data->count() }}</td>
                                        <td>{{ format_money($data->where('type', 'income')->sum('amount')) }}</td>
                                        <td>{{ format_money($data->where('type', 'expense')->sum('amount')) }}</td>
                                        <td>{{ format_money($data->where('type', 'payment')->sum('amount')) }}</td>
                                        <td>{{ format_money($data->where('payment_method_id', optional($methods->where('name', 'Cash')->first())->id)->sum('amount')) }}</td>
                                        <td>{{ format_money($data->sum('amount')) }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-layouts.dashboard>
