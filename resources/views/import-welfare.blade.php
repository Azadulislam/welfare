@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Khairat Kematian Report Excel</h4>
                            </div>
                        </div>
                        @include('layouts.errors')
                        <form class="forms-sample" action="{{ route('import.welfare') }}" enctype="multipart/form-data"
                              method="post">
                            @csrf
                            <div class="form-group is-invalid">
                                <div class="form-group row align-items-center required">
                                    <label class="col-sm-3 col-form-label"><span>Select File</span></label>
                                    <div class="col-sm-9">
                                        <input type="file" name="importXl" class="dropify"/>
                                    </div>
                                    @error('importXl')
                                    <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @error('help_cat_id')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
