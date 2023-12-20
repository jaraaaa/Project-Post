<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center header h-careers h-header">
            <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <h2>Lavora con noi</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">
                <h2>Lavora come amministratore</h2>
                <p>Scegli quale ruolo vuoi fare: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, dicta.</p>
                <h2>Lavora come revisore</h2>
                <p>Scegli quale ruolo vuoi fare: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, dicta.</p>
                <h2>Lavora come redattore</h2>
                <p>Scegli quale ruolo vuoi fare: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, dicta.</p>
            </div>

            <div class="col-12 col-md-6">


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

            <form action="{{route('careers.submit')}}" method="POST" class="p-5">
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">Per quale ruolo ti stai cadidando?</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Scegli qui</option>
                        <option value="admin">Amministratore</option>
                        <option value="revisor">Revisore</option>
                        <option value="writer">Redattore</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" name="email" class="form-control" id="email" @if (Auth::user())
                    value="{{old('email') ?? Auth::user()->email}}"
                  @endif aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Parlaci di te:</label>
                    <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{old('message')}}</textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-dark text-white">Invia la candidatura</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</x-layout>