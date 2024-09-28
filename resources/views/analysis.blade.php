<x-app-layout>
    <div class="row align-self-start lg:h-[70vh]">
        <form action="{{ route('login') }}" method="post"
            class="flex flex-col col-12 col-lg-3 h-full rounded-md shadow-sm lg:mr-2 px-2">
            <div class="row bg-secondary flex-nowrap rounded-t-lg px-2 py-1">
                <x-text-input class="col-3" id="name" name="name" value="{{ $data['name'] ?? '' }}" required
                    autofocus />
                <p class="col w-auto m-0 px-1">Medical No.</p>
                <x-text-input class="col" id="id" name="id" :readonly="isset($data)" :value="$data['id'] ?? ''"
                    required />
            </div>

            <div class="row bg-white h-full justify-start rounded-b-lg px-3 pb-3">
                <div class="col-12">
                    <p class="text-lg pb-1">Subtype</p>
                    <div class="flex justify-start w-full">
                        <input type="radio" class="btn-check" name="subtype" id="mCRPC" autocomplete="off"
                            @checked(!isset($data) || (isset($data['subtype']) && $data['subtype'] == 'mCRPC')) @disabled(isset($data))>
                        <label class="col btn btn-secondary btn-radio rounded-full p-1" for="mCRPC">mCRPC</label>

                        <input type="radio" class="btn-check" name="subtype" id="mHSPC" autocomplete="off"
                            @checked(isset($data['subtype']) && $data['subtype'] == 'mHSPC') @disabled(isset($data))>
                        <label class="col btn btn-secondary btn-radio rounded-full p-1 mx-1"
                            for="mHSPC">mHSPC</label>

                        <input type="radio" class="btn-check" name="subtype" id="nmCRPC" autocomplete="off"
                            @checked(isset($data['subtype']) && $data['subtype'] == 'nmCRPC') @disabled(isset($data))>
                        <label class="col btn btn-secondary btn-radio rounded-full p-1" for="nmCRPC">nmCRPC</label>
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">PSA level</p>
                    <div class="flex flex-row w-full">
                        <x-text-input class="col max-w-[130px]" id="PSA" name="PSA" :readonly="isset($data)"
                            :value="$data['PSA'] ?? ''" required />
                        <label class="col-form-label p-0" for="PSA">ng/ml</label>
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">Gleason score</p>
                    <div class="flex justify-start w-full">
                        <x-text-input class="w-10 mr-2" id="gleason" name="gleason" :readonly="isset($data)"
                            :value="$data['gleason'] ?? ''" required />+
                        <x-text-input class="w-10 ml-2" id="gleason2" name="gleason2" :readonly="isset($data)"
                            :value="$data['gleason2'] ?? ''" required />
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">TNM stage</p>
                    <div class="flex justify-start w-full">
                        <x-text-input class="max-w-[150px]" id="TNM" name="TNM" :readonly="isset($data)"
                            :value="$data['TNM'] ?? ''" required />
                    </div>
                </div>

                <div class="col-12">
                    <p class="text-lg pb-1">Note</p>
                    <div class="flex justify-start w-full">
                        <textarea class="align-content-center w-full p-2" id="note" name="note" rows="3" placeholder="病人注意事項"
                            @readonly(isset($data))>{{ $data['note'] ?? '' }}</textarea>
                    </div>
                </div>

                @isset($data)
                    <div class="flex justify-center w-full">
                        <x-primary-button type="button" class="w-fit self-center px-4 py-2" onclick="save()">
                            {{ __('edit') }}
                        </x-primary-button>
                    </div>
                @endisset
            </div>
        </form>

        @if (empty($data))
            <div class="col section-card justify-content-between h-full my-3 lg:mt-0 lg:ml-3 p-3 p-lg-4">
                <div class="row align-items-start">
                    <div class="col-3 max-w-[150px] pt-lg-2 mr-4">
                        <p class="text-lg pb-1">Case</p>
                        <x-text-input id="case" name="case" required />
                    </div>
                    <div class="col-3 max-w-[150px] pt-lg-2">
                        <p class="text-lg pb-1">Cohort</p>
                        <x-select-input id="cohort" name="cohort" required>
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
                                <input class="form-check-input" type="checkbox" id="follow_up" checked />
                            </div>
                            <x-search-input class="w-[150px]" id="search" name="search" required />
                        </div>
                    </div>
                </div>

                <div class="row accordion" id="accordion">
                    <button class="col-12 accordion-button block text-center rounded-full my-3 p-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#advancedSettings" aria-expanded="true"
                        aria-controls="advancedSettings">
                        Advanced Settings
                    </button>
                    <div class="col-12 accordion-collapse collapse px-2 show" id="advancedSettings"
                        data-bs-parent="#accordion">
                        <div class="row accordion-body align-items-start pt-0">
                            <div class="col align-items-center px-3">
                                <div class="flex align-items-center form-check form-switch w-auto">
                                    <input class="form-check-input" type="checkbox" id="cluster_YN"
                                        data-bs-toggle="collapse" data-bs-target="#clusterAnalysis"
                                        aria-expanded="false" aria-controls="clusterAnalysis" checked />
                                    <label class="form-check-label" for="cluster_YN">Cluster analysis</label>
                                </div>
                                <div class="collapse w-fit text-nowrap my-1 show" id="clusterAnalysis">
                                    <div class="flex flex-row justify-around w-80 mx-auto">
                                        <div class="row flex-row form-check w-fit ml-[10px]">
                                            <input class="form-check-input" type="radio" name="cluster"
                                                id="Kmeans" checked />
                                            <label class="form-check-label w-fit" for="Kmeans">K-means</label>
                                        </div>
                                        <div class="row flex-row form-check w-fit ml-[10px]">
                                            <input class="form-check-input" type="radio" name="cluster"
                                                id="Dbscan" />
                                            <label class="form-check-label w-fit" for="Dbscan">Dbscan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <x-text-input class="col mr-1" id="cluster_number" name="cluster_number"
                                            placeholder="Cluster number" required />
                                        <x-text-input class="col-3" id="eps" name="eps"
                                            placeholder="eps" required />
                                        <x-text-input class="col-12 m-1" id="starts_at" name="starts_at"
                                            placeholder="Starts at" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col align-items-center px-3">
                                <p>Dimension reduction</p>
                                <div class="flex flex-row justify-around w-80 mx-auto">
                                    <div class="row flex-row form-check w-fit ml-[10px]">
                                        <input class="form-check-input" type="radio" name="Dimension reduction"
                                            id="PCA" checked />
                                        <label class="form-check-label w-fit" for="PCA">PCA</label>
                                    </div>
                                    <div class="row form-check w-fit ml-[10px]">
                                        <input class="form-check-input" type="radio" name="Dimension reduction"
                                            id="tSNE" />
                                        <label class="form-check-label w-fit" for="tSNE">tSNE</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-items-center px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="batch_effect" checked />
                                    <label class="form-check-label text-nowrap w-fit" for="batch_effect">Remove batch
                                        effect</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row h-full mt-auto mb-0">
                    <x-file-upload/>
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
                                        <p class="fs-1 fw-bold w-fit pr-3">70</p>
                                        <div class="col w-full">
                                            <div class="flex justify-content-end w-full" style="width: 70%">
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
                                        <p class="fs-1 fw-bold text-danger w-fit pr-5">15%</p>
                                        <img src="{{ asset('Fig/15.png') }}" class="w-50" />
                                    </div>
                                </div>
                                <div class="col align-items-center px-2">
                                    <div class="row flex-nowrap">
                                        <p class="fs-1 fw-bold text-danger w-fit pr-5">60%</p>
                                        <img src="{{ asset('Fig/60.png') }}" class="w-50" />
                                    </div>
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
            </div>
        @endif
    </div>


    @if (empty($data))
        <div class="row my-auto">
            <div class="flex justify-around w-full">
                <x-secondary-button class="w-fit self-center px-4 py-2" onclick="reset()">
                    {{ __('reset') }}
                </x-secondary-button>
                <x-primary-button class="w-fit self-center px-4 py-2">
                    {{ __('upload') }}
                </x-primary-button>
            </div>
        </div>
    @else
        <div class="row h-[15vh]">
            <div class="col-10 align-content-center section-card overflow-auto h-full p-2">
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
