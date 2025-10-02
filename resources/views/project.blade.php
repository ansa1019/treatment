<x-app-layout>
    <x-TableList-layout>
        <x-slot name="title">
            {{ __('Project') }}
        </x-slot>
        <thead class="fs-5">
            <tr>
                @foreach (['Last Modified', '# Samples', 'Subject ID', 'Analysis Status', 'Follow up', 'Stages', ''] as $item)
                    <th scope="col">{{ $item }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ([['16 Aug 2024', 'Subject_001', '1 Sample( s)', 'Done', 'In Progress', 'mCRPC'], ['16 Aug 2024', 'Subject_002', '1 Sample( s)', 'In Progress', 'Done', 'mCRPC'],['16 Aug 2024', 'Subject_003', '1 Sample( s)', 'In Progress', 'Done', 'mCRPC'],['16 Aug 2025', 'Subject_004', '1 Sample( s)', 'In Progress', 'Done', 'mCRPC']] as $index => $item)
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
