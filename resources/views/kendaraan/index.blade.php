<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body >

    <div class="container mt-5">
       
                        <a href="{{ route('kendaraan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KENDARAAN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NO. POLISI</th>
                                <th scope="col">MERK</th>
                                <th scope="col">TIPE</th>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($kendaraans as $i)
                                <tr>
                                    <td>{{ $i->nopol }}</td>
                                    <td>{{ $i->merk }}</td>
                                    <td>{{ $i->tipe }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/kendaraans/').$i->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kendaraan.destroy', $i->id) }}" method="POST">
                                            <a href="{{ route('kendaraan.edit', $i->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Kendaraan belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $kendaraans->links() }}
 
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>