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
                    <li class="nav-item"><a href="{{ route('patient.index')}}">Show Patient</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Create Patient</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Patient</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('patient.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name">Patient Name<span class="t_r">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Enter Name" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="phone">Patient Contact No<span class="t_r">*</span></label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone')}}" placeholder="Enter Contact No" required>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="email">Patient Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" placeholder="Enter Name">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check col-sm-3">
                                        <label>Gender<span class="t_r">*</span></label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="gender" value="Male" checked="">
                                            <span class="form-radio-sign">Male</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="gender" value="Female">
                                            <span class="form-radio-sign">Female</span>
                                        </label>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="age">Patient Age<span class="t_r">*</span></label>
                                        <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" id="age" value="{{old('age')}}" placeholder="Enter Age" required>
                                        @error('age')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="address">Patient Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="2" {{old('address')}}></textarea>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="medical_history">Medical History</label>
                                        <textarea class="form-control" id="medical_history" name="medical_history" rows="2" {{old('medical_history')}}></textarea>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="app_sow" name="iftest" type="checkbox" value="1">
                                        <span class="form-check-sign">Click here if you want to take an apartment</span>
                                    </label>
                                </div>

                                <div class="row app" style="display: none">
                                    <h3 style="margin-top: 10px; margin-left: 25px; font-weight: bold">Select Test:</h3>
                                    @foreach($testCats as $testCat)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" id="" name="test_cat_id[]" type="checkbox" value="{{$testCat->id}}">
                                            <span class="form-check-sign">{{$testCat->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div align="center" class="mr-auto card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    {{-- Page Content End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom_scripts')
<script>
    $('#app_sow').click(function() {
        $('.app').slideToggle("slide");
    });
</script>
@endpush

@endsection

