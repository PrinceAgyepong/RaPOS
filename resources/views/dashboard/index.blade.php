<x-layouts.app page='dashboard' section='' pageSlug='dashboard'>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Statistics</h5>
                            <h2 class="card-title">Annual</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                    <input type="radio" name="options" checked>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sales</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" id="1">
                                    <input type="radio" class="d-none d-sm-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Expenses</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                                {{-- <label class="btn btn-sm btn-primary btn-simple" id="2">
                                    <input type="radio" class="d-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">stock</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-tap-02"></i>
                                    </span>
                                </label> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Sales</h5>
                    <p></p>
                    <h3 class="card-title"><i class="tim-icons icon-money-coins text-primary"></i> GHC {{ $sales }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Balance</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bank text-info"></i> GHC {{$balances}}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Expenditure</h5>
                    <h3 class="card-title"><i class="tim-icons icon-paper text-success"></i> GHC {{$expenses}}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
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
                        {{-- <a href="{{ route('transactions.create', ['type' => 'payment']) }}" class="btn btn-sm btn-primary">Payment</a>
                        <a href="{{ route('transactions.create', ['type' => 'income']) }}" class="btn btn-sm btn-primary">Income</a>
                        <a href="{{ route('transactions.create', ['type' => 'expense']) }}" class="btn btn-sm btn-primary">Expense</a>
                        <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">Sale</a>
                        <a href="{{ route('transfer.create') }}" class="btn btn-sm btn-primary">Transfer</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">

        <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

        <script>
            var lastmonths = [
            @foreach($lastSixMonths as $month)
                '{{$month}}',
            @endforeach ];


            // {{-- @foreach ($lastmonths as $id => $month)
        //     lastmonths.push('{{ strtoupper($month) }}')
        // @endforeach --}}

            var lastincomes = {{ $monthlyIncome }} // {{-- {{ $lastincomes }} --}};
            var lastexpenses = {{ $monthlyExpense }} // {{-- {{ $lastexpenses }} --}};

            var anualsales = {{ $annualSales }} // {{-- {{ $anualsales }} --}};
            // var anualclients = [0, 4, 10, 8, 9, 6, 3, 1, 6, 3, 8, 3] // {{-- {{ $anualclients }} --}};
            var anualexpenses = {{ $annualExpenses }} // {{-- {{ $anualproducts }} --}};

            var methods = [@foreach($lastSixMonths as $month)
                '{{$month}}',
            @endforeach ];

            var methods_stats = {{ $monthlyBalance }};

            // {{-- @foreach ($monthlybalancebymethod as $method => $balance)
        //     methods.push('{{ $method }}');
        //     methods_stats.push('{{ $balance }}');
        // @endforeach --}}

            $(document).ready(function() {
                demo.initDashboardPageCharts();
            });
        </script>

    </x-slot>

</x-layouts.app>
