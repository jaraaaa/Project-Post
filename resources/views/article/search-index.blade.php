<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center h-search h-header">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h1 class="text-w display-3">Tutti gli articoli per: {{$query}}</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)

                <x-article-card :article="$article"/>

             
             @endforeach
        </div>
    </div>

    

</x-layout>