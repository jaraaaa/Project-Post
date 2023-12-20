<div class="table-resposive">
    <table class="table-transparent">
        <thead class="">
            <tr>
                <th class="text-dark" scope='col'>id</th>
                <th class="text-dark" scope='col'>Nome</th>
                <th class="text-dark" scope='col'>Q.ta articoli collegati</th>
                <th class="text-dark" scope='col'>Aggiorna</th>
                <th class="text-dark" scope='col'>Cancella</th>
                {{-- <th class="text-dark" scope='col'>Nuova categoria</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($metaInfos as $metaInfo)
            <tr>
                <th scope='row'>{{$metaInfo->id}}</th>
                <td>{{$metaInfo->name}}</td>
                <td>{{count($metaInfo->articles)}}</td>
                @if($metaType == "tags")
                <td>
                    <form action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline">
                        <button type='submit' class="btn btn-info text-white"><i class="bi bi-pencil-square"></i></button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
                @else
                <td>
                    <form class="d-flex justify-content-center" action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST">
                         @csrf
                         @method('put')
                         <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline">
                         <button type="submit" class="btn btn-info text-white"><i class="bi bi-pencil-square"></i></button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
                {{-- <td>
                    <form  class="d-flex" action="{{route('admin.storeCategory', ['tag' => $metaInfo])}}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control me-2" placeholder="Inserisci nuova categoria">
                        <button type="submit" class="btn btn-success text-white">Aggiungi</button>
                    </form>
                </td> --}}
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
