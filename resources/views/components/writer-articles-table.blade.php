<div class="table-responsive">
    <table class="table-transparent">
        <thead class="">
            <tr>
                <th class="text-dark" scope="col">id</th>
                <th class="text-dark" scope="col">Titolo</th>
                <th class="text-dark" scope="col">Sottotitolo</th>
                <th class="text-dark" scope="col">Categoria</th>
                <th class="text-dark" scope="col">Tags</th>
                <th class="text-dark" scope="col">Creato il</th>
                <th class="text-dark" scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td>{{$article->title}}</td>
                    <td>{{$article->subtitle}}</td>
                    <td>{{$article->category->name ?? 'Non categorizzato'}}</td>
                    <td>
                        @foreach($article->tags as $tag)
                            <div class="d-flex flex-column">{{$tag->name}}</div>
                        @endforeach
                    </td>

                    <td>{{$article->created_at->format('d/m/Y')}}</td>


                        <td class="d-flex flex-column">
                            <a href="{{route('article.show', compact ('article'))}}" class="btn btn-secondary my-1 p-3 text-white">Leggi l'articolo</a>
                            <a href= "{{route('article.edit', compact('article'))}}" class="btn btn-warning my-1 p-3 text-white">Modifica l'articolo</a>
                            <form action="{{route('article.destroy', compact ('article'))}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger my-1">Elimina l'articolo</button>
                            </form>
                        </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
