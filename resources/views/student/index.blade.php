@extends('template')

@section('main')
    <div id="siswa">
        <h2>Siswa</h2>

        @include('_partial.flash_message')
        @include('student.form_searching')

        @if (!empty($student_list))
            <table class="table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tgl Lahir</th>
                        <th>JK</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student_list as $student)
                        <tr>
                            <td>{{ $student->nisn }}</td>
                            <td>{{ $student->nama_siswa }}</td>
                            <td>{{ $student->classe->nama_kelas }}</td>
                            <td>{{ $student->tanggal_lahir->format('d-m-Y') }}</td>
                            <td>{{ $student->jenis_kelamin }}</td>
                            <td>{{ !empty($student->telephone->nomor_telepon) ? 
                                $student->telephone->nomor_telepon : '-' }}</td>
                            <td>
                                <div class="box-button">
                                    {{ link_to('student/'.$student->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                                </div>

                                @if (Auth::check())    
                                    <div class="box-button">
                                        {{ link_to('student/'.$student->id.'/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                    </div>
                                
                                    <div class="box-button">                                
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['StudentController@destroy', $student->id]]) !!}                         
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else:
            <p>Tidak ada data siswa</p>
        @endif

        <div class="table-nav">
            <div class="data-total">
                <strong>Jumlah Siswa: {{ $student_total }}</strong>
            </div>
            <div class="paging">
                {{ $student_list->links()}}
            </div>
        </div>

        @if (Auth::check())    
            <div class="button-nav">
                <div>
                <a href="/student/create" class="btn btn-primary">Tambah Siswa</a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
