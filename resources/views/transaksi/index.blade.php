@extends('layouts.main',['title'=>'Transaksi'])
@section('content')
    <x-content :title="['name'=>'Transaksi','icon'=>'fas fa-cash-register']">
        <div class="card card-lightblue card-outline">
            <div class="card-header form-inline">
                    @include('transaksi.add',['members'=>$members])
                    <x-search-date />
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Nama</th>
                        <th>Outlet</th>
                        <th>Qty</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Batas Waktu</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php $no = $transaksis->firstItem(); ?>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <a href="{{ route('transaksi.detail',['transaksi'=>$transaksi->id]) }}" class="text-lightblue">
                                        {{ $transaksi->kode_invoice }}
                                    </a>
                                </td>
                                <td>{{ $transaksi->nama }}</td>
                                <td>{{ $transaksi->outlet }}</td>
                                <td>{{ $transaksi->qty_total }}</td>
                                <td>{{ $transaksi->total_bayar }}</td>
                                <td>{{ $transaksi->status }} ({{ $transaksi->dibayar }})</td>
                                <td>{{ $transaksi->tgl }}</td>
                                <td>{{ $transaksi->batas_waktu }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $transaksis->links('page') }}
            </div>
        </div>
    </x-content>
@endsection