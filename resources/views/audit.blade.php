@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Audit Trail</p>
                        </div>

                    </div>
                    @include('layouts.errors')
                    <table id="example" class="table table-theme">
                        <thead>
                        <tr>
                            <th class="">User ID</th>
                            <th class="">Time And date</th>
                            <th class="">Activity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{ $activity['user_id'] }}</td>
                                <td>{{ $activity['created_at'] }}</td>
                                <td>{{ $activity['action_details'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: {
                    details: false
                }
            });
        });
    </script>
@endsection
