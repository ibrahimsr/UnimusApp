@extends('layouts.default')

{{-- nama content di layout di dapat dari sini --}}
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img width=150 height=150 src="{{$items->getAvatar()}}" class="img-circle" alt="Avatar">
                        <h3 class="name">{{$items->nama}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->
                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Basic Info</h4>
                            <ul class="list-unstyled list-justify">
                                <li>Nomer Induk Pegawai <span>{{$items->nip}}</span></li>
                                <li>Jenis Kelamin <span>{{$items->jenis_kelamin}}</span></li>
                                <li>Email <span>{{auth()->user()->email}}</span></li>
                                <li>Alamat <span>{{$items->alamat}}</span></li>
                            </ul>
                        </div>

                        <div class="text-center"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$items->id}}">Edit Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->
            </div>
        </div>
    </div>
</div>

{{-- edit profile --}}
<div class="modal fade" id="editModal{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-offset-3">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Edit Dosen</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lecturers.update', $items->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
          
                    <div class="form-group">
                      <label for="nip" class="form-control-label">NIP</label>
                      <input  type="text"
                              name="nip" 
                              value="{{ old('nip') ? old('nip') : $items->nip}}" 
                              class="form-control @error('nip') is-invalid @enderror" required/>
                      @error('nip') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama" class="form-control-label">Nama</label>
                        <input  type="text"
                                name="nama" 
                                value="{{ old('nama') ? old('nama') : $items->nama }}" 
                                class="form-control @error('nama') is-invalid @enderror" required/>
                        @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                          <option value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $items->jenis_kelamin }}">Laki-Laki</option>
                          <option value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $items->jenis_kelamin }}">Perempuan</option>
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="alamat" class="form-control-label">Alamat</label>
                        <textarea
                            type="text"
                            name="alamat" 
                            class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') ? old('alamat') : $items->alamat }}</textarea>
                        @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="avatar" class="form-control-label">Foto Profile</label>
                        <input  type="file"
                                name="avatar" 
                                value="{{ old('avatar') ? old('avatar') : $items->avatar }}"
                                class="form-control @error('avatar') is-invalid @enderror" />
                        @error('avatar') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary type="submit">
                        Edit Profile
                        </button>
                    </div>
          
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

