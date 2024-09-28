<x-app-layout>
    <div class="section-card h-[75vh] mx-1 p-4">
        <p class="fs-3 mb-3">個人設定</p>
        <form action="{{ url()->current() }}" method="post" class="col-12 col-lg-3 h-full mr-2 px-2">
            <div class="row h-full justify-start rounded-b-lg px-3 pb-3">
                <div class="col-12">
                    <div class="flex flex-row w-full">
                        <label class="mr-1" for="PSA">帳號：</label>
                        <x-text-input class="col max-w-[130px]" id="PSA" name="PSA"
                            value="{{ $data['PSA'] ?? '' }}" :readonly=true/>
                    </div>
                </div>

                {{-- <div class="col-12">
                    <p class="text-lg pb-1">Subtype</p>
                    <div class="flex justify-start w-full">
                        <input type="radio" class="btn-check" name="subtype" id="mCRPC" autocomplete="off"
                            @checked(isset($data['subtype']) && $data['subtype'] == 'mCRPC')>
                        <label class="col btn btn-secondary btn-radio rounded-full p-1" for="mCRPC">mCRPC</label>

                        <input type="radio" class="btn-check" name="subtype" id="mHSPC" autocomplete="off"
                            @checked(isset($data['subtype']) && $data['subtype'] == 'mHSPC')>
                        <label class="col btn btn-secondary btn-radio rounded-full p-1 mx-1"
                            for="mHSPC">mHSPC</label>

                        <input type="radio" class="btn-check" name="subtype" id="nmCRPC" autocomplete="off"
                            @checked(isset($data['subtype']) && $data['subtype'] == 'nmCRPC')>
                        <label class="col btn btn-secondary btn-radio rounded-full p-1" for="nmCRPC">nmCRPC</label>
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">PSA level</p>
                    <div class="flex flex-row w-full">
                        <x-text-input class="col max-w-[130px]" id="PSA" name="PSA"
                            value="{{ $data['PSA'] ?? '' }}" required />
                        <label class="col-form-label p-0" for="PSA">ng/ml</label>
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">Gleason score</p>
                    <div class="flex justify-start w-full">
                        <x-text-input class="w-10 mr-2" id="gleason" name="gleason"
                            value="{{ $data['gleason'] ?? '' }}" required />+
                        <x-text-input class="w-10 ml-2" id="gleason2" name="gleason2"
                            value="{{ $data['gleason2'] ?? '' }}" required />
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">TNM stage</p>
                    <div class="flex justify-start w-full">
                        <x-text-input class="max-w-[150px]" id="TNM" name="TNM"
                            value="{{ $data['TNM'] ?? '' }}" required />
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">Note</p>
                    <div class="flex justify-start w-full">
                        <textarea class="align-content-center w-full p-2" id="note" name="note" rows="3" placeholder="病人注意事項"
                            value="{{ $data['note'] ?? '' }}"></textarea>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>

    <div class="row my-auto">
        <div class="flex justify-around w-full">
            <x-secondary-button class="w-fit self-center px-4 py-2" id="reset">
                {{ __('reset') }}
            </x-secondary-button>
            <x-primary-button class="w-fit self-center px-4 py-2">
                {{ __('upload') }}
            </x-primary-button>
        </div>
    </div>
</x-app-layout>
