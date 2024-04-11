@extends('layout')  

@section('titulo')
    Lista de Séries
@endsection

@section('cabecalho')
        Series
@endsection

@section('conteudo')   
    @if(!empty($mensagem))
        <div class="alert alert-success" role="alert">
            {{$mensagem}}
        </div>
    @endif

    <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2"> Adicionar </a>

    <ul class="list-group"> 
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->name }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->name }}">
                    <div class="input-group-append">                       
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/series/remover/{{ $serie->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

    <script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }


    function editarSerie(serieId) {
        let formData = new FormData();
        const name = document
            .querySelector(`#input-nome-serie-${serieId} > input`)
            .value;
            alert(name);
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('name', name);
        formData.append('_token', token);
        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
        method: 'POST',
        body: formData
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = name;
        });

        alert(url);
    }
    </script>


@endsection


    
    
