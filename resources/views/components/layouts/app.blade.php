@props(['pageSlug', 'section', 'page'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page }} - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />

    <!-- CSS -->
    <link href="{{ asset('assets') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    {{-- <link href="{{ asset('assets') }}/css/theme.css" rel="stylesheet" /> --}}
    {{-- @yield('css') --}}


    {{-- sales show --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 13px;
        }

        .lds-ellipsis div {
            position: absolute;
            top: 33px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #4554c2;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
            top: 0;
            /* bottom: 0; */
        }

        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
            top: 0;
            /* bottom: 0; */
        }

        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
            top: 0;
            /* bottom: 0; */
        }

        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
            top: 0;
            /* bottom: 0; */
        }

        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(24px, 0);
            }
        }
    </style>

</head>

<body class="white-content {{ $class ?? '' }}">
    {{-- @auth() --}}
    <div class="wrapper">
        
        <x-sidebar :pageSlug='$pageSlug' :section='$section' />
        <div class="main-panel">
            {{-- @include('layouts.navbars.navbar') --}}
            <x-navbar :pageSlug='$pageSlug' />
            <div class="content">
                {{-- @yield('content') --}}
                {{ $slot }}
            </div>

        </div>
    </div>
    <form id="logout-form" action="" method="POST" style="display: none;">
        @csrf
    </form>
    {{-- @else --}}
    {{-- @include('layouts.navbars.navbar') --}}
    {{-- <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container"> --}}
    {{-- @yield('content') --}}
    {{-- </div>
                    </div>
                </div>
            </div>
        @endauth --}}

    <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    {{-- <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script> --}}
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>

    <script src="{{ asset('assets') }}/js/white-dashboard.min.js?v=1.0.0"></script>
    <script src="{{ asset('assets') }}/js/theme.js"></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').removeClass('white-content');
                        }, 900);
                        white_color = false;
                    } else {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').addClass('white-content');
                        }, 900);

                        white_color = true;
                    }
                });

                $('.light-badge').click(function() {
                    $('body').addClass('white-content');
                });

                $('.dark-badge').click(function() {
                    $('body').removeClass('white-content');
                });
            });
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
    {{-- @stack('js') --}}

    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    <script>
        var lastmonths = ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        // {{-- @foreach ($lastmonths as $id => $month)
        //     lastmonths.push('{{ strtoupper($month) }}')
        // @endforeach --}}

        var lastincomes = ['1200', '2000', '1600', '2200', '1203', '1896'] // {{-- {{ $lastincomes }} --}};
        var lastexpenses = ['1200', '2000', '1600', '2200', '1203', '1896'] // {{-- {{ $lastexpenses }} --}};

        // var anualsales = [] // {{-- {{ $anualsales }} --}};
        // var anualexpenses = [] // {{-- {{ $anualproducts }} --}};
        var anualsales = [500, 700, 630, 567, 440, 800, 497, 534, 445, 654, 643, 432] // {{-- {{ $anualsales }} --}};
        var anualclients = [0, 4, 10, 8, 9, 6, 3, 1, 6, 3, 8, 3] // {{-- {{ $anualclients }} --}};
        var anualexpenses = [50, 70, 30, 57, 44, 0, 97, 54, 45, 64, 63, 32] // {{-- {{ $anualproducts }} --}};

        var methods = ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        var methods_stats = ['1200', '2000', '1600', '2200', '1203', '1896'];

        // {{-- @foreach ($monthlybalancebymethod as $method => $balance)
        //     methods.push('{{ $method }}');
        //     methods_stats.push('{{ $balance }}');
        // @endforeach --}}

        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });
    </script>

    {{-- sales index --}}
    <script>
        $(function() {
            $('#all').click(function() {
                $('.open').show()
                $('.unbalanced').show()
                $('.balanced').show()
                $('.try').show()
            })
            $('#open').click(function() {
                $('.open').show()
                $('.unbalanced').hide()
                $('.balanced').hide()
                $('.try').hide()
            })
            $('#unbalanced').click(function() {
                $('.open').hide()
                $('.unbalanced').show()
                $('.balanced').hide()
                $('.try').hide()
            })
            $('#balanced').click(function() {
                $('.open').hide()
                $('.unbalanced').hide()
                $('.try').hide()
                $('.balanced').show()
            })
            $('#try-out').click(function() {
                $('.open').hide()
                $('.unbalanced').hide()
                $('.balanced').hide()
                $('.try').show()
            })
        })
    </script>

    {{-- sales show --}}
    <script src="{{ asset('assets') }}/js/sweetalerts2.js"></script>
    <script>
        $(function() {
            $oTime = 0;
            $('#input-code').keyup(function(event) {
                const date = new Date();
                $nTime = date.getTime();
                if ($nTime - $oTime > 50) {
                    $(this).val($(this).val()[$(this).val().length - 1])
                }
                console.log($nTime - $oTime);
                $oTime = $nTime;
            })

            $('#input-code').on('change', function() {
                if ($(this).val().length > 5) {
                    $('#sales-products-store-form').hide().append($(this))
                    $('#sales-products-store-form').submit();
                }
            })
        })
    </script>

    <script>
        $(function() {
            $('.alert').slideDown('slow')

        })
        $(function() {
            setTimeout(() => {
                $('.alert').slideUp('slow', 0)
            }, 3000);
        })
    </script>
</body>

</html>
