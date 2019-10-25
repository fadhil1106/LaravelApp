@extends('template')

@section('main')
    <div>
        <h2>Edit Kelas</h2>

        
        {!! Form::model($classe, ['method' => 'PATCH', 'action' => ['ClasseController@update',$classe->id]]) !!}
        @include('class.form', ['submitButtonText' => 'Update Kelas'])
        {!! Form::close() !!}
        
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection