

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('namacust') is-invalid @enderror" name="namacust" value="{{ old('namacust') }}" placeholder="Masukkan Nama Pelanggan">
                            
                                <!-- error message untuk title -->
                                @error('namacust')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Organisasi Pelanggan</label>
                                <input type="text" class="form-control @error('orgcust') is-invalid @enderror" name="orgcust" value="{{ old('orgcust') }}" placeholder="Masukkan organisasi Pelanggan">
                            
                                <!-- error message untuk title -->
                                @error('orgcust')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Email Pelanggan</label>
                                <input type="text" class="form-control @error('emailcust') is-invalid @enderror" name="emailcust" value="{{ old('emailcust') }}" placeholder="Masukkan email Pelanggan">
                            
                                <!-- error message untuk title -->
                                @error('emailcust')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">No HP Pelanggan</label>
                                <input type="text" class="form-control @error('hpcust') is-invalid @enderror" name="hpcust" value="{{ old('hpcust') }}" placeholder="Masukkan no HP Pelanggan">
                            
                                <!-- error message untuk title -->
                                @error('hpcust')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Paket yang Diambil</label>
                                <input type="text" class="form-control @error('jenispaket') is-invalid @enderror" name="jenispaket" value="{{ old('jenispaket') }}" placeholder="Masukkan Paket yang akan diambil">
                            
                                <!-- error message untuk title -->
                                @error('jenispaket')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Harga Total</label>
                                <input type="text" class="form-control @error('hargafinal') is-invalid @enderror" name="hargafinal" value="{{ old('hargafinal') }}" placeholder="Masukkan Harga Total Paket">                            
                                <!-- error message untuk title -->
                                @error('hargafinal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Yang Dibayarkan</label>
                                <input type="text" class="form-control @error('jumlahpembayaran') is-invalid @enderror" name="jumlahpembayaran" value="{{ old('jumlahpembayaran') }}" placeholder="Masukkan Jumlah pembayaran pelanggan saat ini">                            
                                <!-- error message untuk title -->
                                @error('jumlahpembayaran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Mulai</label>
                                <input  min="2022-09-06" value="{{old('waktu_ambil')}}" class="form-control @error('waktu_ambil') is-invalid @enderror" type="date" name="waktu_ambil" class="form-control" placeholder="Date"> 
                                {{-- <input type="text" class="form-control @error('jumlahpembayaran') is-invalid @enderror" name="jumlahpembayaran" value="{{ old('jumlahpembayaran') }}" placeholder="Masukkan Jumlah pembayaran pelanggan saat ini">                             --}}
                                <!-- error message untuk title -->
                                @error('waktu_ambil')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jam Mulai</label>
                                <select  name="jam_mulai" id="jam_mulai" class="form-control" value="{{old('jam_mulai')}}">
                                    <option value="">-- pilih jam --</option>
                                    @for($i=1;$i<25;$i++)
                                    <option value={{$i.":00"}}>
                                        {{$i.":00"}}
                                    </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Selesai</label>
                                <input  min="2022-09-06" value="{{old('waktu_selesai')}}" class="form-control @error('waktu_selesai') is-invalid @enderror" type="date" name="waktu_selesai" class="form-control" placeholder="Date"> 
                                {{-- <input type="text" class="form-control @error('jumlahpembayaran') is-invalid @enderror" name="jumlahpembayaran" value="{{ old('jumlahpembayaran') }}" placeholder="Masukkan Jumlah pembayaran pelanggan saat ini">                             --}}
                                <!-- error message untuk title -->
                                @error('waktu_selesai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jam Selesai</label>
                                <select name="jam_selesai" id="jam_selesai" class="form-control" value="{{old('jam_selesai')}}">
                                    <option value="">-- pilih jam --</option>
                                    @for($i=1;$i<25;$i++)
                                    <option value={{$i.":00"}}>
                                        {{$i.":00"}}
                                    </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan Tambahan</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="keteranganinvoice" rows="5" placeholder="Masukkan Keterangan tambahan">{{ old('keteranganinvoice') }}</textarea>
                                <!-- error message untuk title -->
                                @error('keteranganinvoice')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>