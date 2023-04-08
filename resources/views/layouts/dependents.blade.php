<div class="relation col-12">
    <div class="row mt-3">
        <div class="col-12">
            <h4>{{ __('lang.dependants_text') }}</h4>
        </div>
        <div class="col-md-11 col-12">
            <div class="row relation-header">
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">{{ __('lang.name_text') }}</span></div>
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">{{ __('lang.ic_no_text') }}</span></div>
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">{{ __('lang.telephone_text') }}</span></div>
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block required">{{ __('lang.relation_text') }}</span></div>
            </div>
        </div>
    </div>

    <form action="{{ route('relation.store') }}" method="POST">
        <div class="row align-items-center" id="relationShip">
            {{--    <div class="col-md-1 d-none d-md-block max-45"></div>--}}
            <div class="col-md-11 col-12">
                @csrf
                <div class="row align-items-center">
                    <input type="hidden" name="member_id" value="{{ $member['id'] }}">
                    <div class="col-12">
                        <input type="checkbox" name="custom" @if( old('custom') == 'on') checked @endif class="chk-col-light-blue" id="md_checkbox_7">
                        <label for="md_checkbox_7"> {{ __('lang.new_text') }}</label>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group @error('related_to_id') has-danger @enderror" id="exiting_name">
                            <select class="form-control custom-select @error('related_to_id') form-control-danger @enderror" name="related_to_id" data-get="member">
                                <option value="">{{ __('lang.select_member_form') }}</option>
                                @foreach($members as $member)
                                    <option value="{{ $member['id'] }}" @if( old('related_to_id') == $member['id']) selected @endif>{{ $member['name'] }}</option>
                                @endforeach
                            </select>
                            @error('related_to_id')
                            <small class="invalid-feedback d-block form-control-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="form-group @error('member_name') has-danger @enderror" id="custom_name">
                            <input class="form-control @error('member_name') form-control-danger @enderror" type="text" name="member_name" placeholder="{{ __('lang.name_text') }}" value="{{ old('member_name') }}">
                            @error('member_name')
                            <small class="form-control-feedback d-block invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group @error('ic_no') has-danger @enderror">
                            <input class="form-control @error('ic_no') form-control-danger @enderror" type="text" name="ic_no" placeholder="{{ __('lang.ic_no_text') }}" value="{{ old('ic_no') }}" id="ic_no" readonly>
                            @error('ic_no')
                            <small class="invalid-feedback d-block form-control-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group @error('telephone') has-danger @enderror">
                            <input class="form-control @error('telephone') form-control-danger @enderror" type="text" name="telephone" placeholder="{{ __('lang.telephone_text') }}" value="{{ old('telephone') }}" id="telephone">
                            @error('telephone')
                            <small class="invalid-feedback d-block form-control-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group @error('relation_id') has-danger @enderror">
                            <select class="form-control custom-select @error('relation_id') form-control-danger @enderror" name="relation_id">
                                <option value="">{{ __('lang.select_relation_text') }}</option>
                                @foreach($relations as $relation)
                                    <option value="{{ $relation['id'] }}" @if( old('relation_id') == $relation['id']) selected @endif>{{ $relation['name'] }}</option>
                                @endforeach
                            </select>
                            @error('relation_id')
                            <small class="invalid-feedback d-block form-control-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-1 col-12 text-center text-md-left">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-check d-none d-md-inline-block"></i> <span class="d-block d-md-none">Save</span></button>
                </div>
            </div>
        </div>
    </form>


    <div class="relation-list">
        @php
            $i = 1;
        @endphp
        @forelse($relationships as $relation)
            <div class="row">
                {{--    <div class="col-1 max-45"></div>--}}
                <div class="col-9 col-md-11">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-12">
                            <span>{{ $i }}.{{ " ". $relation['relatedTo']['name'] }}</span>
                        </div>
                        <div class="col-md-3 col-12">
                            <span>{{ $relation['relatedTo']['ic_no'] }}</span>
                        </div>
                        <div class="col-md-3 col-12">
                            <span>{{ ($relation['relatedTo']['telephone_one']) }}</span>
                        </div>
                        <div class="col-md-3 col-12">
                            <span>{{ $relation['relationship']['name'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-1 hideOnPrint py-2">
                    <form class="d-inline-block" method="post" action="{{ route('relation.destroy', $relation['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="confirmDelete(event)" class="btn text-white btn-danger"><i class="mdi mdi-delete"></i></button>
                    </form>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @empty
            <div class="row">
                {{--    <div class="col-1 max-45"></div>--}}
                <div class="col-9 col-md-11">
                    <p class="text-primary">{{ __('lang.no_dependants_yet_text') }}</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
