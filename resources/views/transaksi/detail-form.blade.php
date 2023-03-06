<form action="{{ route('transaksi.update',['transaksi'=>$transaksi->id]) }}" method="post" class="card-body border-top">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tanggal</label>
                <span class="col"> : 
                    {{ date('d/m/Y H:i:s', strtotime($transaksi->tgl)) }}
                </span>
            </div>
            <div class="form-group">
                <label for="">Batas Waktu</label>
                <span> : 
                    {{ date('d/m/Y H:i:s', strtotime($transaksi->batas_waktu)) }}
                </span>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <span> : {{ ucwords($transaksi->status) }}</span>
            </div>
            @if ($transaksi->status == 'diambil')
                <div class="form-group">
                    <label for="">Tanggal Diambil</label>
                    <span class="col"> : 
                        {{ date('d/m/Y H:i:s', strtotime($transaksi->tgl_diambil)) }}
                    </span>
                </div>
            @endif
            <div class="form-group">
                <label>Status Bayar</label>
                <span> : {{ ucwords( str_replace('_',' ',$transaksi->dibayar)) }}</span>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-6">
            <div class="form-group row">
                <label for="" class="col">Total</label>
                <div class="col">
                    <x-input-transaksi
                    name="total"
                    id="total"
                    :value="$transaksi->sub_total" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col">Diskon (Optional)</label>
                <div class="col">
                    <x-input-transaksi
                    name="diskon"
                    id="diskon"
                    :value="$transaksi->diskon" />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col">Biaya Tambahan (Optional)</label>
                <div class="col">
                    <x-input-transaksi
                    name="biaya_tambahan"
                    id="biaya_tambahan"
                    :value="$transaksi->biaya_tambahan" />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col">Pajak (10%)</label>
                <div class="col">
                    <x-input-transaksi
                    name="pajak"
                    id="pajak"
                    :value="$transaksi->pajak" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col">Total Bayar</label>
                <div class="col">
                    <x-input-transaksi
                    name="total_bayar"
                    id="total_bayar"
                    :value="$transaksi->total_bayar" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col">Uang Tunai / Cash (Optional)</label>
                <div class="col">
                    <x-input-transaksi
                    name="uang_tunai"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col form-inline">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-default mr-2">Kembali </a>

                    <div class="dropdown">
                        @if ($transaksi->status != 'diambil' && $transaksi->dibayar = 'belum_dibayar')
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                Update Status
                            </button>
                            <div class="dropdown-menu">
                                <?php 
                                $status = [
                                    ['Proses','proses'],
                                    ['Selesai','selesai'],
                                ];
                                ?>
                                @if ($transaksi->status == 'baru')
                                    <a href="{{ route('transaksi.status', ['transaksi'=>$transaksi->id, 'status' => 'proses']) }}" class="dropdown-item">Proses</a>
                                @elseif ($transaksi->status == 'proses')
                                    <a href="{{ route('transaksi.status', ['transaksi'=>$transaksi->id, 'status' => 'selesai']) }}" class="dropdown-item">Selesai</a>
                                @elseif ($transaksi->status == 'selesai')
                                    <button disabled class="dropdown-item">Silahkan Bayar</button>
                                @endif
                            </div>
                        @endif
                    </div>

                </div>
                <div class="col">
                    <button type="submit" class="btn bg-lightblue btn-block">
                        <i class="fas fa-database"></i> Update Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('js')
    <script>
        

        $('#diskon, #biaya_tambahan').keyup(function () {
            let t = parseInt($('#total').val());
            let d = parseInt($('#diskon').val());
            let bt = parseInt($('#biaya_tambahan').val());
            d = isNaN(d) ? 0 : d;
            bt = isNaN(bt) ? 0 : bt;
            let total = t - d + bt;
            let pajak = Math.round(total * 10 / 100);
            $("#pajak").val(pajak);
            $("#total_bayar").val(total + pajak);
        })
    </script>
@endpush