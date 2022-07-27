<x-layouts.dashboard pageSlug='sales' page='Manage Sale' section='transactions'>
    {{-- @include('alerts.success')

    @include('alerts.error') --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Sale Summary</h4>
                        </div>

                        <div class="col-6 row justify-content-end">
                            <form action="{{ 'sales.products.checkoutWithPayment' }}" method="post">
                                @csrf
                                <button type="submit"
                                    onclick="confirm('make sure all products are in order before proceeding?') ? this.parentElement.submit() : ''"
                                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center">
                                    Add Payments <i class="tim-icons icon-money-coins pl-2"></i>
                                </button>
                            </form>


                            <form action="{{ 'sales.products.checkout' }}" method="post">
                                @csrf
                                <button type="submit"
                                    onclick="confirm('products added to this sale would be finalized, do you wish to continue?') ? this.parentElement.submit() : ''"
                                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center">
                                    Checkout <i class="tim-icons icon-cart pl-2"></i>
                                </button>
                            </form>
                            <form action="{{ 'sales.products.tryout' }}" method="post">
                                @csrf
                                <button type="submit"
                                    onclick="confirm('products added to this sale would be finalized, do you wish to continue?') ? this.parentElement.submit() : ''"
                                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center">
                                    Try Out <i class="tim-icons icon-cart pl-2"></i>
                                </button>
                            </form>


                        </div>
                        {{-- <a href="{{route('print.test')}}" class="btn btn-primary btn-sm">Print Something</a> --}}

                    </div>
                </div>
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table">
                        <thead>
                            <th>Date</th>
                            <th>Emp.</th>
                            <th>Client</th>
                            <th>products</th>
                            <th>Total Stock</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022-Jul-11</td>
                                <td>Mick</td>
                                <td>Bossu Skato</td>
                                <td>7</td>
                                <td>10</td>
                                <td>1980</td>
                                <td>balanced</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row col-12">
                        <div class="col">
                            <h4 class="card-title">Count: {{ 4 }}</h4>
                            {{-- <h4 class="card-title">products: {{ $sale->products->sum('qty') }}</h4> --}}
                        </div>

                        <div style="width: 0; overflow:hidden">
                            <input onblur="this.focus()" type="text" name="barcode" id="input-code" autofocus>
                        </div>
                        <form action="{{ 'sales.products.store' }}" method="post" id="sales-products-store-form">
                            @csrf
                        </form>

                        <div class="col-5 justify-conten-center row align-items-center">
                            <h4 class="card-title m-0">Scan To Add Product</h4>
                            <div class="lds-ellipsis ml-2">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>


                        <div class="col row justify-content-end">
                            <a href="{{ 'sales.products.create' }}" class="btn btn-primary btn-sm">Add
                                Products</a>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Price C/U</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Top</td>
                                <td>DEF</td>
                                <td>3</td>
                                <td>100</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Top</td>
                                <td>GHI</td>
                                <td>5</td>
                                <td>50</td>
                                <td>250</td>
                            </tr>
                            <tr>
                                <td>Trouser</td>
                                <td>JKL</td>
                                <td>4</td>
                                <td>200</td>
                                <td>800</td>
                            </tr>
                            <tr>
                                <td>Vest</td>
                                <td>MNO</td>
                                <td>2</td>
                                <td>50</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
