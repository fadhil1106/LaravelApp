<div id="searching">
    
    {!! Form::open(['url' => 'student/search', 'method' => 'GET' , 'id' => 'form-searching']) !!}
    <div class="row">
        <div class="col-md-2">
            {!! Form::select('id_kelas', $class_list, (! empty($id_class) ? $id_class : null), 
            ['id' => 'id_kelas', 'class' => 'form-control', 'placeholder' => '-Kelas-']) !!}
        </div>

        <div class="col-md-2">
            {!! Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], 
            (! empty($gender) ? $gender : null), 
            ['id' => 'jenis_kelamin', 'class' => 'form-control', 'placeholder' => '-Jenis Kelamin-']) !!}
        </div>

        <div class="col-md-8">
            <div class="input-group">
                {!! Form::text('keyword', (!empty($keyword)) ? $keyword : null, 
                                ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Siswa']) !!}
                <span class="input-group-btn">
                    {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
                </span>
            </div>
        </div>
    </div>
</div>