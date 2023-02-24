@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Payment Of Memorial Service</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href=""
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                     src="{{ asset('./images/print.svg') }}">
                            </a>
                        </div>
                    </div>
                    @include('layouts.errors')
                    <table id="example" class="table table-theme">
                        <thead>
                        <tr>
                            <th class="">Dead Person Name</th>
                            <th class="">IC No.</th>
                            <th class="">Address</th>
                            <th class="">Date of Death</th>
                            <th class="">Amount Paid</th>
                            <th class="">Burial Contact Person</th>
                            <th class=""><span class="sr-only">Action</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deaths as $death)
                            @php $member = $death->member @endphp
                            <tr>
                                <td>{{ $member['name'] }}</td>
                                <td>{{ $member['ic_no'] }}</td>
                                <td>{{ $member['home_address1'] }}</td>
                                <td>{{ memberStatus($member['member_status_ids']) }}</td>
                                <td>{{ $death['service_cost'] }}</td>
                                <td>{{ $death['burial_contact_person'] }}</td>
                                <td>
                                    <div class="flex flex-row gap-2">
                                        <a href="{{ route('burial.payment.create', $death->id) }}" title="Update Payment for death Member"
                                           class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center d-block">
                                            <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                                 src="{{ asset('./images/payment-icon1.svg') }}">
                                        </a>
                                    </div>
                                </td>
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
