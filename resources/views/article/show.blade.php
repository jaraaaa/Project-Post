<x-layout>

    <div class="container-fluid header">
        <div class="row justify-content-center vh-100 ">
            <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center w-100"
            style="background: linear-gradient(0deg, transparent, rgba(33,37,41,1)) ,url({{Storage::url($article->image)}}); background-position: center; background-attachment:fixed; background-size: cover;">
                <h1 class="text-white">{{$article->title}}</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-10 article d-flex flex-column">
                <h6 class="mb-3"><em> Ultimo aggiornamento {{$article->updated_at->format('d/m/Y')}}</em></h6>
                <h2>{{$article->subtitle}}</h2>
                <p>{{$article->body}}</p>
                <div class="col-12 d-flex text-center align-items-center">
                    <h4><a href="{{route('article.byCategory', ['category'=>$article->category->id])}}" class="btn btn-dark text-white mx-1  btn-custom">{{$article->category->name}}</a></h4>
                <p class="small fst-italuc text-capitalize ">
                    @foreach($article->tags as $tag)
                        <div class="btn btn-light me-2"><i class="bi bi-hash text-danger"></i>{{$tag->name}}</div>
                    @endforeach
                </p>
                </div> 
            </div> 
            <div class="col-2">
                <h6> <em>Scritto da {{$article->user->name}}</em></h6>
            </div> 
                
            
            <div class="col-12 my-2">
                <a class="btn btn-dark btn-custom" href="{{route('article.index')}}">Torna indietro</a>
                @if (Auth::user() && Auth::user()->is_revisor)
                    <a class="btn btn-success text-white my-5" href="{{route('revisor.acceptArticle', compact('article'))}}">Accetta l'articolo</a>
                    <a class="btn btn-danger my-5" href="{{route('revisor.rejectArticle', compact('article'))}}">Rifiuta l'articolo</a>

                @endif
            </div>
        </div>
    </div>
</x-layout>