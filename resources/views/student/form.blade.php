@if (isset($student))
    {!! Form::hidden('id', $student->id) !!}
@endif

{{-- NISN --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('nisn') ?
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nisn', 'NISN', ['class' => 'control-label']) !!}
    {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nisn'))
        <span class="help-block">{{ $errors->first('nisn') }}</span>
    @endif
</div>

{{-- NAMA SISWA --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_siswa') ?
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_siswa', 'Nama Siswa', ['class' => 'control-label']) !!}
    {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_siswa'))
        <span class="help-block">{{ $errors->first('nama_siswa') }}</span>
    @endif
</div>

{{-- TANGGAL LAHIR --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('tanggal_lahir') ?
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_lahir', !empty($student) ? $student->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
    @if ($errors->has('tanggal_lahir'))
        <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
    @endif
</div>

{{-- JENIS KELAMIN --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('jenis_kelamin') ?
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'control-label']) !!}
    <div class="radio">
        <label>
            {!! Form::radio('jenis_kelamin', 'L') !!}
            Laki-Laki
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('jenis_kelamin', 'P') !!}
            Perempuan
        </label>
    </div>
    @if ($errors->has('jenis_kelamin'))
        <span class="help-block ">{{ $errors->first('jenis_kelamin') }}</span>
    @endif
</div>

{{-- NOMOR TELEPON --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('nomor_telepon') ?
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nomor_telepon', 'Telepon:', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nomor_telepon'))
        <span class="help-block">
            {{ $errors->first('nomor_telepon') }}</span>        
    @endif
</div>

{{-- KELAS --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('id_kelas') ?
            'has-error' : 'has-success' }}">       
@else
    <div class="form-group">
@endif
    {!! Form::label('id_kelas', 'Kelas:', ['class' => 'control-label']) !!}
    @if (count($class_list) > 0)
        {!! Form::select('id_kelas', $class_list, null, ['class' => 'form-control', 'id' => 'id_kelas', 'placeholder' => 'Pilih Kelas']) !!}
    @else
        <p>Tidak ada pilihan kelas</p>
    @endif
    @if ($errors->has('id_kelas'))
        <span class="help-block">
            {{ $errors->first('id_kelas') }}</span>
    @endif
</div>

{{-- HOBI --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('hobi_siswa') ?
        'has-error' : 'has-success' }}">       
@else
    <div class="form-group">
@endif
    {!! Form::label('hobi_siswa', 'Hobi:', ['class' => 'control-label']) !!}
    @if (count($hobbie_list) > 0)
        @foreach ($hobbie_list as $key => $value)
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('hobi_siswa[]', $key, null) !!}
                    {{ $value }}
                </label>
            </div>
        @endforeach
    @else
        <p>Tidak ada pilihan hobi</p>
    @endif
</div>

{{-- FOTO --}}
@if ($errors->any())
    <div class="form-group {{ $errors->has('foto') ?
        'has-error' : 'has-success' }}">       
@else
    <div class="form-group">
@endif
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
    @if ($errors->has('foto'))
        <span class="help-block">{{ $errors->first('foto') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
