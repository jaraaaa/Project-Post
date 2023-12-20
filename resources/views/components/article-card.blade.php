    <div class="col-12 col-md-3 mb-3">
        <div class="cardCust rounded-4" id="card">
            <a href="{{route('article.show', compact('article'))}}">
                <img src="{{Storage::url($article->image)}}" class="card-img-top cardImgCust" alt="Immagine relativo all'articolo">
            </a>
            <div class="card-body ps-3">
                <h5 class="card-title py-2">{{$article->title}}</h5>
                <p class="card-text">{{$article->subtitle}}</p>
            </div>
            <div class ="card-footer text-muted ps-3 py-3 mt-2">
                <p class="pCard mb-1" >Creato il {{$article->created_at->format('d/m/Y')}} da <a class="writerLink" href="{{route('article.byWriter', ['user'=>$article->user->id])}}"><em>{{$article->user->name}}</em></a></p>
                <a href="{{route('article.show', compact('article'))}}" class="btn btn-dark text-white mt-1 btn-custom">Leggi</a>
                <a href="{{route('article.byCategory', ['category'=>$article->category->id])}}" class="btn btn-dark text-white mx-1 mt-1 btn-custom" >{{$article->category->name}}</a>
            </div>
            <p class="small fst-italuc text-capitalize p-2">
                @foreach($article->tags as $tag)
                    #{{$tag->name}}
                @endforeach
            </p>
            @if($article->category)
                <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize"></a>
            @else
                <p class="small text-muted fst-italic text-capitalize"> Non categorizzato</p>
            @endif
        </div>
    </div>