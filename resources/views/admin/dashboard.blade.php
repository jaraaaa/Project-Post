<x-layout>
        <div class="container-fluid">
            <div class="row justify-content-center header h-dashboard-a h-header">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="display-5 text-white">Bentornato, Amministratore</h2>
                </div>
            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success text-center">
                {{session('message')}}
            </div>
        @endif

        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-12 d-flex flex-column align-content-center cardCust rounded-4 mb-5 p-3">
                    <h2 class="text-center mb-5">Richieste per Ruolo Amministratore</h2>
                    <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
                </div>
                <div class="col-12 d-flex flex-column align-content-center my-5 cardCust rounded-4 p-3">
                    <h2 class="text-center mb-5">Richieste per Ruolo Revisore</h2>
                    <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
                </div>
                <div class="col-12 d-flex flex-column align-content-center cardCust rounded-4 mt-5 p-3">
                    <h2 class="text-center mb-5">Richieste per Ruolo redattore</h2>
                    <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
                </div>
                <hr>
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-12 cardCust rounded-4 mt-5 p-3">
                            <h2>I tags della piattaforma</h2>
                            <x-metainfo-table :metaInfos="$tags" metaType="tags"> </x-metainfo-table>
                        </div>
                    </div>
                </div>
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-12 cardCust rounded-4 mt-5 p-3">
                            <h2>Le categorie della piattaforma</h2>
                            <x-metainfo-table :metaInfos="$categories" metaType="catogorie"> </x-metainfo-table>
                            <form class="d-flex" action="" methos="">
                                @csrf
                                <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                                <button type="submit" class="btn btn-success text-white"><i class="bi bi-plus-circle"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>