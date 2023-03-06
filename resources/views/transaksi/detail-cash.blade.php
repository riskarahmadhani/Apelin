<div class="card-body border-top">
    <div class="row">
        <div class="col">
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
                <label for="">Status Bayar</label>
                <span> : {{ ucwords( str_replace('_',' ',$transaksi->dibayar)) }}</span>
            </div>
            <div class="form-group">
                <label for="">Tanggal Bayar</label>
                <span> : 
                    {{ date('d/m/Y H:i:s', strtotime($transaksi->tgl_bayar)) }}
                </span>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col">
            <div class="form-group">
                <label for="">Total</label>
                <span> : {{ number_format($transaksi->sub_total,0,',','.') }}</span>
            </div>
            <div class="form-group">
                <label for="">Diskon (Optional)</label>
                <span> : {{ number_format($transaksi->diskon,0,',','.') }}</span>
            </div>
            <div class="form-group">
                <label for="">Biaya Tambahan</label>
                <span> : {{ number_format($transaksi->biaya_tambahan,0,',','.') }}</span>
            </div>
            <div class="form-group">
                <label for="">Pajak (10%)</label>
                <span> : {{ number_format($transaksi->pajak,0,',','.') }}</span>
            </div>
            <div class="form-group">
                <label for="">Total Bayar</label>
                <span> : {{ number_format($transaksi->total_bayar,0,',','.') }}</span>
            </div>
            <div class="form-group">
                <label for="">Uang Tunai / Cash (Optional)</label>
                <span> : {{ number_format($transaksi->cash,0,',','.') }}</span>
            </div>
            <div class="form-group">
                <label for="">Kembalian</label>
                <span> : {{ number_format($transaksi->kembalian,0,',','.') }}</span>
            </div>
            <div class="form-group form-inline">
                <a href="{{ route('transaksi.index') }}" class="btn btn-default mr-2">Kembali</a>

                <div class="dropdown">
                    @if ($transaksi->status != 'diambil' && $transaksi->dibayar = 'dibayar')
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                            Update Status
                        </button>
                     @endif
                    <div class="dropdown-menu">
                        <?php 
                        $status = [
                            ['Proses','proses'],
                            ['Selesai','selesai'],
                            ['Diambil','diambil']
                        ];
                        ?>
                        @if ($transaksi->status == 'baru')
                            <a href="{{ route('transaksi.status', ['transaksi'=>$transaksi->id, 'status' => 'proses']) }}" class="dropdown-item">Proses</a>
                        @elseif ($transaksi->status == 'proses')
                            <a href="{{ route('transaksi.status', ['transaksi'=>$transaksi->id, 'status' => 'selesai']) }}" class="dropdown-item">Selesai</a>
                        @elseif ($transaksi->status == 'selesai')
                            <a href="{{ route('transaksi.status', ['transaksi'=>$transaksi->id, 'status' => 'diambil']) }}" class="dropdown-item">Diambil</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>