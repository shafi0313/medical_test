@extends('admin.layout.master')
@section('title', 'Patient')
@section('content')
<?php $p = 'patients'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Patient Test</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Patients Table</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('patient.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Add Patient
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:5.3%">SN</th>
                                            <th>Name</th>
                                            <th>Ref. By</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            {{-- <th>Email</th> --}}
                                            {{-- <th>Mdical History</th> --}}
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th class="no-sort text-center" style="width:7%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            {{-- <th>Mdical History</th> --}}
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($patientTests as $patientTest)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $patientTest->patient->name }}</td>
                                            <td>{{ $patientTest->user->name }}</td>
                                            <td>{{ $patientTest->patient->age }}</td>
                                            <td>{{ $patientTest->patient->gender }}</td>
                                            <td>{{ $patientTest->patient->phone }}</td>
                                            {{-- <td>{{ $patientTest->patient->email }}</td> --}}
                                            {{-- <td>{{ $patientTest->patient->mdical_history }}</td> --}}
                                            <td>{{ $patientTest->patient->address }}</td>
                                            <td>{{ \Carbon\Carbon::parse($patientTest->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('patient_show_test',$patientTest->patient_id)}}" data-toggle="tooltip" title="" class="btn btn-link " data-original-title="Show All Test">
                                                        <i class="fas fa-file-medical-alt"></i>
                                                    </a>
                                                    <span>||</span>
                                                    <a href="" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- <a href="" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a> --}}
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

