<x-app-layout>
    <div class="container mx-auto py-8">
        <h2 class="text-center text-2xl font-bold mb-6">臨床決策支援系統 Demo</h2>

        {{-- 按鈕 --}}
        <div class="text-center">
            <form method="POST" action="{{ route('demo-analysis/run') }}">
                @csrf
                <button type="submit" class="btn btn-primary px-6 py-2 text-lg">
                    🚀 開始分析
                </button>
            </form>
        </div>

        {{-- 顯示結果 --}}
         {{--{{ dd($result) }}查看檔案路徑--}}

        @if(isset($result))
            <div class="mt-8 text-center">
                <h4 class="mb-4 text-xl">分析結果</h4>
                <img src="{{ asset($result) }}" class="mx-auto rounded shadow-lg max-h-[500px]">
            </div>
        @endif

        {{-- 錯誤訊息 --}}
        @if(session('error'))
            <div class="mt-4 text-red-600 text-center">
                ⚠ {{ session('error') }}
            </div>
        @endif
    </div>
</x-app-layout>
