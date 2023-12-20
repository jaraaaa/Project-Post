<x-layout>






{{-- Register form --}}
<div class="container-fluid form">
    <div class="row justify-content-center align-items-center py-5 h-100">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h2 class="display-5">Crea il tuo articolo</h2>
            @if(session('message')){
                <div class="alert alert-success text-center">
                    {{session('message')}}
                </div>
            }
            @endif
        
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
        </div>
        <div class="col-12 col-md-5 cardCust rounded-5 p-5 bg-form">
            <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title:</label>
                  <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="subtitle" class="form-label">Subtitle:</label>
                  <input type="text" name="subtitle" class="form-control" id="subtitle">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Testo:</label>
                    <textarea type="text" name="body" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine:</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria:</label>
                    <select name="category" class="form-control text-capitalize" id="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags:</label>
                    <input name="tags" id="tags" class="form-control" value="{{old('tags')}}">
                    <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                </div>
                <div class="mb-3">
                    <button class="btn btn-dark text-white">Inserisci l'articolo</button>
                    <a class="btn btn-autline-info" href="{{route('homepage')}}">Torna alla pagina Home<a>
                </div>
            </form>
        </div>
    </div>
</div>

</x-layout>