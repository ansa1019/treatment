<x-app-layout>
    <div class="flex flex-col justify-between h-full">
        <p class="fs-3 ml-3 mb-2">個人設定</p>
        <div class="flex flex-row justify-between mb-4 px-3">
            <div class="w-[48%] p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('setting.partials.update-setting-information-form')
            </div>
            <div class="w-[48%] p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('setting.partials.update-password-form')
            </div>
        </div>
        <div class="flex flex-row w-full px-3 pb-3">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('setting.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
