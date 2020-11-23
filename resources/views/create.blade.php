@extends('templates.template')
@section('content')
     <h1 class="text-center">Cadastrar</h1>

     <div class="col-8 m-auto">
          
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2" alert-danger>
                @foreach($errors->all() as $erro)

                    {{$erro}}

                @endforeach
            
            </div>

        @endif

        <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
            @csrf
            
                <input class="form-control" type="text" name="title" id="title" placeHolder="Titulo:" required><br>
                <select class="form-control" name="user_id" id="user_id" required>
                        <option value="" disabled selected>Autor</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                </select required><br>
                <input class="form-control" type="text" name="pages" id="pages" placeHolder="Páginas:" required><br>
                <input class="form-control" type="text" name="price" id="price" placeHolder="Preço:" required><br>

                <button class="btn btn-primary" type="submit" value="Cadastrar">Submit</button>
        </form>
     </div>
@endsection