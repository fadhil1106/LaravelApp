@extends('template')

@section('main')
    <div id="hobby">
        <h2>Tambah Hobi</h2>
        
        {!! Form::open(['url' => 'hobby']) !!}
        @include('hobby.form', ['submitButtonText' => 'Tambah Hobi'])
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection