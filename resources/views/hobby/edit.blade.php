@extends('template')

@section('main')
    <div id="hobby">
        <h2>Edit Hobi</h2>
        
        {!! Form::model($hobby, ['method' => 'PATCH', 'action' => ['HobbieController@update', $hobby->id]]) !!}
        @include('hobby.form', ['submitButtonText' => 'Update Hobi'])
        {!! Form::close() !!}
    </div>
@endsection 

@section('footer')
    @include('footer')
@endsection