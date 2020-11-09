@extends('admin.layout.master')
@section('title', 'Patient Test')
@section('content')
<?php $p = 'patients'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a>
                    </li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Patients Table</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('patient.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Add Patient
                                </a>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            {{-- <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <table class="table">
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td>{{$patientInfo->patient->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>:</td>
                                            <td>{{$patientInfo->patient->age}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div> --}}
                            <div class="text-center">
                                <h1><strong>Name: </strong>{{$patientInfo->patient->name}}</h1>
                                <h3>
                                    <strong>Age: </strong> {{$patientInfo->patient->age}} Years<br>
                                    <strong>Phone: </strong>{{$patientInfo->patient->phone}}<br>
                                    <strong>Address: </strong>{{$patientInfo->patient->address}}<br>
                                    <strong>Ref.By: </strong>{{$patientInfo->user->name}}
                                </h3>
                            </div>

                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:38px">SN</th>
                                            <th>Test</th>
                                            <th>Date</th>
                                            <td class="no-sort" style="width:120px; text-align:center">Action</td>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @php $x=1;@endphp
                                        @foreach($showTests as $showTest)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $showTest->test->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($showTest->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                {{-- Kub Pvr --}}
                                                <div class="form-button-action" style="display:{{($showTest->test_cat_id == '1')?'inline-block':'none'}}">
                                                    <a href="{{route('kub-Prv.show',$showTest->id)}}" target="_blank" style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}">Show</a>
                                                    <span style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}" class="mx-2">||</span>
                                                    <a href="{{route('kubPrv.create',$showTest->id)}}" class="display:">{{($showTest->r_status=='1')?'Update':'Create'}}</a>
                                                    {{-- <a href="" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a> --}}
                                                </div>

                                                {{-- Pregnancy Profile --}}
                                                <div class="form-button-action" style="display:{{($showTest->test_cat_id == '2')?'inline-block':'none'}}">
                                                    <a href="{{route('pregnancy-profile.show',$showTest->id)}}" target="_blank" style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}">Show</a>
                                                    <span style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}" class="mx-2">||</span>
                                                    <a href="{{route('pregnancy-profile.create',$showTest->id)}}">{{($showTest->r_status=='1')?'Update':'Create'}}</a>
                                                </div>

                                                {{-- Whole Abdomen Female --}}
                                                <div class="form-button-action" style="display:{{($showTest->test_cat_id == '3')?'inline-block':'none'}}">
                                                    <a href="{{route('whole-abdomen-female.show',$showTest->id)}}" target="_blank" style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}">Show</a>
                                                    <span style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}" class="mx-2">||</span>
                                                    <a href="{{route('whole-abdomen-female.create',$showTest->id)}}">{{($showTest->r_status=='1')?'Update':'Create'}}</a>
                                                </div>

                                                {{-- Whole Abdomen Male --}}
                                                <div class="form-button-action" style="display:{{($showTest->test_cat_id == '4')?'inline-block':'none'}}">
                                                    <a href="{{route('whole-abdomen-male.show',$showTest->id)}}" target="_blank" style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}">Show</a>
                                                    <span style="display:{{($showTest->r_status=='1')?'inline-block':'none'}}" class="mx-2">||</span>
                                                    <a href="{{route('whole-abdomen-male.create',$showTest->id)}}">{{($showTest->r_status=='1')?'Update':'Create'}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('sweetalert::alert') --}}
@push('custom_scripts')
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 10,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });
    });
</script>
<script>
    $('.delete').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endpush
@endsection

