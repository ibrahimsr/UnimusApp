@extends('layouts.default')

{{-- nama content di layout di dapat dari sini --}}
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-md-5 col-md-offset-1"">
                    <h3>Data Dosen</h3>
                </div>
                <div class="col-md-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-square"></i>
                        Tambah
                    </button>
                </div>

                
                <div class="col-md-10 center col-md-offset-1">
                    <div class="panel">
                       
                        <div class="panel-body">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1 ?>
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nip}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->jenis_kelamin}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>
            
                                        <a href="{{route('lecturers.profile', $item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                                <i class="fa fa-pencil">  </i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                           
                                        </td>
                                    </tr> 
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data Tidak Ada
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{$items->links()}} --}}
                        </div>
                    </div>
                    <!-- END BASIC TABLE -->
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content col-md-offset-3">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Dosen</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('lecturers.store') }}" method="POST">
                @csrf
      
                <div class="form-group">
                  <label for="nip" class="form-control-label">NIP</label>
                  <input  type="text"
                          name="nip" 
                          value="{{ old('nip') }}" 
                          class="form-control @error('nip') is-invalid @enderror" required/>
                  @error('nip') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama</label>
                    <input  type="text"
                            name="nama" 
                            value="{{ old('nama') }}" 
                            class="form-control @error('nama') is-invalid @enderror" required/>
                    @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input  type="text"
                            name="email" 
                            value="{{ old('email') }}" 
                            class="form-control @error('email') is-invalid @enderror" required/>
                    @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>

                <div class="form-group">
                    <label for="alamat" class="form-control-label">alamat</label>
                    <textarea  type="textarea"
                            name="alamat" 
                            value="{{ old('alamat') }}" rows="3"
                            class="form-control @error('alamat') is-invalid @enderror" required></textarea>
                    @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
      
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button class="btn btn-primary" type="submit">
                    Tambah Dosen
                  </button>
                </div>
      
              </form>
        </div>
    </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach ($items as $it)
<div class="modal fade" id="editModal{{$it->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-offset-3">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Edit</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lecturers.update', $it->id) }}" method="POST">
                    @method('PUT')
                    @csrf
          
                    <div class="form-group">
                      <label for="nip" class="form-control-label">NIP</label>
                      <input  type="text"
                              name="nip" 
                              value="{{ old('nip') ? old('nip') : $it->nip}}" 
                              class="form-control @error('nip') is-invalid @enderror" required/>
                      @error('nip') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama" class="form-control-label">Nama</label>
                        <input  type="text"
                                name="nama" 
                                value="{{ old('nama') ? old('nama') : $it->nama }}" 
                                class="form-control @error('nama') is-invalid @enderror" required/>
                        @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                          <option value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $it->jenis_kelamin }}">Laki-Laki</option>
                          <option value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $it->jenis_kelamin }}">Perempuan</option>
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="alamat" class="form-control-label">alamat</label>
                        <textarea
                            type="text"
                            name="alamat" 
                            class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') ? old('alamat') : $it->alamat }}</textarea>
                        @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary type="submit">
                        Edit Dosbing
                        </button>
                    </div>
          
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Modal -->
@foreach ($items as $it)
<div class="modal fade" id="deleteModal{{$it->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-offset-3">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Yakin Hapus ?</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('lecturers.destroy', $it->id)}}" method="POST">
                    @csrf
                    @method('delete')
          
                    <div class="form-group">
                      Data Yang Dihapus tidak dapat dikembalikan lagi
                    </div>
          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-danger type="submit">Hapus</button>
                    </div>
          
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

