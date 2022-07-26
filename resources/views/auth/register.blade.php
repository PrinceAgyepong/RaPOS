<x-layout class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="row col-10 h-75 border">
        <div class="col-sm-12 col-md-6 bg-primary">

        </div>
        <div class="col-sm-12 col-md-6 container p-4">
            <h1 class="text-center text-primary">RAFARRAZI AFRICAN COUTURE</h1>
            <hr class="col-10 mb-4 mx-auto">
            <form>

                <x-input label="Username" />
                <x-input label="Email" />
                <x-input label="Password" />
                <x-input label="Retype Password" />

                <div class="row mb-4">
                    <div class="text-center">
                        <p class="m-0">Already have an account ?</p>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}">Sign in</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
            </form>

        </div>
    </div>
</x-layout>