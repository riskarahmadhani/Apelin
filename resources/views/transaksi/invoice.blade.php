<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="/img/logo3.png">
</head>
<body onload="javascript:window.print()">
    <div class="container">
        <div class="row mt-2">
            <img src="/img/logo3.png" alt="" class="mr-3" style="height: 85px">
            <div class="col">
                <h3 class="mb-0">{{ $outlet->nama }}</h3>
                <p>{{ $outlet->alamat }}<br> {{ $outlet->tlp }}</p>
            </div>
            <h2>Invoice</h2>
        </div>
        <hr style="border-top: 1px solid #8c8b8b;">
        <div class="row mb-3">
            <div class="col">
                <p>
                    Nama Pelanggan : {{ $member->nama }} <br>
                    Kasir : {{ $user->nama }}
                </p>
            </div>
            <p>
                Kode Transaksi : {{ $transaksi->kode_invoice }} <br>
                Tanggal : {{ date('d/m/Y H:i:s', strtotime($transaksi->tgl)) }}
            </p>
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Nama Paket</th>
                            <th>Keterangan</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    {{ $item->qty }} x {{ number_format($item->harga,0,',','.') }}
                                </td>
                                <td>{{ $item->nama_paket }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    {{ number_format($item->qty * $item->harga,0,',','.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Sub Total :</th>
                    <td>{{ number_format($transaksi->sub_total,0,',','.') }}</td>
                  </tr>
                  <tr>
                    <th>Diskon : </th>
                    <td>{{ number_format($transaksi->diskon,0,',','.') }}</td>
                  </tr>
                  <tr>
                    <th>Biaya Tambahan :</th>
                    <td>{{ number_format($transaksi->biaya_tambahan,0,',','.') }}</td>
                  </tr>
                  <tr>
                    <th>Pajak PPN(10%) :</th>
                    <td>{{ number_format($transaksi->pajak,0,',','.') }}</td>
                  </tr>
                  <tr>
                    <th>Total : </th>
                    <td>{{ number_format($transaksi->total_bayar,0,',','.') }} </td>
                  </tr>
                    @if ($transaksi->dibayar == 'dibayar')
                  <tr>
                    <th>Tunai : </th>
                    <td>{{ number_format($transaksi->cash,0,',','.') }}</td>
                  </tr>
                  <tr>
                    <th>Kembalian : </th>
                    <td>{{ number_format($transaksi->kembalian,0,',','.') }}</td>
                  </tr>
                </table>
              </div>
            </div>
        </div>
        <h3 class="text-center mt-3">Terima Kasih</h3>
        @endif
    </div>
</body>
</html>