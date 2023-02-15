@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Lis Of @if(!isset($category)) All Category @else {{ $category }}s @endif</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href="{{ route('service.create', $category_id ?? '') }}"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <i class="fa-solid fa-plus me-2"></i>
                                @if(!isset($category))
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/grid-view-icon.svg') }}">
                                @elseif($category == 'orphan')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/orphan.svg') }}">
                                @elseif($category == 'asnaf')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/asnaf.svg') }}">
                                @elseif($category == 'welfare')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/welfare.svg') }}">
                                @elseif($category == 'education')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/education.svg') }}">
                                @elseif($category == 'others')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/others.svg') }}">
                                @endif
                            </a>
                            <a href="" onclick="printDiv('printContent')"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                     src="{{ asset('./images/print.svg') }}">
                            </a>
                        </div>
                    </div>
                    @include('layouts.errors')
                    <div id="printContent">
                        <table id="example" class="table table-theme">
                            <thead>
                            <tr>
                                <th class="">Name</th>
                                <th class="">IC No</th>
                                <th class="">Address</th>
                                <th class="">Member Status</th>
                                <th class="action"><span class="sr-only">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                @php $all_member = $member->member @endphp
                                <tr>
                                    <td>{{ $all_member['name'] }}</td>
                                    <td>{{ $all_member['ic_no'] }}</td>
                                    <td>{{ $all_member['home_address1'] }}</td>
                                    <td>{{ memberStatus($all_member['member_status_ids']) }}</td>
                                    <td class="action">
                                        <div class="flex flex-row gap-2">
                                            <a href="{{ route('welfare.payment', $member['id']) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                                     src="{{ asset('./images/payment-icon.svg') }}">
                                            </a>
                                            <a href="{{ route('welfare.show', $member['id']) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>
                                            </a>
                                            <a href="{{ route('welfare.edit', $member['id']) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>
                                            </a>
                                            <form class="d-none" method="post"
                                                  action="{{ route('death.destroy', $member['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                    <i class="fa-solid fa-trash-can w-[30px] text-center leading-[30px]"></i>
                                                </button>
                                            </form>
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
