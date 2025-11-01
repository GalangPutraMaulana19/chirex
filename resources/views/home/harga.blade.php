@extends('layouts.app')

@section('title', 'Info Harga')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Informasi Harga Obat dan Vaksin</h3>
    </div>
    <div class="box-body">
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> Informasi harga obat dan vaksin untuk ayam. 
            Harga dapat berbeda di setiap daerah dan toko.
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat/Vaksin</th>
                        <th>Kategori</th>
                        <th>Perkiraan Harga</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Vaksin ND</td>
                        <td>Vaksin</td>
                        <td>Rp 50.000 - Rp 100.000</td>
                        <td>Vaksin Newcastle Disease</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Vaksin IB</td>
                        <td>Vaksin</td>
                        <td>Rp 60.000 - Rp 120.000</td>
                        <td>Vaksin Infectious Bronchitis</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Antibiotik Doksisiklin</td>
                        <td>Obat</td>
                        <td>Rp 30.000 - Rp 80.000</td>
                        <td>Untuk infeksi bakteri</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Multivitamin</td>
                        <td>Suplemen</td>
                        <td>Rp 25.000 - Rp 50.000</td>
                        <td>Meningkatkan daya tahan tubuh</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Obat Cacing</td>
                        <td>Obat</td>
                        <td>Rp 20.000 - Rp 60.000</td>
                        <td>Antelmintik</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian:</strong> Harga bersifat estimasi dan dapat berubah sewaktu-waktu. 
            Konsultasikan dengan dokter hewan untuk penggunaan obat yang tepat.
        </div>
    </div>
</div>
@endsection
