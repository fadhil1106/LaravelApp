@extends('template')

@section('main')
    <div id="hobby">
        <h2>Hobi</h2>

        @include('_partial.flash_message')

        @if ($hobby_list->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hobi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($hobby_list as $hobby):
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $hobby->nama_hobi }}</td>
                        <td>
                            <div class="box-button">
                                {{  link_to('hobby/' . $hobby->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE' , 'action' => ['HobbieController@destroy', $hobby->id]]) !!} 
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}   
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data hobi.</p>
        @endif

        <div class="tombol-nav">
            <a href="hobby/create" class="btn btn-primary">Tambah Hobi</a>
        </div>
    </div>
@endsection 

@section('footer')
    @include('footer')
@endsection