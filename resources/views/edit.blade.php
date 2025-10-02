<x-app-layout>
    <x-TableList-layout>
        <x-slot name="title">
            {{ __('Edit') }}
        </x-slot>
        <thead class="fs-5">
            <tr>
                @foreach (['ID', 'Name', 'Subtype', 'PSA', 'Gleason', 'TNM', 'Note',''] as $item)
                    <th scope="col">{{ $item }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ([['12345678', '王小明', 'mCRPC', '50', '5+4', 'T3aN0M1b','病人特殊事項'], ['87654321', '呂小華', 'mCRPC', '30', '5+5', 'T3aN0M1b','病人特殊事項'], ['58746975', '黃小美', 'mCRPC', '40', '4+4', 'T3aN0M1b','病人特殊事項']] as $index => $item)
                <tr>
                    @foreach ($item as $i => $x)
                        @if ($i == 1)
                            <th scope="row">{{ $x }}</th>
                        @else
                            <td>{{ $x }}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="/updated-edit" class="btn btn-primary rounded-5">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </x-TableList-layout>
</x-app-layout>
