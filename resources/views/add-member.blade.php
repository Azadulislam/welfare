@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Personal Profile Registration</h4>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('member.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Full Name', 'name'=>'name'),
                                        array('label'=>'IC No', 'name'=>'ic_no')) as $info)
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row align-items-center required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="{{$info['label']}}" name="{{$info['name']}}"
                                                       value="{{ old($info['name']) }}" class="form-control"/>
                                            </div>
                                            @error($info['name'])
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group is-invalid row required align-items-center">
                                <label class="col-md-3 col-6 mb-0">
                                    <span>Member Type</span>
                                </label>
                                <div class="col-md-9 col-6 row">
                                    @foreach($member_statuses as $job)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $job['name'] }}
                                                    <input type="checkbox" name="member_status_ids[]"
                                                           @if(is_array(old('member_status_ids'))) @if( in_array($job['id'], old('member_status_ids') )) checked
                                                           @endif @endif value="{{ $job['id'] }}"
                                                           class="form-check-input rounded-0">
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('member_status_ids')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Date of Birth', 'name'=>'birth_date', 'type' => 'date', 'required' => true),
                                        array('label'=>'Citizenship', 'name'=>'citizenship', 'type' => 'select', 'required'=> true, 'values' => $citizenshipCounties, 'default' => 'Select Country'),
                                        array('label'=>'Gender', 'name'=>'gender', 'type' => 'select', 'required' => false, 'default' => 'Select Gender', 'values' => $genders),
                                        array('label'=>'Race', 'name'=>'race_id', 'type' => 'select', 'required' => false, 'default' => 'Select Race', 'values' => $races),
                                        array('label'=>'Religion', 'name'=>'religion_id', 'type' => 'select', 'required' => false, 'default' => 'Select Religion', 'values' => $religions),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
                                        <div class="form-group @if($data['required']) required @endif">
                                            <label class="form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            @if($data['type'] == 'text' || $data['type'] == 'date')
                                                <input type="{{ $data['type'] }}" placeholder="{{$data['label']}}" name="{{$data['name']}}"
                                                       value="{{ old($data['name']) }}" class="form-control"/>
                                            @elseif($data['type'] == 'select')
                                                <select class="form-control" name="{{$data['name']}}">
                                                    <option value="">{{ $data['default'] }}</option>
                                                    @foreach($data['values'] as $value)
                                                        <option value="{{ $value['id'] ?? $value }}"
                                                                @if(old($data['name']) == $value['id'] ?? $value) selected @endif>{{ $value['name'] ?? $value }}</option>
                                                    @endforeach
                                                </select>
                                            @endif


                                            @error($data['name'])
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group is-invalid row align-items-center required">
                                <label class="col-md-3 col-6 mb-0">
                                    <span>Marital Status</span>
                                </label>
                                <div class="col-md-9 col-6 row">
                                    @foreach($maritalStatuses as $status)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $status['name'] }}
                                                    <input type="radio" name="marital_status_id"
                                                           @if(old('marital_status_id') == $status['id']) checked
                                                           @endif value="{{ $status['id'] }}"
                                                           class="form-check-input rounded-0">
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('member_status_id')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group is-invalid">
                                <label class="">
                                    <span>Address as in IC No.</span>
                                </label>
                                <div class="row">
                                    @foreach(array(
                                            array('label'=>'Address Line 1', 'name'=>'ic_address1'),
                                            array('label'=>'Address Line 2', 'name'=>'ic_address2'),
                                            array('label'=>'Address Line 3', 'name'=>'ic_address3'),
                                            ) as $info)
                                        <div class="col-md-12 col-12">
                                            <div class="form-group row align-items-center">
                                                <label class="col-sm-3 col-form-label">{{ $info['label'] }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="{{$info['label']}}" name="{{$info['name']}}"
                                                           value="{{ old($info['name']) }}" class="form-control"/>
                                                </div>
                                                @error($info['name'])
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach(array(
                                            array('label'=>'Postcode', 'name'=>'ic_postcode', 'type' => 'text', 'required' => false),
                                            array('label'=>'Town', 'name'=>'ic_city', 'type' => 'text', 'required' => false),
                                            array('label'=>'District', 'name'=>'ic_district', 'type' => 'text', 'required' => false),
                                            array('label'=>'State', 'name'=>'ic_state_id', 'type' => 'select', 'required'=> false, 'default' => 'Select State', 'values' => $states),
                                            array('label'=>'Section', 'name'=>'ic_section', 'type' => 'text', 'required' => false),
                                            ) as $data)
                                        <div class="col-md-3 col-6">
                                            <div class="form-group @if($data['required']) required @endif">
                                                <label class="form-label">
                                                    <span>{{$data['label']}}</span>
                                                </label>
                                                @if($data['type'] == 'text' || $data['type'] == 'date' || $data['type'] == 'email')
                                                    <input type="{{ $data['type'] }}" placeholder="{{$data['label']}}" value="{{ old($data['name']) }}" name="{{$data['name']}}"
                                                           class="form-control"/>
                                                @elseif($data['type'] == 'select')
                                                    <select class="form-control" name="{{$data['name']}}">
                                                        <option value="">{{ $data['default'] }}</option>
                                                        @foreach($data['values'] as $value)
                                                            <option value="{{ $value['id'] }}" @if(old($data['name']) == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                                @error($data['name'])
                                                <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group is-invalid">
                                <label class="">
                                    <span>Latest Address</span>
                                </label>
                                <div class="row">
                                    @foreach(array(
                                            array('label'=>'Address Line 1', 'name'=>'home_address1', 'required' => true),
                                            array('label'=>'Address Line 2', 'name'=>'home_address2', 'required' => false),
                                            array('label'=>'Address Line 3', 'name'=>'home_address3', 'required' => false),
                                            ) as $info)
                                        <div class="col-md-12 col-12">
                                            <div
                                                class="form-group row align-items-center @if($info['required']) required @endif">
                                                <label class="col-sm-3 col-form-label">
                                                    <span>{{ $info['label'] }}</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="{{ $info['label'] }}" name="{{ $info['name']}}"
                                                           value="{{ old($info['name']) }}" class="form-control"/>
                                                </div>
                                                @error($info['name'])
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    @foreach(array(
                                            array('label'=>'Postcode', 'name'=>'home_postcode', 'type' => 'text', 'required' => false),
                                            array('label'=>'Town', 'name'=>'home_city', 'type' => 'text', 'required' => false),
                                            array('label'=>'District', 'name'=>'home_district', 'type' => 'text', 'required' => false),
                                            array('label'=>'State', 'name'=>'home_state_id', 'type' => 'select', 'required'=> false, 'default' => 'Select State', 'values' =>$states),
                                            array('label'=>'Section', 'name'=>'home_section', 'type' => 'text', 'required' => false),
                                            ) as $data)
                                        <div class="col-md-3 col-6">
                                            <div class="form-group @if($data['required']) required @endif">
                                                <label class="form-label">
                                                    <span>{{$data['label']}}</span>
                                                </label>
                                                @if($data['type'] == 'text' || $data['type'] == 'date' || $data['type'] == 'email')
                                                    <input type="{{ $data['type'] }}" placeholder="{{$data['label']}}" name="{{$data['name']}}"
                                                           value="{{ old($data['name']) }}" class="form-control"/>
                                                @elseif($data['type'] == 'select')
                                                    <select class="form-control" name="{{$data['name']}}">
                                                        <option value="">{{ $data['default'] }}</option>
                                                        @foreach($data['values'] as $value)
                                                            <option value="{{ $value['id'] }}"
                                                                    @if(old($data['name']) == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif


                                                @error($data['name'])
                                                <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mt-3">
                                @foreach(array(
                                        array('label'=>'Telephone (Home)', 'name'=>'telephone_one', 'type' => 'text', 'required' => false),
                                        array('label'=>'Telephone (Hand phone)', 'name'=>'mobile_phone', 'type' => 'text', 'required' => true),
                                        array('label'=>'Email', 'name'=>'email', 'type' => 'email', 'required' => false),
                                        array('label'=>'Beneficiary Name', 'name'=>'beneficiary_name', 'type' => 'text', 'required' => false),
                                        array('label'=>'Beneficiary IC Num', 'name'=>'beneficiary_ic', 'type' => 'text', 'required' => false),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
                                        <div class="form-group @if($data['required']) required @endif">
                                            <label class="form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            @if($data['type'] == 'text' || $data['type'] == 'date' || $data['type'] == 'email')
                                                <input type="{{ $data['type'] }}" placeholder="{{$data['label']}}" name="{{$data['name']}}"
                                                       value="{{ old($data['name']) }}" class="form-control"/>
                                            @elseif($data['type'] == 'select')
                                                <select class="form-control" name="{{$data['name']}}">
                                                    <option>{{ $data['default'] }}</option>
                                                    @foreach($data['values'] as $value)
                                                        <option value="{{ $value['name'] }}"
                                                                @if(old($data['name']) == $value['name']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            @error($data['name'])
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                @for($i=0;$i< 4; $i++)
                                    <div class="form-group mb-3 col-md-3 col-sm-4 col-6">
                                        <label for="exampleInputCity1">Image file</label>
                                        <input type="file" name="images[]" class="dropify" data-height="250"/>
                                        <input type="hidden" value="{{$i}}" name="oldImages[{{$i}}]"/>
                                    </div>
                                @endfor
                            </div>
                            @error('images')
                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-light" id="back">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dropify/dist/js/dropify.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
