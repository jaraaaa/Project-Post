<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center header h-dasboard-r h-header">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h2 class="display-3">Bentornato, Redattore</h2>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
    @endif

    <div class="container m-5">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column align-content-center cardCust rounded-4 mb-5 p-3">
                <h2 class="text-center mb-5">Articoli in fase di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles"/>
            </div>
            <div class="col-12 d-flex flex-column align-content-center cardCust rounded-4 my-5 p-3">
                <h2 class="text-center mb-5">Articoli pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles"/>
            </div>
            <div class="col-12 d-flex flex-column align-content-center cardCust rounded-4 mt-5 p-3">
                <h2 class="text-center mb-5">Articoli respinti</h2>
                <x-writer-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>
</x-layout>