@extends('layout') 

@section('titulo')
    Adicionar Série
@endsection

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo') 

@if ($errors->any()) 
    <div class="alert alert-danger"> 
        <ul> @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
        @endforeach 
        </ul> 
    </div> 
@endif
        <form method="post"> 
            @csrf
            <div class="row">
                <div class="col col-8">
                    <label for="nome" class="">Nome: </label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>


                <div class="col col-2">
                    <label for="qtd_temporadas" class="">Nr temporadas: </label>
                    <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
                </div>

                <div class="col col-2">
                    <label for="qtd_episodios" class="">Nr Episodios: </label>
                    <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios">
                </div>
               
            </div>  
            <button class="btn btn-primary mt-3">Adicionar</button>
        </form>
@endsection

   