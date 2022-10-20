<x-layouts.app page='shop' section='' pageSlug='shop'>


    <form action="" method="post">
        <button type="button" class="btn btn-primary position-fixed p-3" style="z-index: 5; right: 10px">
            <i class="tim-icons icon-cart"></i> <span class="badge badge-light">+4</span>
        </button>
        <button type="button" class="btn btn-primary position-fixed p-3" style="z-index: 5; right: 90px">
            <i class="tim-icons icon-cart"></i> <span class="badge badge-light">view</span>
        </button>
        <button type="button" class="btn btn-success position-fixed p-3" style="z-index: 5; right: 10px; bottom: 30%">
            <i class="tim-icons icon-check-2" style="vertical-align: middle;"></i> <span
                style="vertical-align: middle;">Save</span>
        </button>
        <button type="button" class="btn btn-danger position-fixed p-3" style="z-index: 5; right: 10px; bottom: 15%">
            <i class="tim-icons icon-simple-remove " style="vertical-align: middle;"></i> <span
                style="vertical-align: middle;">Cancel</span>
        </button>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @for ($i = 1; $i <= 10; $i++)
                <div class="col" style="max-width: 260.328px">
                    <div class="card  ">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/dress1.jpg') }}" class="img-fluid w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Brand</h5>
                            <p class="card-text">
                                <strong>Size:</strong> <br>
                                <strong>Price:</strong>
                            </p>

                            <div class="text-right">
                                <input type="checkbox" name="p-{{ $i }}" id="p-{{ $i }}"
                                    style="display: none">
                                <button type="button" class="btn btn-success add_to_cart" id="p-{{ $i }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </form>

    <x-slot name="js">
        <script>
            $(function() {
                $('.add_to_cart').click(function() {
                    $card = $(this).parent().parent().parent();

                    $card.toggleClass('card-select')

                    if ($card.hasClass('card-select')) {
                        console.log($(this).parent().children('input').prop('checked', true));
                        $(this).text('REMOVE')
                    } else {
                        $(this).text('ADD TO CART')
                    }

                    $(this).toggleClass('bg-danger')
                })
            })
        </script>
    </x-slot>
    </x-layouts.dashboard>
