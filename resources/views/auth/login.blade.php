<x-layouts.auth style="background-color: #987756;height: 100vh" class="d-flex justify-content-center align-items-center" >
    <div class="row col-10 h-75 border">
        <div class="col-sm-12 col-md-6 bg-primary p-0 h-100">
            <img src="{{asset('assets/img/flyer.jpg')}}" class="h-100 w-100">
        </div>
        <div class="h-100 col-sm-12 col-md-6 container p-4 d-flex flex-column justify-content-center" style="background-color: #86000c">
            <h1 class="text-center text-primary text-white">RAFARRAZI AFRICAN COUTURE</h1>
            <hr class="col-10 mb-4 mx-auto">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <x-input label="Email" name="email" />
                <x-input label="Password" type="password" name="password"/>
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
</x-layouts.auth>

