<x-app-layout>
    <div class="row align-self-start h-[70vh]">
        <form action="{{ route('login') }}" method="post"
            class="flex flex-col col-12 col-lg-3 h-full rounded-md shadow-sm mr-2 px-2">
            <div class="row bg-secondary flex-nowrap rounded-t-lg px-2 py-1">
                <x-text-input class="col" id="name" name="name" value="{{ $data['name'] ?? '' }}" required
                    autofocus />
                <p class="text-lg w-auto m-0 px-1">Medical No.</p>
                <x-text-input class="col" id="id" name="id" value="{{ $data['id'] ?? '' }}" required />
            </div>

            <div class="row bg-white h-full justify-start rounded-b-lg px-3 pb-3">
                <div class="col-12">
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
                            value="{{ $data['note'] ?? '' }}" required></textarea>
                    </div>
                </div>

                <div class="flex justify-center w-full">
                    <x-primary-button class="w-fit self-center px-4 py-2">
                        {{ __('save') }}
                    </x-primary-button>
                </div>
            </div>
        </form>

        @if (empty($data))
            <div class="col section-card justify-start h-full ml-3 p-3 p-lg-4">
                <div class="row align-items-start">
                    <div class="col-3 max-w-[150px] pt-lg-4 mr-4">
                        <p class="text-lg pb-1">Case</p>
                        <x-text-input id="case" name="case" required />
                    </div>
                    <div class="col-3 max-w-[150px] pt-lg-4">
                        <p class="text-lg pb-1">Cohort</p>
                        <x-select-input id="cohort" name="cohort" class="pr-[5px]" required>
                            @foreach (['KMU', 'Other'] as $key => $value)
                                <option {{ $key == 0 ? 'selected' : '' }} value="{{ $value }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </x-select-input>
                    </div>
                    <div class="col align-items-end">
                        <div class="row">
                            <div class="form-check form-switch form-check-reverse w-auto mr-3">
                                <label class="form-check-label" for="follow_up">Follow-up?</label>
                                <input class="form-check-input" type="checkbox" id="follow_up">
                            </div>
                            <x-search-input class="w-[150px]" id="search" name="search" required />
                        </div>
                    </div>
                </div>

                <div class="row accordion pt-4 pt-lg-5" id="accordion">
                    <button class="col-12 accordion-button block text-center rounded-full p-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#advancedSettings" aria-expanded="true"
                        aria-controls="advancedSettings">
                        Advanced Settings
                    </button>
                    <div class="col-12 accordion-collapse collapse px-2 show" id="advancedSettings"
                        data-bs-parent="#accordion">
                        <div class="row accordion-body align-items-start">
                            <div class="col align-items-center px-3">
                                <div class="flex align-items-center form-check form-switch w-auto">
                                    <input class="form-check-input" type="checkbox" id="cluster_YN"
                                        data-bs-toggle="collapse" data-bs-target="#clusterAnalysis"
                                        aria-expanded="false" aria-controls="clusterAnalysis" checked />
                                    <label class="form-check-label" for="cluster_YN">Cluster analysis</label>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#clusterAnalysis").collapse($("#cluster_YN").prop("checked") ? "show" : "hide");
                                    });
                                </script>
                                <div class="collapse w-fit text-nowrap my-1" id="clusterAnalysis">
                                    <div class="flex flex-row justify-around w-80 mx-auto">
                                        <div class="row flex-row form-check w-fit ml-[10px]">
                                            <input class="form-check-input" type="radio" name="cluster"
                                                id="Kmeans" />
                                            <label class="form-check-label w-fit" for="Kmeans">K-means</label>
                                        </div>
                                        <div class="row flex-row form-check w-fit ml-[10px]">
                                            <input class="form-check-input" type="radio" name="cluster"
                                                id="Dbscan" checked />
                                            <label class="form-check-label w-fit" for="Dbscan">Dbscan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <x-text-input class="col w-fit m-1" id="cluster_number" name="cluster_number"
                                            placeholder="Cluster number" required />
                                        <x-text-input class="col w-fit m-1" id="eps" name="eps"
                                            placeholder="eps" required />
                                        <x-text-input class="col w-fit m-1" id="starts_at" name="starts_at"
                                            placeholder="Starts at" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col align-items-center px-3">
                                <p>Dimension reduction</p>
                                <div class="flex flex-row justify-around w-80 mx-auto">
                                    <div class="row flex-row form-check w-fit ml-[10px]">
                                        <input class="form-check-input" type="radio" name="cluster"
                                            id="Kmeans" />
                                        <label class="form-check-label w-fit" for="Kmeans">PCA</label>
                                    </div>
                                    <div class="row form-check w-fit ml-[10px]">
                                        <input class="form-check-input" type="radio" name="cluster" id="Dbscan"
                                            checked />
                                        <label class="form-check-label w-fit" for="Dbscan">tSNE</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-items-center px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="batch_effect" />
                                    <label class="form-check-label text-nowrap w-fit" for="batch_effect">Remove batch
                                        effect</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-auto mb-0 pt-2 pt-lg-3">
                    <div class="flex justify-center rounded-lg border border-dashed border-gray-900/25 py-3 py-lg-5">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM216 408c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-102.1-31 31c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l72-72c9.4-9.4 24.6-9.4 33.9 0l72 72c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-31-31L216 408z" />
                            </svg>
                            <div class="mt-2 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload .CEL file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col section-card accordion h-full overflow-auto ml-3 p-3 p-lg-4" id="accordion">
                <div class="row hidden lg:flex pb-3">
                    <p class="col-12 col-lg-3 col-xl-2 mr-3 fs-5 text-white bg-primary text-center rounded px-3 py-2">
                        Parameters
                    </p>
                    <div class="col flex-row ml-3">
                        <p class="w-45 fs-5 text-white bg-primary text-center rounded mx-auto px-3 py-2">Androgen
                            Receptor
                            Blockers</p>
                        <p class="w-45 fs-5 text-white bg-primary text-center rounded mx-auto px-3 py-2">Androgen
                            Synthesis
                            Inhibitor</p>
                    </div>
                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 col-xl-2 mr-3">
                        <button class="accordion-button accordion-rounded text-lg" type="button"
                            data-bs-toggle="collapse" data-bs-target="#addictive_effects" aria-expanded="true"
                            aria-controls="addictive_effects">
                            Addictive<br>effects
                        </button>
                    </div>
                    <div class="col ml-3">
                        <div id="addictive_effects" class="flex accordion-collapse collapse show">
                            <div class="row flex-nowrap accordion-body border-3 border-top-0 p-0">
                                <div class="col align-items-center px-2">
                                    <img src="{{ asset('Fig/DEG_1.png') }}" class="w-80" />
                                </div>
                                <div class="col align-items-center px-2">
                                    <img src="{{ asset('Fig/DEG_2.png') }}" class="w-80" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 col-xl-2 mr-3">
                        <button class="accordion-button accordion-rounded text-lg" type="button"
                            data-bs-toggle="collapse" data-bs-target="#3M_PSA_lower_probaability"
                            aria-expanded="false" aria-controls="3M_PSA_lower_probaability">
                            3M PSA lower<br>probaability
                        </button>
                    </div>
                    <div class="col ml-3">
                        <div id="3M_PSA_lower_probaability" class="accordion-collapse collapse show">
                            <div class="row flex-nowrap accordion-body border-3 border-top-0 p-0">
                                <div class="col align-items-center px-2">
                                    <div class="row flex-nowrap">
                                        <p class="fs-1 fw-bold text-danger w-fit pr-5">15%</p>
                                        <img src="{{ asset('Fig/15.png') }}" class="w-50" />
                                    </div>
                                </div>
                                <div class="col align-items-center px-2">
                                    <div class="row flex-nowrap">
                                        <p class="fs-1 fw-bold text-danger w-fit pr-5">75%</p>
                                        <img src="{{ asset('Fig/75.png') }}" class="w-50" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 col-xl-2 mr-3">
                        <button class="accordion-button accordion-rounded text-lg" type="button"
                            data-bs-toggle="collapse" data-bs-target="#precisionMed_score" aria-expanded="false"
                            aria-controls="precisionMed_score">
                            PrecisionMed<br>Score
                        </button>
                    </div>
                    <div class="col ml-3 h-full">
                        <div id="precisionMed_score" class="accordion-collapse collapse h-full show">
                            <div class="row flex-nowrap accordion-body border-3 border-top-0 h-full p-0">
                                <div class="col align-items-center h-full px-2">
                                    <div class="row flex-nowrap w-60 h-full">
                                        <p class="fs-1 fw-bold w-fit pr-3">35</p>
                                        <div class="col w-full">
                                            <div class="flex justify-content-end w-full" style="width: 35%">
                                                <i class="fa-solid fa-person fa-2xl text-primary"
                                                    style="line-height: 1em;"></i>
                                            </div>
                                            <div class="progress w-full mx-[10px] my-2" role="progressbar"
                                                aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-items-center h-full px-2">
                                    <div class="row flex-nowrap w-60 h-full">
                                        <p class="fs-1 fw-bold w-fit pr-3">35</p>
                                        <div class="col w-full">
                                            <div class="flex justify-content-end w-full" style="width: 35%">
                                                <i class="fa-solid fa-person fa-2xl text-primary"
                                                    style="line-height: 1em;"></i>
                                            </div>
                                            <div class="progress w-full mx-[10px] my-2" role="progressbar"
                                                aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 col-xl-2 mr-3">
                        <button class="accordion-button accordion-rounded text-lg" type="button"
                            data-bs-toggle="collapse" data-bs-target="#6M_PSA_lower_probaability"
                            aria-expanded="false" aria-controls="6M_PSA_lower_probaability">
                            6M PSA lower<br>probaability
                        </button>
                    </div>
                    <div class="col ml-3">
                        <div id="6M_PSA_lower_probaability" class="accordion-collapse collapse show">
                            <div class="row flex-nowrap accordion-body border-3 border-top-0 p-0">
                                <div class="col align-items-center px-2">
                                    <div class="row flex-nowrap">
                                        <p class="fs-1 fw-bold w-fit pr-3">15%</p>
                                        <img src="{{ asset('Fig/15.png') }}" class="w-50" />
                                    </div>
                                </div>
                                <div class="col align-items-center px-2">
                                    <img src="{{ asset('Fig/75.png') }}" class="w-50" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 col-xl-2 mr-3">
                        <button class="accordion-button accordion-rounded text-lg" type="button"
                            data-bs-toggle="collapse" data-bs-target="#Expression_to_Survival" aria-expanded="false"
                            aria-controls="Expression_to_Survival">
                            Expression<br>to Survival
                        </button>
                    </div>
                    <div class="col ml-3">
                        <div id="Expression_to_Survival" class="accordion-collapse collapse show">
                            <div class="row flex-nowrap accordion-body border-3 border-top-0 p-0">
                                <div class="col align-items-center px-2">
                                    <div class="row flex-nowrap">
                                        <p class="fs-1 fw-bold w-fit pr-3">15%</p>
                                        <img src="{{ asset('Fig/15.png') }}" class="w-50" />
                                    </div>
                                </div>
                                <div class="col align-items-center px-2">
                                    <img src="{{ asset('Fig/75.png') }}" class="w-50" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    @if (empty($data))
        <div class="row my-auto">
            <div class="flex justify-around w-full">
                <x-secondary-button class="w-fit self-center px-4 py-2">
                    {{ __('reset') }}
                </x-secondary-button>
                <x-primary-button class="w-fit self-center px-4 py-2">
                    {{ __('upload') }}
                </x-primary-button>
            </div>
        </div>
    @else
        <div class="row h-[15vh]">
            <div class="col-10 section-card overflow-auto h-full p-2">
                <p>Generated interpretations (fill template)</p>
                <p>Generated interpretations (fill template)</p>
                <p>Generated interpretations (fill template)</p>
                <p>Generated interpretations (fill template)</p>
                <p>Generated interpretations (fill template)</p>
                <p>Generated interpretations (fill template)</p>
            </div>

            <div class="col justify-around align-items-center h-full">
                <x-secondary-button class="w-80 justify-around px-4 py-2">
                    {{ __('Reset view') }}
                </x-secondary-button>
                <x-primary-button class="w-80 justify-around px-4 py-2">
                    {{ __('Generate report') }}
                </x-primary-button>
            </div>
        </div>
    @endif
</x-app-layout>
