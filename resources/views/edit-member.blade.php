@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">{{ __('lang.personal_profile_registration_form') }}</h4>
                            </div>
                        </div>
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <form class="forms-sample" action="{{ route('member.update', $member->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{ $member->id  }}" name="id">
                            <div class="row">
                                @foreach(array(
                                        array('label'=>__('lang.full_name_form'), 'name'=>'name', 'value' => $member->name),
                                        array('label'=>__('lang.ic_no_form'), 'name'=>'ic_no', 'value' => $member->ic_no)) as $info)
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row align-items-center required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="{{$info['name']}}"
                                                       value="{{ old($info['name'], $info['value']) }}"
                                                       class="form-control"/>
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
                                    <span>{{ __('lang.member_type_form') }}</span>
                                </label>
                                <div class="col-md-9 col-6 row">
                                    @foreach($member_statuses as $job)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $job['name'] }}
                                                    <input type="checkbox" name="member_status_ids[]"
                                                           @if(is_array(old('member_status_ids', json_decode($member->member_status_ids)))) @if( in_array($job['id'], old('member_status_ids', json_decode($member->member_status_ids)))) checked
                                                           @endif @endif value="{{ $job->id }}"
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
                                        array('label'=>__('lang.date_of_birth_form'), 'name'=>'birth_date', 'type' => 'date', 'required' => true, 'value' => $member->birth_date),
                                        array('label'=>__('lang.citizenship_form'), 'name'=>'citizenship', 'type' => 'select', 'required'=> true, 'values' => $citizenshipCounties, 'default' => __('lang.select_country_form'), 'value' => $member->citizenship_id),
                                        array('label'=>__('lang.gender_form'), 'name'=>'gender', 'type' => 'select', 'required' => false, 'default' => __('lang.select_gender_form'), 'values' => $genders, 'value' => $member->gender_id),
                                        array('label'=>__('lang.race_form'), 'name'=>'race_id', 'type' => 'select', 'required' => false, 'default' => __('lang.select_race_form'), 'values' => $races, 'value' => $member->race_id),
                                        array('label'=>__('lang.religion_form'), 'name'=>'religion', 'type' => 'select', 'required' => false, 'default' => __('lang.select_religion_form'), 'values' => $religions, 'value' => $member->religion_id),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
                                        <div class="form-group @if($data['required']) required @endif">
                                            <label class="form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            @if($data['type'] == 'text' || $data['type'] == 'date')
                                                <input type="{{ $data['type'] }}" name="{{$data['name']}}"
                                                       value="{{ old($data['name'], $data['value']) }}"
                                                       class="form-control"/>
                                            @elseif($data['type'] == 'select')
                                                <select class="form-control" name="{{$data['name']}}">
                                                    <option value="">{{ $data['default'] }}</option>
                                                    @foreach($data['values'] as $value)
                                                        <option value="{{ $value['id'] ?? $value }}"
                                                                @if(old($data['name'], $data['value']) == $value['id'] ?? $value) selected @endif>{{ $value['name'] ?? $value }}</option>
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
                                    <span>{{ __('lang.marital_status_form') }}</span>
                                </label>
                                <div class="col-md-9 col-6 row">
                                    @foreach($maritalStatuses as $status)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $status['name'] }}
                                                    <input type="radio" name="marital_status_id"
                                                           @if(old('marital_status_id', $member->marital_status_id) == $status['id']) checked
                                                           @endif value="{{ $status['id'] }}"
                                                           class="form-check-input rounded-0">
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('marital_status_id')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group is-invalid">
                                <label class="">
                                    <span>{{ __('lang.address_as_in_ic_no_form') }}</span>
                                </label>
                                <div class="row">
                                    @foreach(array(
                                            array('label'=>__('lang.address_line_1_form'), 'name'=>'ic_address1', 'value' => $member->ic_address1),
                                            array('label'=>__('lang.address_line_2_form'), 'name'=>'ic_address2', 'value' => $member->ic_address2),
                                            array('label'=>__('lang.address_line_3_form'), 'name'=>'ic_address3', 'value' => $member->ic_address3),
                                            ) as $info)
                                        <div class="col-md-12 col-12">
                                            <div class="form-group row align-items-center">
                                                <label class="col-sm-3 col-form-label">{{ $info['label'] }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="{{$info['name']}}"
                                                           value="{{ old($info['name'], $info['value']) }}"
                                                           placeholder="{{ $info['label'] }}" class="form-control"/>
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
                                            array('label'=>__('lang.postcode_form'), 'name'=>'ic_postcode', 'type' => 'text', 'required' => false, 'value' => $member->ic_postcode),
                                            array('label'=>__('lang.town_form'), 'name'=>'ic_city', 'type' => 'text', 'required' => false, 'value' => $member->ic_city),
                                            array('label'=>__('lang.district_form'), 'name'=>'ic_district', 'type' => 'text', 'required' => false, 'value' => $member->ic_district),
                                            array('label'=>__('lang.state_form'), 'name'=>'ic_state', 'type' => 'select', 'required'=> false, 'default' => __('lang.select_state_form'), 'values' => $states, 'value' => $member->ic_state_id),
                                            ) as $data)
                                        <div class="col-md-3 col-6">
                                            <div class="form-group @if($data['required']) required @endif">
                                                <label class="form-label">
                                                    <span>{{$data['label']}}</span>
                                                </label>
                                                @if($data['type'] == 'text' || $data['type'] == 'date' || $data['type'] == 'email')
                                                    <input type="{{ $data['type'] }}" placeholder="{{ $data['label'] }}"
                                                           value="{{ $data['value'] }}" name="{{$data['name']}}"
                                                           class="form-control"/>
                                                @elseif($data['type'] == 'select')
                                                    <select class="form-control" name="{{$data['name']}}">
                                                        <option value="">{{ $data['default'] }}</option>
                                                        @foreach($data['values'] as $value)
                                                            <option
                                                                value="{{ $value['id'] }}"  @if(old($data['name'], $data['value']) == $value['id']) selected @endif>{{ $value['name'] }}</option>
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
                                    <span>{{ __('lang.latest_address_form') }}</span>
                                </label>
                                <div class="row">
                                    @foreach(array(
                                            array('label'=>__('lang.address_line_1_form'), 'name'=>'home_address1', 'required' => true, 'value' => $member->home_address1),
                                            array('label'=>__('lang.address_line_2_form'), 'name'=>'home_address2', 'required' => false, 'value' => $member->home_address2),
                                            array('label'=>__('lang.address_line_3_form'), 'name'=>'home_address3', 'required' => false, 'value' => $member->home_address3),
                                            ) as $info)
                                        <div class="col-md-12 col-12">
                                            <div
                                                class="form-group row align-items-center @if($info['required']) required @endif">
                                                <label class="col-sm-3 col-form-label">
                                                    <span>{{ $info['label'] }}</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="{{$info['name']}}"
                                                           value="{{ old($info['name'], $info['value']) }}"
                                                           placeholder="{{ $info['label'] }}" class="form-control"/>
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
                                            array('label'=>__('lang.postcode_form'), 'name'=>'home_postcode', 'type' => 'text', 'required' => false, 'value' => $member->home_postcode),
                                            array('label'=>__('lang.town_form'), 'name'=>'home_city', 'type' => 'text', 'required' => false, 'value' => $member->home_city),
                                            array('label'=>__('lang.district_form'), 'name'=>'home_district', 'type' => 'text', 'required' => false, 'value' => $member->home_district),
                                            array('label'=>__('lang.state_form'), 'name'=>'home_state', 'type' => 'select', 'required'=> false, 'default' => __('lang.select_state_form'), 'values' => $states, 'value' => $member->home_state_id),
                                            ) as $data)
                                        <div class="col-md-3 col-6">
                                            <div class="form-group @if($data['required']) required @endif">
                                                <label class="form-label">
                                                    <span>{{$data['label']}}</span>
                                                </label>
                                                @if($data['type'] == 'text' || $data['type'] == 'date' || $data['type'] == 'email')
                                                    <input type="{{ $data['type'] }}" name="{{$data['name']}}"
                                                           placeholder="{{ $data['label'] }}"
                                                           value="{{ old($data['name'], $data['value']) }}"
                                                           class="form-control"/>
                                                @elseif($data['type'] == 'select')
                                                    <select class="form-control" name="{{$data['name']}}">
                                                        <option value="">{{ $data['default'] }}</option>
                                                        @foreach($data['values'] as $value)
                                                            <option value="{{ $value['id'] }}"
                                                                    @if(old($data['name'], $data['value']) == $value['id']) selected @endif>{{ $value['name'] }}</option>
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
                                        array('label'=>__('lang.telephone_home_form'), 'name'=>'telephone_one', 'type' => 'text', 'required' => false, 'value' => $member->telephone_one),
                                        array('label'=>__('lang.telephone_hand_phone_form'), 'name'=>'mobile_phone', 'type' => 'text', 'required' => false, 'value' => $member->mobile_phone),
                                        array('label'=>__('lang.email_form'), 'name'=>'email', 'type' => 'email', 'required' => false, 'value' => $member->email),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
                                        <div class="form-group @if($data['required']) required @endif">
                                            <label class="form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            @if($data['type'] == 'text' || $data['type'] == 'date' || $data['type'] == 'email')
                                                <input type="{{ $data['type'] }}" name="{{$data['name']}}"
                                                       value="{{ old($data['name'], $data['value']) }}"
                                                       class="form-control"/>
                                            @elseif($data['type'] == 'select')
                                                <select class="form-control" name="{{$data['name']}}">
                                                    <option>{{ $data['default'] }}</option>
                                                    @foreach($data['values'] as $value)
                                                        <option value="{{ $value['name'] }}"
                                                                @if(old($data['name'], $data['value']) == $value['name']) selected @endif>{{ $value['name'] }}</option>
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
                                        <label for="exampleInputCity1">{{ __('lang.image_file_form') }}</label>
                                        <input type="file" name="images[]" class="dropify"
                                               data-default-file="{{ asset('uploads/'.$member->{'attache_file'.($i + 1)}) }}"
                                               data-height="250"/>
                                        <input type="hidden" value="{{ $member->{'attache_file'.($i + 1)} }}"
                                               name="oldImages[{{$i}}]"/>
                                    </div>
                                @endfor
                            </div>
                            @error('images')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary mr-2">{{ __('lang.submit_text') }}</button>
                            <a class="btn btn-light" id="back">{{ __('lang.cancel_text') }}</a>
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
