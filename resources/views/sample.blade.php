<x-app-layout>
    <x-TableList-layout>
        <x-slot name="title">
            {{ __('Sample') }}
        </x-slot>
        <thead class="fs-5">
            <tr>
                @foreach (['Last Modified', 'Subject ID', 'Time', 'Analysis Status', 'QC report', 'Stages', ''] as $item)
                    <th scope="col">{{ $item }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ([['16 Aug 2024', 'Subject_001', 'Baseline', 'Done', 'view', 'mCRPC'], ['16 Aug 2024', 'Subject_002', 'Baseline', 'In Progress', 'view', 'mCRPC'], ['16 Aug 2024', 'Subject_003', 'Baseline', 'In Progress', 'view', 'mCRPC'], ['16 Aug 2025', 'Subject_004', 'Baseline', 'In Progress', 'view', 'mCRPC']] as $index => $item)
                <tr>
                    @foreach ($item as $i => $x)
                        @if ($i == 1)
                            <th scope="row">{{ $x }}</th>
                        @else
                            <td>{{ $x }}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ url('analysis/' . $index) }}" class="btn btn-primary rounded-5">Analysis</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-TableList-layout>
</x-app-layout>
