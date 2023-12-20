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

{{-- Register form --}}
<div class="container-fluid register">
    <div class="row justify-content-center align-items-center py-5">
        <div class="col-12 d-flex align-items-center justify-content-center my-5">
            <h1 class="display-3">Registrati</h1>
        </div>
        <div class="col-12 col-md-6 cardCust rounded-4 p-5  bg-form">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email address:</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" >
                  </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password:</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <div class="mb-3 p-0 form-check">
                    <button type="submit" class="btn btn-dark btn-custom">Registrati</button>
                    <p class="loginNote mt-3">Sei già registrato? <em><a class="aLogin" href="{{route('login')}}">Accedi</a></em></p>
                </div>
            </form>
        </div>
    </div>
</div>


</x-layout>