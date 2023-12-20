<x-layout>



    {{-- Validation Error --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Login form --}}
<div class="container-fluid login">
    <div class="row justify-content-center align-items-center h-100 py-5">
        <div class="col-12 d-flex align-items-center justify-content-center my-5">
            <h1 class="display-1 text-w">Accedi</h1>
        </div>
        <div class="col-12 col-md-6 cardCust rounded-4 p-5 bg-form">
            <form action="{{route('login')}}" method="POST" >
                @csrf
                <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3 p-0 form-check">
                <button type="submit" class="btn btn-dark btn-custom">Accedi</button>
                <p class="loginNote mt-3">Non sei ancora registrato? <em><a class="aLogin" href="{{route('register')}}">Registrati ora</a></em></p>
                </div>
            </form>
        </div>
    </div>
</div>

</x-layout>