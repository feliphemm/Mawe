@extends('templates.template')
@section('content')
     <h1 class="text-center">Crud</h1>

     <div class="text-center">
        <a href="{{'books/create'}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
     
     </div>

     <div class="col-8 m-auto">
     <table class="table text-center table-striped table-dark mt-3 mb-4" >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
              @foreach($book as $books)
                 @php 
                $user=$books->find($books->id)->relUsers;
                 @endphp

                <tr>
                  <th scope="row">{{$books->id}}</th>
                  <td>{{$books->title}}</td>
                  <td>{{$user->name}}</td>
                  <td step='.1'>{{$books->price}}</td>
                  <td>
                      <a href="{{url("books/$books->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                      </a>
                      <a href="">
                            <button class="btn btn-primary">Editar</button>
                      </a>
                      <a href="">
                            <button class="btn btn-danger">Deletar</button>
                      </a>
                  <td>
                </tr>
  
              @endforeach
    
            </tbody>
        </table>
     </div>
@endsection