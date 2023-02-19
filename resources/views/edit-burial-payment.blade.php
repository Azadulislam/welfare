@extends('layouts.app')

@section('content')
    @php $member = $death->member @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Registration Death Khairat Member</h4>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('burial.payment.update', $death->id) }}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row d-none">
                                <div class="form-group col-lg-12 col-md-12 col-12 required">
                                    <label for=""><span>Select Member</span></label>
                                    <select class="form-control" id="search_key">
                                    </select>
                                    <input type="hidden" name="member_id" value="{{ old('member_id', $member->id) }}">
                                    @error('member_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Full Name', 'name'=>'full_name', 'value' => $member->name),
                                        array('label'=>'Address Line 1', 'name'=>'home_address1', 'value' => $member->home_address1),
                                        array('label'=>'Seksyen', 'name'=>'fafdsaf', 'value' => $member->name),
                                        array('label'=>'City', 'name'=>'home_city', 'value' => $member->home_city),
                                        array('label'=>'District', 'name'=>'home_district', 'value' => $member->home_distirct),
                                        array('label'=>'State', 'name'=>'home_state', 'value' => getName($member->home_state)),
                                        array('label'=>'Date Of Birth', 'name'=>'birth_date', 'value' => $member->birth_date),
                                        array('label'=>'Home Telephone', 'name'=>'telephone', 'value' => $member->telephone_one),
                                        array('label'=>'Martial Status', 'name'=>'marital_status', 'value' => getName($member->marital_status)),
                                        ) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="{{$info['name']}}" readonly
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
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Burial Contact Person:', 'name'=>'burial_contact_person', 'type' => 'text', 'value' => $death->burial_contact_person),
                                        array('label'=>'Person Telephone', 'name'=>'burial_contact_person_tel', 'type' => 'text', 'value' => $death->burial_contact_person_tel),
                                        ) as $info)
                                    <div class="col-md-6 col-12">
                                        <div
                                            class="form-group row @if($info['type'] != 'textarea') align-items-center @endif required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                @if($info['type'] == 'text' || $info['type'] == 'date')
                                                    <input type="{{ $info['type'] }}" name="{{$info['name']}}" readonly
                                                           value="{{ old($info['name'], $info['value']) }}"
                                                           class="form-control"/>
                                                @endif
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
                                        array('label'=>'Amount to Pay', 'name'=>'service_cost', 'type' => 'text', 'value' => $death->service_cost),
                                        array('label'=>'Date', 'name'=>'pay_date', 'type' => 'date', 'value' => $death->pay_date),
                                        ) as $info)
                                    <div class="col-md-6 col-12">
                                        <div
                                            class="form-group row @if($info['type'] != 'textarea') align-items-center @endif required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                @if($info['type'] == 'text' || $info['type'] == 'date'|| $info['type'] == 'number')
                                                    <input type="{{ $info['type'] }}" name="{{$info['name']}}"
                                                           value="{{ old($info['name'], $info['value']) }}"
                                                           class="form-control"/>
                                                @elseif($info['type'] == 'textarea')
                                                    <textarea class="form-control" name="{{$info['name']}}"
                                                              id="{{$info['name']}}" cols="30"
                                                              rows="3">{{ old($info['name'], $info['value']) }}</textarea>
                                                @endif
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
                                <div class="col-12 col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 col-form-label">Date of Burial</label>
                                        <div class="col-sm-9">
                                            {{ $member['name'] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 col-form-label">Burial Location</label>
                                        <div class="col-sm-9">
                                            {{ $death->burial_place }}
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        let keywordEl = $('#search_key');
        $eventSelect = keywordEl.select2({
            placeholder: "Search Name/IC No",
            ajax: {
                method: 'POST',
                url: '/search-member',
                data: function (params) {
                    console.log(params)
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    let items = [];
                    $(data).each((index, item) => {
                        items.push({id: item.id, text: item.name})
                    })
                    return {
                        results: items,
                    };
                }
            },
            change: (e) => {
                console.log(e)
            }

        });
        $eventSelect.on("change", function (e) {
            fetchData($(e.target).val())
        });

        function fetchData(id) {
            $.ajax({
                'url': '/member-data/' + id,
                'Method': 'POST',
                'content-type': 'json',
                'processData': false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => {
                    let names = [
                        {name: 'member_id', value: response.id},
                        {name: 'full_name', value: response.name},
                        {name: 'home_address1', value: response.home_address1},
                        {name: 'seksyen', value: response.seksyen},
                        {name: 'home_city', value: response.city},
                        {name: 'home_district', value: response.district},
                        {name: 'home_state', value: response.state},
                        {name: 'ic_no', value: response.ic_no},
                        {name: 'birth_date', value: response.birth_date},
                        {name: 'telephone', value: response.telephone},
                        {name: 'name', value: response.name2},
                        {name: 'marital_status', value: response.marital_status}
                    ]
                    $(names).each((index, name) => {
                        $('[name="' + name.name + '"]').val(name.value)
                    })
                    $('[name="member_status_ids[]"]').each((index, checkbox) => {
                        let ids = JSON.parse(response.member_status_ids);
                        if (Array.isArray(ids)) {
                            if (ids.includes(checkbox.value)) {
                                $(checkbox).prop('checked', true)
                            }
                        } else {
                            $(checkbox).prop('checked', false)
                        }
                    })
                    $('[name="marital_status_id"]').each((index, checkbox) => {
                        let ids = response.marital_status_id;
                        if (ids == checkbox.value) {
                            $(checkbox).prop('checked', true)
                        }

                    })
                }
            })
        }

        $('.dropify').dropify();
    </script>
@endsection
