@extends('template')

@section('main')
    <div id="student">
        <h2>Edit Siswa</h2>

        {!! Form::model($student, ['method' => 'PATCH', 'action' => ['StudentController@update', $student->id], 'files' => true]) !!}    
        @include('student.form', ['submitButtonText' => 'Update Siswa'])
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
