<div class="relation col-12">
    <div class="row mt-3">
        <div class="col-12">
            <h4>Dependants</h4>
        </div>
        <div class="col-md-11 col-12 mb-3">
            <div class="row relation-header">
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">Name</span></div>
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">Ic No</span></div>
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">Telephone</span></div>
                <div class="col-md-3 col-12"><span class="d-none d-md-inline-block">Relation</span></div>
            </div>
        </div>
    </div>


    <div class="relation-list">
        @php
            $i = 1;
        @endphp
        @forelse($member['relation_ships'] as $relation)
            <div class="row mb-3">
                <div class="col-9 col-md-11">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <span>{{ $i }}.{{ " ". $relation['relatedTo']['name'] }}</span>
                        </div>
                        <div class="col-md-3 col-12">
                            <span>{{ $relation['relatedTo']['ic_no'] }}</span>
                        </div>
                        <div class="col-md-3 col-12">
                            <span>{{ ($relation['relatedTo']['mobile_phone']) }}</span>
                        </div>
                        <div class="col-md-3 col-12">
                            <span>{{ $relation['relationship']['name'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @empty
            <div class="row">
                {{--    <div class="col-1 max-45"></div>--}}
                <div class="col-9 col-md-11">
                    <p class="text-primary">No Dependants Yet</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
