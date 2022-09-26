<x-layouts.auth  style="background-color: #987756" class="d-flex justify-content-center align-items-center vh-100 ">

    {{-- <div class="d-flex justify-content-center align-items-center vwh-100 "> --}}
        <div class="d-flex flex-wrap col-lg-10 col-md-10 col-sm-10 h-75 justify-content-center" >

            <div class="col-lg col-md-12 bg-primary h-100 border" style="">
                <img src="{{asset('assets/img/flyer.jpg')}}" class="h-100 w-100">
            </div>
        
            <div class="col-lg col-md col-sm-12  p-4 d-flex flex-column justify-content-center m-0" style="background-color: #86000c">
                <h1 class="text-center text-primary text-white">RAFARRAZI AFRICAN COUTURE</h1>
                <hr class="col-10 mb-4 mx-auto bg-white">
                <form action="{{ route('dashboard.index') }}">
                    @csrf
                    <x-input label="Email" />
                    <x-input label="Password" type="password" />
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                                <label class="form-check-label text-white" for="form2Example34"> Remember me </label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Simple link -->
                            <a style="color: #8a6103; text-decoration: underline;" href="#!">Forgot password?</a>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="row justify-content-center"><button type="submit" class="btn btn-primary mb-4 col-4" style="background: #8a6103">Sign in</button></div>
                    <!-- Register buttons -->
                    <div class="text-center">
                        <p class="text-white">Not a member? <a href="{{route('register')}}" style="color: #8a6103; text-decoration: underline;">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    {{-- </div> --}}
</x-layouts.auth>