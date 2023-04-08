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
                        <form class="forms-sample" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data"
                              method="post">
                            @csrf
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'User Name', 'name'=>'name', 'value' => $user->name),
                                        ) as $info)
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row align-items-center required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="{{$info['label']}}" name="{{$info['name']}}"
                                                       value="{{ old($info['name'], $info['value']) }}" class="form-control"/>
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                        <h4>Change Password</h4>
                        <form class="forms-sample" action="{{ route('change.password', $user->id) }}" enctype="multipart/form-data"
                              method="post">
                            @csrf
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Old Password', 'name'=>'old_password'),
                                        array('label'=>'New Password', 'name'=>'new_password'),
                                        array('label'=>'Confirm Password', 'name'=>'new_password_confirmation'),
                                        ) as $info)
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row align-items-center required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="{{$info['label']}}" name="{{$info['name']}}" class="form-control"/>
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let fields = ['Full Name', 'IC No', 'Member Type']
    </script>
@endsection
