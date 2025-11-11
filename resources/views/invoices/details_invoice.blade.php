@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

<style>
    /* 🎨 تحسين مظهر الجداول */
    table {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    th {
        background-color: #f5f6fa !important;
        font-weight: 600;
        text-align: center;
        color: #333;
    }

    td {
        background: #fff;
        vertical-align: middle !important;
    }

    tr:hover td {
        background-color: #f0f8ff !important;
        transition: 0.2s ease-in-out;
    }

    .table thead th {
        border: none;
    }

    .table td,
    .table th {
        padding: 12px 15px;
    }

    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .content-title {
        font-weight: bold;
    }

    .badge {
        font-size: 13px;
        padding: 6px 10px;
    }

    .nav-link.active {
        background-color: #0d6efd !important;
        color: white !important;
        border-radius: 8px;
    }

    .tabs-menu1 ul li a {
        border-radius: 8px;
    }

    .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
    }

    .custom-file-label::after {
        content: "تصفح";
    }

    table {
        border-collapse: separate;
        border-spacing: 0 8px;
        width: 100%;
    }

    th {
        background-color: #f5f6fa !important;
        font-weight: 600;
        text-align: center;
        color: #333;
        white-space: nowrap;
    }

    td {
        background: #fff;
        vertical-align: middle !important;
        text-align: center;
        word-break: break-word;
    }

    tr:hover td {
        background-color: #f0f8ff !important;
        transition: 0.2s ease-in-out;
    }

    .table thead th {
        border: none;
    }

    .table td,
    .table th {
        padding: 12px 15px;
    }

    .table-responsive {
        border-radius: 12px;
        overflow-x: auto;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .content-title {
        font-weight: bold;
    }

    .badge {
        font-size: 13px;
        padding: 6px 10px;
    }

    .nav-link.active {
        background-color: #0d6efd !important;
        color: white !important;
        border-radius: 8px;
    }

    .tabs-menu1 ul li a {
        border-radius: 8px;
        transition: 0.3s;
    }

    .tabs-menu1 ul li a:hover {
        background-color: #e9ecef;
    }

    .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
    }

    .custom-file-label::after {
        content: "تصفح";
    }

    /* 🌐 جعل التصميم متجاوب (Responsive) */
    @media (max-width: 992px) {

        th,
        td {
            font-size: 13px;
            padding: 8px;
        }

        .nav.panel-tabs.main-nav-line {
            flex-direction: column;
            align-items: stretch;
        }

        .nav.panel-tabs.main-nav-line li {
            width: 100%;
            margin-bottom: 5px;
        }

        .btn {
            margin: 3px 0;
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        table {
            font-size: 12px;
        }

        .card-body h5 {
            font-size: 14px;
        }

        .custom-file-label::after {
            content: "اختيار";
        }
    }
</style>
@endsection

@section('title')
تفاصيل فاتورة
@stop

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex align-items-center">
            <h4 class="content-title mb-0 my-auto">قائمة الفواتير</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الفاتورة</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

{{-- ✅ رسائل التنبيه --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab"><i
                                                    class="fas fa-file-invoice"></i> معلومات الفاتورة</a></li>
                                        <li><a href="#tab5" class="nav-link" data-toggle="tab"><i
                                                    class="fas fa-money-check-alt"></i> حالات الدفع</a></li>
                                        <li><a href="#tab6" class="nav-link" data-toggle="tab"><i
                                                    class="fas fa-paperclip"></i> المرفقات</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                <div class="tab-content">

                                    {{-- 🧾 معلومات الفاتورة --}}
                                    <div class="tab-pane active" id="tab4">
                                        <div class="table-responsive mt-15">
                                            <table class="table table-hover table-striped" style="text-align:center">
                                                <tbody>
                                                    <tr>
                                                        <th>رقم الفاتورة</th>
                                                        <td>{{ $invoices->invoice_number }}</td>
                                                        <th>تاريخ الاصدار</th>
                                                        <td>{{ $invoices->invoice_Date }}</td>
                                                        <th>تاريخ الاستحقاق</th>
                                                        <td>{{ $invoices->Due_date }}</td>
                                                        <th>القسم</th>
                                                        <td>{{ $invoices->Section->section_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>المنتج</th>
                                                        <td>{{ $invoices->product }}</td>
                                                        <th>مبلغ التحصيل</th>
                                                        <td>{{ $invoices->Amount_collection }}</td>
                                                        <th>مبلغ العمولة</th>
                                                        <td>{{ $invoices->Amount_Commission }}</td>
                                                        <th>الخصم</th>
                                                        <td>{{ $invoices->Discount }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>نسبة الضريبة</th>
                                                        <td>{{ $invoices->Rate_VAT }}</td>
                                                        <th>قيمة الضريبة</th>
                                                        <td>{{ $invoices->Value_VAT }}</td>
                                                        <th>الاجمالي مع الضريبة</th>
                                                        <td>{{ $invoices->Total }}</td>
                                                        <th>الحالة الحالية</th>
                                                        <td>
                                                            @if ($invoices->Value_Status == 1)
                                                            <span class="badge badge-success">{{ $invoices->Status
                                                                }}</span>
                                                            @elseif($invoices->Value_Status ==2)
                                                            <span class="badge badge-danger">{{ $invoices->Status
                                                                }}</span>
                                                            @else
                                                            <span class="badge badge-warning">{{ $invoices->Status
                                                                }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ملاحظات</th>
                                                        <td colspan="7">{{ $invoices->note }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- 💵 حالات الدفع --}}
                                    <div class="tab-pane" id="tab5">
                                        <div class="table-responsive mt-15">
                                            <table class="table table-hover table-bordered" style="text-align:center">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>رقم الفاتورة</th>
                                                        <th>نوع المنتج</th>
                                                        <th>القسم</th>
                                                        <th>حالة الدفع</th>
                                                        <th>تاريخ الدفع</th>
                                                        <th>ملاحظات</th>
                                                        <th>تاريخ الاضافة</th>
                                                        <th>المستخدم</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($details as $i => $x)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $x->invoice_number }}</td>
                                                        <td>{{ $x->product }}</td>
                                                        <td>{{ $invoices->Section->section_name }}</td>
                                                        <td>
                                                            @if ($x->Value_Status == 1)
                                                            <span class="badge badge-success">{{ $x->Status }}</span>
                                                            @elseif($x->Value_Status ==2)
                                                            <span class="badge badge-danger">{{ $x->Status }}</span>
                                                            @else
                                                            <span class="badge badge-warning">{{ $x->Status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $x->Payment_Date }}</td>
                                                        <td>{{ $x->note }}</td>
                                                        <td>{{ $x->created_at }}</td>
                                                        <td>{{ $x->user }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- 📎 المرفقات --}}
                                    <div class="tab-pane" id="tab6">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <p class="text-danger">* صيغة المرفق pdf, jpeg, jpg, png</p>
                                                <h5 class="card-title">إضافة مرفق</h5>
                                                <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="file_name" required>
                                                        <input type="hidden" name="invoice_number"
                                                            value="{{ $invoices->invoice_number }}">
                                                        <input type="hidden" name="invoice_id"
                                                            value="{{ $invoices->id }}">
                                                        <label class="custom-file-label" for="customFile">حدد
                                                            المرفق</label>
                                                    </div>
                                                    <br><br>
                                                    <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
                                                </form>
                                            </div>

                                            <div class="table-responsive mt-15">
                                                <table class="table table-hover table-bordered text-center">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>م</th>
                                                            <th>اسم الملف</th>
                                                            <th>قام بالإضافة</th>
                                                            <th>تاريخ الإضافة</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($attachments as $i => $attachment)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $attachment->file_name }}</td>
                                                            <td>{{ $attachment->Created_by }}</td>
                                                            <td>{{ $attachment->created_at }}</td>
                                                            <td>
                                                                <a class="btn btn-outline-success btn-sm"
                                                                    href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}">
                                                                    <i class="fas fa-eye"></i> عرض
                                                                </a>
                                                                <a class="btn btn-outline-info btn-sm"
                                                                    href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}">
                                                                    <i class="fas fa-download"></i> تحميل
                                                                </a>
                                                                <button class="btn btn-outline-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-file_name="{{ $attachment->file_name }}"
                                                                    data-invoice_number="{{ $attachment->invoice_number }}"
                                                                    data-id_file="{{ $attachment->id }}"
                                                                    data-target="#delete_file">
                                                                    حذف
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- tab-content -->
                            </div><!-- panel-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('delete_file') }}" method="post" class="modal-content">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body text-center">
                <h6 class="text-danger">هل أنت متأكد من حذف هذا المرفق؟</h6>
                <input type="hidden" name="id_file" id="id_file">
                <input type="hidden" name="file_name" id="file_name">
                <input type="hidden" name="invoice_number" id="invoice_number">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-danger">تأكيد</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
<script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

<script>
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        $('#id_file').val(button.data('id_file'));
        $('#file_name').val(button.data('file_name'));
        $('#invoice_number').val(button.data('invoice_number'));
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection