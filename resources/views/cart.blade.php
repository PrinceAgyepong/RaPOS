<x-layouts.app page='cart' section='' pageSlug='cart'>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <h4 class="card-title">Cart <strong>(<span id="item-qty">4</span>)</strong></h4>
                                <h4 class="card-title">Total Price: <strong><span id="total-price">GHC 1400.00</span></strong></h4>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <a href="" class="btn btn-sm btn-danger">clear</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('alerts.success') --}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Footwear</td>
                                    <td>Gucci</td>
                                    <td>GHC 300.00</td>
                                    <td>1</td>
                                    <td>
                                        <a href="" class="btn btn-link"
                                            data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                            <i class="tim-icons icon-simple-add"></i>
                                        </a>
                                        <form action="" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete Sale"
                                                onclick="confirm('Are you sure you want to remove this item from cart ?.') ? '' : ''">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trouser</td>
                                    <td>Luis Vuitton</td>
                                    <td>GHC 400.00</td>
                                    <td>2</td>
                                    <td>
                                        <a href="" class="btn btn-link"
                                            data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                            <i class="tim-icons icon-simple-add"></i>
                                        </a>
                                        <a href="" class="btn btn-link"
                                            data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                            <i class="bi bi-dash-lg"></i>
                                        </a>
                                        <form action="" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete Sale"
                                                onclick="confirm('Are you sure you want to remove this item from cart ?.') ? '' : ''">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Footwear</td>
                                    <td>Gucci</td>
                                    <td>GHC 300.00</td>
                                    <td>1</td>
                                    <td>
                                        <a href="" class="btn btn-link"
                                            data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                            <i class="tim-icons icon-simple-add"></i>
                                        </a>
                                        <form action="" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete Sale"
                                                onclick="confirm('Are you sure you want to remove this item from cart ?.') ? '' : ''">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{-- {{ $balances->links() }} --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </x-layouts.dashboard>
