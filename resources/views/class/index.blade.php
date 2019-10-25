@extends('template')

@section('main')
    <div id="class">
        <h2>Kelas</h2>

        @include('_partial.flash_message')

        @if (count($class_list) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($class_list as $class)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $class->nama_kelas }}</td>
                        <td>
                            <div class="box-button">
                                
                                {!! Form::open(['method' => 'DELETE', 'action' => ['ClasseController@destroy', $class->id]]) !!}
                                {!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada kelas.</p>
        @endif

        <div class="tombo-nav">
            <a href="class/create" class="btn btn-primary">Tambah Kelas</a>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection