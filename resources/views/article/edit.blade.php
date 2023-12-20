<x-layout>

    {{-- Register form --}}
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">Modifica il tuo articolo</h1>
        </div>
    </div>
    <div class="container m-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
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


                <form class="card p-5 shadow" action="{{route('article.update', compact('article') )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$article->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" name="subtitle" value="{{$article->subtitle}}" class="form-control" id="subtitle">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine attuale:</label>
                        <img src="{{Storage::url($article->image)}}" height="100px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input name="image" type="file" class="form-control" id="image" >
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category" class="form-control text-capitalize" id="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @if($article->category == $category) selected @endif>
                                {{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Testo:</label>
                        <textarea type="text" name="body" id="body" cols="30" rows="7" class="form-control">{{$article->body}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" id="tags" class="form-control" value="{{$article->tags-> implode('name', ', ')}}">
                        <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark text-white">Inserisci l'articolo</button>
                        <a class="btn btn-autline-info" href="{{route('homepage')}}">Torna alla Home<a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>