@extends('layouts.app', ['page' => 'Add Product', 'pageSlug' => 'sales', 'section' => 'transactions'])

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="p-3 m-0">Add Product</h3>

                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('sales.show', [$sale->id]) }}" class="btn btn-sm btn-primary">Back to
                        List</a>
                    <button type="submit" id="submit-btn" class="btn btn-sm btn-success">ADD</button>
                </div>
            </div>
        </div>
        <div class="card-body row">


            <ul class="col-12">
                <li>
                    <a data-toggle="collapse" aria-expanded=true href="#selected_products_accordion">
                        
                        <!-- <span class="nav-link-text">Selected Products</span> -->
                        
                        <span class="nav-link-text">
                            <h3 class="p-3 m-0">Selected Products (<span id="products_count">0</span>)</h3>
                        </span>
                        <b class="caret mt-1" style="right: 75%;"></b>
                    </a>

                    <div class="collapse show" id="selected_products_accordion">
                        <ul class="nav pl-4">
                            <!-- <li >
                            <a href="{{ route('products.index') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>Products</p>
                            </a>
                        </li> -->
                            <table class="table tablesorter " id="selected_products">
                                <thead class=" text-primary">
                                    <th></th>
                                    <th scope="col-2">Category</th>
                                    <th scope="col-2">Product</th>
                                    <th scope="col-2">Code</th>
                                    <th scope="col-2">size / type</th>
                                    <th scope="col-2">Base Price</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr style="display: none" id="row_{{$product->id}}">

                                        <td>
                                            <input id="check_{{$product->id}}" type="checkbox" class="check_product" checked value="{{$product->id}}">
                                        </td>

                                        @if ($product->category)
                                        <td>{{ $product->category }}</td>
                                        @else
                                        <td><i>unset</i></td>
                                        @endif


                                        @if ($product->name)
                                        <td>{{ $product->name }}</td>
                                        @else
                                        <td><i>unset</i></td>
                                        @endif


                                        @if ($product->code)
                                        <td>{{ $product->code }}</td>
                                        @else
                                        <td><i>unset</i></td>
                                        @endif


                                        @if ($product['size'])
                                        <td>{{ $product['size'] }}</td>
                                        @else
                                        <td>unset</td>
                                        @endif


                                        @if ($product->price)
                                        <td>GHC{{ $product->price }}</td>
                                        @else
                                        <td>GHC0.00</td>
                                        @endif


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </ul>
                    </div>
                </li>
            </ul>



            <div class="col-12">
            <h3 class="p-3 mb-0">Add Product</h3>
            <div class="row col-12">

                <input type="hidden" name="sale_id" value="{{ $sale->id }}">
                <div class="col-4 form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-product">Category</label>
                    <select name="product_id" id="input-product" class="category-select select form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" required>
                        <option value="t-row">all</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->category }}">
                            {{ $category->category }}

                        </option>
                        @endforeach
                    </select>
                    {{-- @include('alerts.feedback', ['field' => 'product_id']) --}}
                </div>


                <div class="col-4 form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-product">Brand</label>
                    <select name="product_id" id="input-product" class="brand-select select form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}">
                        <option value="t-row">all</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}">
                            {{ $brand->name }}

                        </option>
                        @endforeach
                    </select>
                    {{-- @include('alerts.feedback', ['field' => 'product_id']) --}}
                </div>


                <div class="col-4 form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-product">Code</label>
                    <select name="product_id" id="input-product" class="code-select select form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}">
                        <option value="all">all</option>
                        <option value="unset">unset</option>
                        @foreach ($codes as $code)
                        <option value="{{ $code->code }}">
                            {{ $code->code }}

                        </option>
                        @endforeach
                    </select>
                </div>





            </div>
            <form method="post" action="{{ route('sales.products.storeManual', $sale) }}" autocomplete="off" class="col-12" id="add_form">
                @csrf
                <h3 class="p-3 m-0">All Products</h3>
                <table class="table tablesorter " id="all_products">
                    <thead class=" text-primary">
                        <th></th>
                        <th scope="col-2">Category</th>
                        <th scope="col-2">Product</th>
                        <th scope="col-2">Code</th>
                        <th scope="col-2">size / type</th>
                        <th scope="col-2">Base Price</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr id="row_{{$product->id}}" class=" @if($product->price == null) bg-grey @endif t-row {{ Str::replace(' ', '_', $product->category) }} {{ Str::replace(' ', '_', $product->name) }} @if($product->code){{ Str::replace(' ', '_', $product->code)}} @else unset @endif ">

                            <td>
                                <input id="check_{{$product->id}}" type="checkbox" name="ids[]" value="{{$product->id}}" class="check_product" @if($product->price == null) disabled @endif>
                            </td>

                            @if ($product->category)
                            <td>{{ $product->category }}</td>
                            @else
                            <td><i>unset</i></td>
                            @endif


                            @if ($product->name)
                            <td>{{ $product->name }}</td>
                            @else
                            <td><i>unset</i></td>
                            @endif


                            @if ($product->code)
                            <td>{{ $product->code }}</td>
                            @else
                            <td><i>unset</i></td>
                            @endif


                            @if ($product['size'])
                            <td>{{ $product['size'] }}</td>
                            @else
                            <td>unset</td>
                            @endif


                            @if ($product->price)
                            <td>GHC{{ $product->price }}</td>
                            @else
                            <td>GHC0.00</td>
                            @endif


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    new SlimSelect({
        select: '.category-select'
    });
    new SlimSelect({
        select: '.brand-select'
    });
    new SlimSelect({
        select: '.code-select'
    });
</script>

{{-- <script>
        let input_qty = document.getElementById('input-qty');
        let input_price = document.getElementById('input-price');
        let input_total = document.getElementById('input-total');
        input_qty.addEventListener('input', updateTotal);
        input_price.addEventListener('input', updateTotal);
        function updateTotal () {
            input_total.value = (parseInt(input_qty.value) * parseFloat(input_price.value))+"$";
        }
    </script> --}}

<script>
    $(function() {
        // getting stock of each product
        $stockList = {
            @foreach($products as $product)
            '{{ $product->id }}': '{{ $product->stock }}',
            @endforeach
        }

        console.log($stockList);

        // $('#input-qty').val(1)
        // $('#input-qty').attr('max', $stockList[$('#input-product').val()])
        // $('#product-count').text($stockList[$('#input-product').val()])

        // $('#input-product').on('change', function() {
        //     $('#input-qty').val(1)
        //     $('#input-qty').attr('max', $stockList[$(this).val()])
        //     $('#product-count').text($stockList[$(this).val()])

        // })


        // all query boxes
        $('.select').on('change', function() {
            $('.t-row').hide()

            $query_string = "";

            $query_string += ($('.category-select').val() == "all") ? '.t-row' : '.' + $('.category-select').val().replaceAll(' ', '_');
            $query_string += ($('.brand-select').val() == "null") ? '' : ($('.brand-select').val() == "all") ? ".t-row" : "." + $('.brand-select').val().replaceAll(' ', '_');
            $query_string += ($('.code-select').val() == "all") ? '.t-row' : $('.code-select').val().replaceAll(' ', '_');

            console.log($query_string);

            $($query_string).show()
            $('.hide_row').hide()

            // $('.' + $('.category-select').val().replaceAll(' ', '_')).show()
            // $('.' + $('.brand-select').val().replaceAll(' ', '_')).show()
            // $('.' + $('.code-select').val().replaceAll(' ', '_')).show()
        })

        $('#submit-btn').prop("disabled", true);

        $('#all_products .check_product').on('change', function() {
            if ($('#all_products input:checkbox:checked').length > 0) {
                $('#submit-btn').prop("disabled", false);
            } else {
                $('#submit-btn').prop("disabled", true);
            }
            $('#products_count').html($('#all_products input:checkbox:checked').length)

            $('#selected_products #check_' + $(this).val()).prop('checked', true);
            $('#selected_products #row_' + $(this).val()).show();
            
            $('#all_products #check_' + $(this).val()).prop('checked', true);
            $('#all_products #row_' + $(this).val()).hide();
            $('#all_products #row_' + $(this).val()).addClass("hide_row");

    

        })
        
        
        $('#selected_products .check_product').on('change', function() {

            $('#selected_products #check_' + $(this).val()).prop('checked', false);
            $('#selected_products #row_' + $(this).val()).hide();
            
            $('#all_products #check_' + $(this).val()).prop('checked', false);
            $('#all_products #row_' + $(this).val()).show();
            $('#all_products #row_' + $(this).val()).removeClass("hide_row");

            if ($('#all_products input:checkbox:checked').length > 0) {
                $('#submit-btn').prop("disabled", false);
            } else {
                $('#submit-btn').prop("disabled", true);
            }

            $('#products_count').html($('#all_products input:checkbox:checked').length)

        })

        $('#submit-btn').click(function() {
            $('#add_form').submit()
        })


    })
</script>
@endpush