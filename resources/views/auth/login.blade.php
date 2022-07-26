<x-layouts.auth class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="row col-10 h-75 border">
        <div class="col-sm-12 col-md-6 bg-primary">

        </div>
        <div class="col-sm-12 col-md-6 container p-4">
            <h1 class="text-center text-primary">RAFARRAZI AFRICAN COUTURE</h1>
            <hr class="col-10 mb-4 mx-auto">
            <form action="{{ route('dashboard.index') }}">
                @csrf
                <x-input label="Email" />
                <x-input label="Password" />

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                            <label class="form-check-label" for="form2Example34"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="{{route('register')}}">Register</a></p>

                </div>
            </form>

        </div>
    </div>
</x-layouts.auth>