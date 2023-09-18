@extends('adminlte::page')
@section('title', 'SIKLIS | Shortlink - QR Code')
@section('content_header')
<h1 class="m-0 text-dark">Shortlink - QR Code</h1>

@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createModal">
                        Tambah
                    </button>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Shortlink</th>
                                <th>Jenis</th>
                                <th>Tautan</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortlinks as $key => $shortlink)
                            <tr>
                                <td id={{$key+1}}>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$shortlink->url_shortlink}}</td>
                                <td id={{$key+1}}>{{$shortlink->jenis}}</td>
                                <td id={{$key+1}}>{{$shortlink->url_original}}</td>
                                <td id={{$key+1}}>
                                    <img src="{{ asset('/storage/s/' . $shortlink->url_shortlink ) }}" alt="" width="150">
                                </td>
                                <td>
                                    @include('components.action-buttons', ['id' => $shortlink->id_shortlink, 'key' => $key,'route' => 'shortlink'])
                                </td>

                            </tr>
                            <!-- Edit modal -->
{{--
                            <div class="modal fade" id="editModal{{$pd->id_pendidikan}}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel{{$pd->id_pendidikan}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Pendidikan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pendidikan.update', $pd->id_pendidikan) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id_users"
                                                    value="{{ Auth::user()->id_users}}">

                                                <div class="form-group">
                                                    <label for="id_tingkat_pendidikan"> Tingkat Pendidikan</label>
                                                    <select class="form-select @error('nama') isinvalid @enderror"
                                                        id="id_tingkat_pendidikan" name="id_tingkat_pendidikan">
                                                        @foreach ($tingpen as $tp)
                                                        <option value="{{ $tp->id_tingkat_pendidikan }}" @if(
                                                            old('id_tingkat_pendidikan')==$tp->
                                                            id_tingkat_pendidikan )
                                                            selected @endif">
                                                            {{ $tp->nama_tingkat_pendidikan }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('level') <span class="textdanger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_sekolah" class="form-label">Nama
                                                        Pendidikan</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_sekolah') is-invalid @enderror"
                                                        id="nama_sekolah" name="nama_sekolah"
                                                        value="{{$pd ->nama_sekolah ?? old('nama_sekolah')}}">
                                                    @error('nama_sekolah') <span class="textdanger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="jurusan" class="form-label">Jurusan</label>

                                                    <input type="text"
                                                        class="form-control @error('jurusan') is-invalid @enderror"
                                                        id="jurusan" name="jurusan"
                                                        value="{{$pd ->jurusan ?? old('jurusan')}}">
                                                    @error('jurusan') <span class="textdanger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>

                                                    <input type="text"
                                                        class="form-control @error('tahun_lulus') is-invalid @enderror"
                                                        id="tahun_lulus" name="tahun_lulus"
                                                        value="{{$pd ->tahun_lulus ?? old('tahun_lulus')}}"
                                                        maxlength="4">
                                                    @error('tahun_lulus') <span class="textdanger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">

                                                    <label for="ijazah">Ijazah Kelulusan</label>

                                                    <small class="form-text text-muted">Allow file extensions : .jpeg
                                                        .jpg .png .pdf
                                                        .docx</small>

                                                    @if ($pd->ijazah)
                                                    <p>Previous File: <a
                                                            href="{{ asset('/storage/pendidikan/' . $pd->ijazah) }}"
                                                            target="_blank">{{ $pd->ijazah }}</a></p>
                                                    @endif

                                                    <input type="file" name="ijazah" id="ijazah" class="form-control">
                                                    @error('ijazah')
                                                    <span class="textdanger">{{$message}}</span> @enderror

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="{{route('pendidikan.index')}}" class="btn btn-danger">
                                                        Batal
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="addMeditlLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Shortlink - QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('shortlink.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_users" value="{{ Auth::user()->id_users}}">

                    <div class="form-group">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" >
                            <option value="form" @if(old('jenis') === 'form') selected @endif>Form</option>
                            <option value="sertifikat" @if(old('jenis') === 'sertifikat') selected @endif>Sertifikat</option>
                            <option value="laporan" @if(old('jenis') === 'laporan') selected @endif>Laporan</option>
                            <option value="multiplelink" @if(old('jenis') === 'multiplelink') selected @endif>Multiplelink</option>
                            <option value="zoom" @if(old('jenis') === 'zoom') selected @endif>Zoom</option>
                            <option value="leaflet" @if(old('jenis') === 'leaflet') selected @endif>Leaflet</option>
                            <option value="lainnya" @if(old('jenis') === 'lainnya') selected @endif>Lainnya</option>
                        </select>
                        @error('jenis')
                        <span class="textdanger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_shortlink" class="form-label">Nama Shortlink</label>
                        <input type="text" class="form-control @error('nama_shortlink') is-invalid @enderror"id="nama_shortlink" name="nama_shortlink" value="{{old('nama_shortlink')}}">
                        @error('nama_shortlink')
                        <span class="textdanger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="url_original" class="form-label">Tautan</label>
                        <input type="text" class="form-control @error('url_original') is-invalid @enderror"id="url_original" name="url_original" value="{{old('url_original')}}">
                        @error('url_original')
                        <span class="textdanger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
$('#example2').DataTable({
    "responsive": true,
});
</script>
@endpush
