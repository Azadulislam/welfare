<div class="helpRecord col-12 mb-4">
    <div class="row mt-3">
        <div class="col-12">
            <h5>{{ __('lang.help_record_text') }}</h5>
        </div>
    </div>

    <table id="example" class="table table-theme">
        <thead>
        <tr>
            <th class="">{{ __('lang.date_form') }}</th>
            <th class="">{{ __('lang.help_category_form') }}</th>
            <th class="">{{ __('lang.help_type_text') }}</th>
            <th class="">{{ __('lang.remarks_text') }}</th>
            <th class="">{{ __('lang.value_rm_text') }}</th>
            <th class=""><span class="sr-only">{{ __('lang.action_text') }}</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($welfare->helps as $help)
            <tr>
                <td>{{ $help['created_at'] }}</td>
                <td>{{ $help->category->name }}</td>
                <td>{{ $help->type->name }}</td>
                <td>{{ $help->remarks }}</td>
                <td>{{ $help->service_cost }}</td>
                <td>
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('welfare.show', $member['id']) }}"
                           class="d-none text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                            <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>
                        </a>
                        <a href="{{ route('help-provided.edit', $help['id']) }}"
                           class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                            <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>
                        </a>
                        <form class="d-none" method="post" action="{{ route('death.destroy', $member['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
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
