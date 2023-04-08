@extends('layouts.app')

@section('content')
    @php $member = $welfare_service->member @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">{{ __('lang.payment_on_selected_help_category_text') }}</h4>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('help-provided.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{ $member->id  }}" name="member_id">
                            <input type="hidden" name="welfare_id" value="{{ $welfare_service->id }}">
                            <div class="row">
                                @foreach(array(
                                        array('label'=>__('lang.applicant_name_text'), 'name'=>'name', 'value' => $member->name),
                                        array('label'=>__('lang.telephone_home_form'), 'name'=>'telephone_one', 'value' => $member->telephone_one),
                                        array('label'=>__('lang.ic_no_text'), 'name'=>'ic_no', 'value' => $member->ic_no),
                                        array('label'=>__('lang.marital_status_form'), 'name'=>'marital_status', 'value' => getName($member->marital_status)),
                                        array('label'=>__('lang.jalan_form'), 'name'=>'jalan', 'value' => ''),
                                        array('label'=>__('lang.date_of_birth_form'), 'name'=>'birth_date', 'value' => $member->birth_date),
                                        array('label'=>__('lang.seksyen_form'), 'name'=>'seksyen', 'value' => ''),
                                        array('label'=>__('lang.date_starts_of_stay_form'), 'name'=>'start_of_stay', 'value' => $member->start_of_stay)
                                        ) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="{{$info['name']}}" readonly
                                                       value="{{ $info['value'] }}" class="form-control"/>
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
                                        array('label'=>__('lang.date_form'), 'name'=>'date', 'type' => 'date', 'required' => true),
                                        array('label'=>__('lang.help_category_form'), 'name'=>'help_cat_id', 'type' => 'select', 'required'=> true, 'values' => $help_cats, 'default' => __('lang.select_country_form')),
                                        array('label'=>__('lang.total_rm_text'), 'name'=>'service_cost', 'type' => 'text', 'required' => true),
                                        array('label'=>__('lang.type_of_help_text'), 'name'=>'help_type_id', 'type' => 'select', 'required' => true, 'default' => __('lang.select_category_first_text'), 'values' => [])
                                        ) as $data)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row @if($data['required']) required @endif">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                @if($data['type'] == 'text' || $data['type'] == 'date')
                                                    <input type="{{ $data['type'] }}" name="{{$data['name']}}"
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
                                            </div>

                                            @error($data['name'])
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="exampleTextarea1">{{ __('lang.summary_text') }}</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="summary" id="exampleTextarea1"
                                              rows="4">{{ old('summary') }}</textarea>
                                </div>
                                @error('summary')
                                <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>__('lang.authorized_by_text'), 'name'=>'authorized_by', 'type' => 'text', 'required' => true),
                                        array('label'=>__('lang.authorized_date_text'), 'name'=>'authorized_date', 'type' => 'date', 'required'=> true),
                                        array('label'=>__('lang.name_of_help_recipient_text'), 'name'=>'payout_received_by', 'type' => 'text', 'required' => true),
                                        array('label'=>__('lang.date_received_text'), 'name'=>'date_payout', 'type' => 'date', 'required' => true)
                                        ) as $data)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row @if($data['required']) required @endif">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                @if($data['type'] == 'text' || $data['type'] == 'date')
                                                    <input type="{{ $data['type'] }}" name="{{$data['name']}}"
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
                                            </div>

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
                                <div class="col-12">
                                    <small class="text-danger">{{ __('lang.must_add_at_least_one_image_text') }}</small>
                                </div>
                                @for($i=0;$i< 4; $i++)
                                    <div class="form-group mb-3 col-md-3 col-sm-4 col-6 required">
                                        <label for="exampleInputCity1"><span>{{ __('lang.image_file_form') }}</span></label>
                                        <input type="file" name="images[]" class="dropify" data-height="250"/>
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

        $('[name="help_cat_id"]').change((e) => {
            let category = $(e.currentTarget).val();
            $.ajax({
                'url': '/type/' + category,
                'method': 'get',
                'content-type': 'json',
                'processDwata': false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => {
                    let typeEl = $('[name="help_type_id"]');
                    typeEl.html('<option>Select Type</select>');
                    $(response.data).each((index, data) => {
                        typeEl.append('<option value="' + data.id + '">' + data.name + '</select>')
                    })
                    if (response.data.length < 1) {
                        typeEl.html('<option>Select Category First</select>');
                    }

                }
            })
        })

    </script>
@endsection
