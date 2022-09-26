<x-layouts.auth style="background-color: #987756;height: 100vh" class="d-flex justify-content-center align-items-center" >
    <div class="row col-10 h-75 border">
        <div class="col-sm-12 col-md-6 bg-primary p-0">
            <img src="{{asset('assets/img/flyer.jpg')}}" class="h-100 w-100">
        </div>
        <div class="col-sm-12 col-md-6 container p-4" style="background-color: #86000c">
            <h1 class="text-center text-primary text-white">RAFARRAZI AFRICAN COUTURE</h1>
            <hr class="col-10 mb-4 mx-auto">
            <form action="{{ route('dashboard.index') }}">
                @csrf
                <x-input label="Username" />
                <x-input label="Email" />
                <x-input label="Password" type="password" />
                <x-input label="Retype Password" type="password"/>

                <div class="row mb-4">
                    <div class="text-center">
                        <p class="m-0 text-white">Already have an account ?</p>
                    </div>
                    <div class="text-center">
                        <a style="color: #8a6103; text-decoration: underline;" href="{{ route('login') }}">Sign in</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" style="background: #8a6103">Sign up</button>
            </form>

        </div>
    </div>
</x-layouts.auth>