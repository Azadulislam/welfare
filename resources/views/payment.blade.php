@extends('layouts.app')

@section('content')
    @php $member = $welfare_service->member; @endphp
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
                            @method('put')
                            <input type="hidden" value="{{ $member->id  }}" name="id">
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
                                        array('label'=>'Type Of Help', 'name'=>'type_of_help', 'type' => 'select', 'required' => false, 'default' => 'Select Gender', 'values' => $citizenshipCounties)
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
                            <div class="form-group">
                                <label for="exampleTextarea1">Summary</label>
                                <textarea class="form-control" name="summary" id="exampleTextarea1" rows="4">{{ old('summary') }}</textarea>
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
                                        array('label'=>'Name Of Help Recipient', 'name'=>'recipient_name', 'type' => 'text', 'required' => true),
                                        array('label'=>'Date Received', 'name'=>'date_payout', 'type' => 'date', 'required' => false)
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
                                @for($i=0;$i< 4; $i++)
                                    <div class="form-group mb-3 col-md-3 col-sm-4 col-6">
                                        <label for="exampleInputCity1">Image file</label>
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
                            <button class="btn btn-light">Cancel</button>
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
