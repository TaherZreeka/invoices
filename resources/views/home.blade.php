@extends('layouts.master')

@section('title', 'لوحة التحكم - برنامج الفواتير')

@section('css')
<!-- Owl-carousel css -->
<link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />
<style>
    /* Gradient cards */
    .bg-primary-gradient {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
    }

    .bg-danger-gradient {
        background: linear-gradient(135deg, #f43f5e, #f97316);
        color: #fff;
    }

    .bg-success-gradient {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
    }

    .bg-warning-gradient {
        background: linear-gradient(135deg, #facc15, #f97316);
        color: #fff;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        transition: 0.3s;
    }
</style>
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبًا بك</h2>
            <p class="mg-b-0">لوحة معلومات الفواتير</p>
        </div>
    </div>

</div>
<!-- /breadcrumb -->
@endsection

@section('content')
@php
$totalInvoices = \App\Models\Invoices::sum('Total');
$totalCount = \App\Models\Invoices::count();
$unpaidCount = \App\Models\Invoices::where('Value_Status', 2)->count();
$paidCount = \App\Models\Invoices::where('Value_Status', 1)->count();
$partialCount = \App\Models\Invoices::where('Value_Status', 3)->count();
$unpaidTotal = \App\Models\Invoices::where('Value_Status', 2)->sum('Total');
$paidTotal = \App\Models\Invoices::where('Value_Status', 1)->sum('Total');
$partialTotal = \App\Models\Invoices::where('Value_Status', 3)->sum('Total');

$cards = [
['title' => 'اجمالي الفواتير', 'total' => $totalInvoices, 'count' => $totalCount, 'icon' => 'fas fa-arrow-circle-up',
'bg' => 'primary-gradient', 'percent' => 100],
['title' => 'الفواتير الغير مدفوعة', 'total' => $unpaidTotal, 'count' => $unpaidCount, 'icon' => 'fas
fa-arrow-circle-down', 'bg' => 'danger-gradient', 'percent' => $totalCount ? round($unpaidCount / $totalCount * 100, 2)
: 0],
['title' => 'الفواتير المدفوعة', 'total' => $paidTotal, 'count' => $paidCount, 'icon' => 'fas fa-arrow-circle-up', 'bg'
=> 'success-gradient', 'percent' => $totalCount ? round($paidCount / $totalCount * 100, 2) : 0],
['title' => 'الفواتير المدفوعة جزئيا', 'total' => $partialTotal, 'count' => $partialCount, 'icon' => 'fas
fa-arrow-circle-down', 'bg' => 'warning-gradient', 'percent' => $totalCount ? round($partialCount / $totalCount * 100,
2) : 0],
];
@endphp

<!-- Dashboard Cards -->
<div class="row row-sm">
    @foreach($cards as $card)
    <x-dashboard-card class="dashboard-card" :title="$card['title']" :total="number_format($card['total'], 2)"
        :count="$card['count']" :icon="$card['icon']" :bg="$card['bg']" :percent="$card['percent']" />
    @endforeach
</div>

<!-- Charts Row -->
<div class="row row-sm mt-4">
    <!-- Bar Chart -->
    <div class="col-xl-7 col-lg-12 mb-4">
        <div class="card shadow-sm rounded">
            <div class="card-header d-flex justify-content-between bg-transparent">
                <h4 class="mb-0">نسبة احصائية الفواتير</h4>
            </div>
            <div class="card-body">
                {!! $barChart->container() !!}
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-5 col-lg-12 mb-4">
        <div class="card shadow-sm rounded">
            <div class="card-header bg-transparent">
                <label class="main-content-label">نسبة احصائية الفواتير</label>
            </div>
            <div class="card-body">
                {!! $pieChart->container() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{!! $barChart->script() !!}
{!! $pieChart->script() !!}

<!-- Optional JS for Template -->
<script src="{{ URL::asset('assets/js/index.js') }}"></script>
@endsection
