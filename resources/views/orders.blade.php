<x-layouts.app page='orders' section='' pageSlug='orders'>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="card-title">Orders</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple active" id="all">
                                    <input type="radio" name="options" checked>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">All</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" id="uncompleted">
                                    <input type="radio" class="d-none d-sm-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Uncompleted</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" id="completed">
                                    <input type="radio" class="d-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Completed</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-tap-02"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table">
                            <thead>
                                <th class="text-center">Date</th>
                                @if (auth()->user()->userType->type == 'admin')
                                    <th class="text-center">User</th>
                                @endif
                                <th class="text-center">Attendant</th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center"></th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center">{{ $order->created_at->format('Y-m-d') }}</td>
                                        @if (auth()->user()->userType->type == 'admin')
                                            <td class="text-center">{{$order->clent_id}}</td>
                                        @endif
                                        @isset($order->attendant)
                                            <td class="text-center">{{ $order->attendant }}</td>
                                        @else
                                            <td class="text-center">---</td>
                                        @endisset

                                        <td class="text-center">{{ $order->products->sum('price') }}</td>
                                        @if ($order->attendant == true)
                                            <td class="text-center">Completed</td>
                                        @else
                                            <td class="text-center">Uncompleted</td>
                                        @endif

                                        <td>

                                            <a href="{{route('order.complete', compact('order'))}}" class="btn btn-primary text-white">complete</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{-- <nav class="d-flex justify-content-end" aria-label="...">
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
    </x-layouts.dashboard>
