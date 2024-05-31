@extends('layouts.master')
@section('title')
    {{ __('translation.Reports') }}
@endsection
@section('css')
    <!--datatable css-->
    <link href="{{ URL::asset('build/libs/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/datatable/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <style>
        .dataTable {
            width: 100% !important;
        }

        .dataTables_filter {
            width: calc(25% - 52px);
            float: right;
        }
    </style>
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('title')
                {{ __('translation.Reports') }}
            @endslot
            @slot('pagetitle')
                {{ __('translation.Sale Reports') }}
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table nowrap dt-responsive align-middle table-hover table-bordered mb-0"
                                id="saleReportTable">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('translation.Sr. No') }}</th>
                                        <th scope="col">{{ __('translation.Invoice ID') }}</th>
                                        <th scope="col">{{ __('translation.Date') }}</th>
                                        <th scope="col">{{ __('translation.Product') }}</th>
                                        <th scope="col">{{ __('translation.Category') }}</th>
                                        <th scope="col">{{ __('translation.Brand Name') }}</th>
                                        <th scope="col">{{ __('translation.Price') }}</th>
                                        <th scope="col">{{ __('translation.Quantity') }}</th>
                                        <th scope="col">{{ __('translation.Amount') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($invoiceProducts as $key1 => $invoiceValue)
                                        @foreach ($invoiceValue['product'] as $key2 => $product)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>
                                                    <p class="fw-medium mb-0">{{ $i }}</p>
                                                </td>
                                                <td>
                                                    <p class="fw-medium mb-0">{{ $invoiceValue->invoice_number }}</p>
                                                </td>
                                                <td>{{ date('d-M-Y', strtotime($invoiceValue->created_at)) }}</td>
                                                <td>{{ $product->product->product_name }}</td>
                                                <td>{{ $product->product->category->name }}</td>
                                                <td>{{ $product->product->brand->name }}</td>
                                                <td>{{ $product->currency_type }}{{ $product->rate }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->amount }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- jquery -->
        <script src="{{ URL::asset('build/js/jquery-3.6.4.min.js') }}"></script>
        <!--datatable js-->
        <script src="{{ URL::asset('build/libs/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script>
            $('#saleReportTable').dataTable();
            //Client form validate 
            (function() {
                'use strict';
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')
                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>
    @endsection
