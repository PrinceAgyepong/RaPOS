<x-layouts.app page='shop' section='' pageSlug='shop' :hasSidebar=false>


    <form action="{{route('shop.cart')}}" method="post" id="cart_form">
        @csrf
        <input type="submit" id="submit" value="Cart - (0)" class="btn btn-primary position-fixed p-3" style="z-index: 5; right: 10px;">
        {{-- <button id="submit" type="button" class="btn btn-primary position-fixed p-3" style="z-index: 5; right: 10px">
            <i class="tim-icons icon-cart"></i> <span class="badge badge-light">+4</span>
        </button> --}}
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
                <div class="col" style="max-width: 260.328px; min-height: 537px; min-width: 260.328px;">
                    <div class="card" style="height: 95%">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/dress1.jpg') }}" class="img-fluid w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Brand: {{$product->name}}</h5>
                            <p class="card-text">
                                <strong>Size:</strong> {{$product->size_type}}<br>
                                <strong>Price: {{$product->price}}</strong>
                            </p>
                            

                            {{-- <form action="" method="post"> --}}
                                <div class="text-right add-btn">
                                    <input type="checkbox" name="{{ $product->id }}" id="p-{{ $product->id }}"
                                        style="display: none">
                                    <button type="button" class="btn btn-success add_to_cart" id="p-{{ $product->id }}">
                                        Add to Cart
                                    </button>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>

    <x-slot name="js">
        <script>
            $(function() {
                $('#submit').hide();
                var $selected = 0;

                $('.add_to_cart').click(function() {
                    $card = $(this).parent().parent().parent();

                    $card.toggleClass('card-select')

                    if ($card.hasClass('card-select')) {
                        console.log($(this).parent().children('input').prop('checked', true));
                        $(this).text('REMOVE')
                        $selected++;
                        $('#submit').attr('value', `Cart - (${$selected})`);
                        $('#submit').show()
                    } else {
                        $(this).text('ADD TO CART')
                        $selected--;
                        $('#submit').attr('value', `Cart - (${$selected})`);
                        if ($selected == 0)
                            $('#submit').hide()
                    }

                    $(this).toggleClass('bg-danger')
                })

                $('#submit').click(function () {
                    console.log("hi");
                    console.log($('#cart_form'));
                    $('#cart_form').submit();
                })
            })
        </script>
    </x-slot>
    </x-layouts.dashboard>
