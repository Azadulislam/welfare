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
                                <h4 class="card-title mb-3">Payment On Selected Help Category</h4>
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
                                        array('label'=>'Applicant Name', 'name'=>'name', 'value' => $member->name),
                                        array('label'=>'Telephone (Home)', 'name'=>'telephone_one', 'value' => $member->telephone_one),
                                        array('label'=>'IC No', 'name'=>'ic_no', 'value' => $member->ic_no),
                                        array('label'=>'Marital Status', 'name'=>'marital_status', 'value' => $member->marital_status->name),
                                        array('label'=>'Jalan', 'name'=>'jalan', 'value' => ''),
                                        array('label'=>'Date Of Birth', 'name'=>'birth_date', 'value' => $member->birth_date),
                                        array('label'=>'Seksyen', 'name'=>'seksyen', 'value' => ''),
                                        array('label'=>'Date Starts of Stay', 'name'=>'start_of_stay', 'value' => $member->start_of_stay)
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
                                        array('label'=>'Date', 'name'=>'date', 'type' => 'date', 'required' => true),
                                        array('label'=>'Help Category', 'name'=>'help_cat_id', 'type' => 'select', 'required'=> true, 'values' => $help_cats, 'default' => 'Select Country'),
                                        array('label'=>'Total RM', 'name'=>'service_cost', 'type' => 'text', 'required' => true),
                                        array('label'=>'Type Of Help', 'name'=>'help_type_id', 'type' => 'select', 'required' => true, 'default' => 'Select Category First', 'values' => [])
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
                                <label class="col-sm-3 col-md-2 col-form-label" for="exampleTextarea1">Summary</label>
                                <div class="col-sm-9 col-md-10">
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
                                        array('label'=>'Authorized By', 'name'=>'authorized_by', 'type' => 'text', 'required' => true),
                                        array('label'=>'Authorized Date', 'name'=>'authorized_date', 'type' => 'date', 'required'=> true),
                                        array('label'=>'Name Of Help Recipient', 'name'=>'payout_received_by', 'type' => 'text', 'required' => true),
                                        array('label'=>'Date Received', 'name'=>'date_payout', 'type' => 'date', 'required' => true)
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
                                    <small class="text-danger">Must Add at least one image</small>
                                </div>
                                @for($i=0;$i< 4; $i++)
                                    <div class="form-group mb-3 col-md-3 col-sm-4 col-6 required">
                                        <label for="exampleInputCity1"><span>Image file</span></label>
                                        <input type="file" name="images[]" class="dropify" data-height="250"/>
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
