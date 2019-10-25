@extends('template')

@section('main')
    <div id="student">
        <h2>Tambah Siswa</h2>
        
        {!! Form::open(['url' => 'student', 'files' => true]) !!}
        @include('student.form', ['submitButtonText' => 'Tambah Siswa'])
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
