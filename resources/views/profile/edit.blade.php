@extends('layout')
@section('title','Editar Informacion')

@section('contenido')
    <div class='container'>
        <h1>Informacion de usuario</h1>
        
         <form action="{{route('profile.update',$user)}}" method="post">
            @csrf
             <div class="campoFormulario">
                 <label for="Nombre">
                    Nombre: <br>
                     <input type="text" name="name" id="name" value="{{$user->name}}">
                 </label>
             </div>
             <div class="campoFormulario">
                 <label for="Email">
                    Email: <br>
                    <input type="email" name="email" id="email" value="{{$user->email}}">
                </label>

             </div>
             <div class="campoFormulario">
                 <label for="Password">
                     Password: <br>
                     <input type="password" name="password" id="password" value="{{$user->password}}">
                 </label>

             </div>
             <div class="campoFormulario">
                 <label for="Confirmar Password">
                     Confirmar Password  <br>
                     <input type="password" name="" id="" value="{{$user->password}}">
                 </label>             

             </div>
            <div>
               <button type="submit">Actualizar datos</button>
            </div>
         </form>

    </div>
@endsection