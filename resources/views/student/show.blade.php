@extends('template')

@section('main')
    <div id="student">
        <h2>Detail Siswa</h2>

        <table class="table table-striped">
            <tr>
                <th>NISN</th>
                <td>{{ $student->nisn }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $student->nama_siswa }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $student->classe->nama_kelas }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $student->tanggal_lahir->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $student->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>{{ !empty($student->telephone->nomor_telepon) ?
                    $student->telephone->nomor_telepon : '-' }}</td>
            </tr>
            <tr>
                <th>Hobi</th>
                <td>
                    @foreach ($student->hobbie as $item)
                        <span>{{ $item->nama_hobi }}</span>,
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if (isset($student->foto))
                        <img src="{{ asset('fotoupload/' .$student->foto) }}" alt="Foto Siswa">
                    @else
                        @if ($student->jenis_kelamin == "L")
                            <img src="{{ asset('fotoupload/dummymale.jpg') }}" alt="Foto Siswa">
                        @else
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}" alt="Foto Siswa">
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
