@extends('template')

@section('main')
    <div id="class">
        <h2>Tambah Kelas</h2>
        
        {!! Form::open(['url' => 'class']) !!}
        @include('class.form', ['submitButtonText' => 'Tambah Kelas'])
        {!! Form::close() !!}
        
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection