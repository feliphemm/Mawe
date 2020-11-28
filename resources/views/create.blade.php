@extends('templates.template')
@section('content')
     <h1 class="text-center">@if(isset($book))Editar @else Cadastrar @endif</h1>

     <div class="col-8 m-auto">
          
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2" alert-danger>
                @foreach($errors->all() as $erro)

                    {{$erro}}

                @endforeach
            
            </div>

        @endif

        @if(isset($book))
                <form name="formEdit" id="formEdit" method="post" action="{{url("books/$book->id")}}">
                @method('PUT')
        @else
                <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
        @endif
            @csrf
            
                <input class="form-control" type="text" name="title" id="title" placeHolder="Titulo:" value="{{$book->title ?? ''}}" required><br>
                <select class="form-control" name="user_id" id="user_id" required>
                        @if(isset($book))
                            <option value="{{$book->relUsers->id}}">{{$book->relUsers->name}}</option>
                        @else
                            <option value="" disabled selected>Autor</option>
                        @endif
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                </select required><br>
                <input class="form-control" type="text" name="pages" id="pages" placeHolder="Páginas:" value="{{$book->pages ?? ''}}" required><br>
                <input class="form-control" type="text" name="price" id="price" placeHolder="Preço:" value="{{$book->price ?? ''}}" required><br>

                <button class="btn btn-primary" type="submit" value="Cadastrar">@if(isset($book))Editar @else Cadastrar @endif</button>
        </form>
     </div>
@endsection