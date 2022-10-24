<x-layouts.app page='cart' section='' pageSlug='cart'>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <h4 class="card-title">Cart <strong>(<span
                                            id="item-qty">{{ $cart->products->count() }}</span>)</strong></h4>
                                <h4 class="card-title">Total Price: <strong><span id="total-price">GHC
                                            {{ $cart->products->sum('price') }}</span></strong></h4>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('cart.clear', compact('cart')) }}" class="btn btn-sm btn-danger">clear</a>
                            @if ($cart->products->count() > 0)
                                <a href="{{ route('cart.submit', compact('cart')) }}"
                                    class="btn btn-sm btn-success">submit</a>
                            @endif
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
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @if ($cart->products->count() > 0)
                                    @foreach ($cart->products as $product)
                                        <tr>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>GHC {{ $product->price }}</td>
                                            <td>
                                                <form action="{{route('cart.remove.product', compact('cart', 'product'))}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-link" data-toggle="tooltip"
                                                        data-placement="bottom" title="Delete Sale" >
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>

                                        <td>No Products in Cart</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif





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
