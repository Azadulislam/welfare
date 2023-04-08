<table>
    <thead>
        <tr>
            @foreach($columns as $column)
            <th>{{ $column['label'] }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($khairat as $kh)
        <tr>
            @foreach($columns as $column)
                @if($column['name'] == 'memberGetName')
                    <td>{{ getName($kh->member->{$column['attr']}) }}</td>
                @elseif(is_array($column['name']))
                    <td>
                        @foreach($column['name'] as $attr)
                        {{ $kh->member->{$attr} . ' ' }}
                        @endforeach
                    </td>
                @elseif($column['name'] == 'member')
                    <td>
                        {{ $kh->member->{$column['attr']} }}
                    </td>
                @elseif($column['name'] == 'helps')
                    <td>
                        {{ $kh->helps->{$column['attr']} }}
                    </td>
                @elseif($column['name'] == 'memberStatus')
                    <td>
                        {{ memberStatus($kh->member->member_status_ids) }}
                    </td>
                @else
                    <td>{{ $kh->{$column['name']} }}</td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>

</table>
