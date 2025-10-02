<x-app-layout>
    <div class="col-12 col-lg-8 lg:h-full m-0 p-0">
        <div class="row align-content-center lg:h-50">
            <p class="fs-3 m-0">Project</p>
            <div class="table-responsive section-card h-80 lg:h-85 p-0 p-sm-2 p-lg-3">
                <table class="table table-auto border-spacing-0 mb-auto">
                    <thead>
                        <tr>
                            @foreach (['Last Modified', 'Subject ID', '# Samples', 'Analysis Status', 'Follow up', 'Stages', ''] as $item)
                                <th scope="col">{{ $item }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['16 Aug 2024', 'Subject_001', '1 Sample( s)', 'Done', 'In Progress', 'mCRPC'], ['16 Aug 2024', 'Subject_002', '1 Sample( s)', 'In Progress', 'Done', 'mCRPC'], ['16 Aug 2024', 'Subject_003', '1 Sample( s)', 'In Progress', 'Done', 'mCRPC'], ['16 Aug 2025', 'Subject_004', '1 Sample( s)', 'In Progress', 'Done', 'mCRPC']] as $index => $item)
                            <tr>
                                @foreach ($item as $i => $x)
                                    @if ($i == 1)
                                        <th scope="row">{{ $x }}</th>
                                    @else
                                        <td>{{ $x }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <a href="/analysis/{{ $index }}" class="btn btn-primary rounded-5">Analysis</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row align-content-center lg:h-50">
            <p class="fs-3 m-0">Sample</p>
            <div class="table-responsive section-card h-80 lg:h-85 p-0 p-sm-2 p-lg-3">
                <table class="table table-auto border-spacing-0 mb-auto">
                    <thead>
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
                                    <a href="/analysis/{{ $index }}"
                                        class="btn btn-primary rounded-5">Analysis</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col w-70 lg:w-full m-0 p-0">
        <div class="dropdown">
            <button class="fs-3 btn dropdown-toggle border-0" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Stages
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item hover:bg-gray-100" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>

        <div class="chart-container align-content-center position-relative w-70 lg:w-full m-auto">
            <canvas id="pieChart" class="w-full"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById("pieChart").getContext("2d");
                var pieChart = new Chart(ctx, {
                    type: "pie",
                    data: {
                        labels: ["mCRPC", "nmCRPC", "mHSPC", "Others"], // 圖表標籤
                        datasets: [{
                            label: "Stages",
                            data: [40, 20, 25, 15], // 數據
                            backgroundColor: ["#1976d2", "#ff7043", "#388e3c", "#0288d1"],
                            borderColor: "#fff",
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                position: "top"
                            },
                            tooltip: {
                                enabled: true
                            },
                            datalabels: {
                                formatter: (value, ctx) => {
                                    return ctx.chart.data.labels[ctx.dataIndex];
                                },
                                color: "#fff",
                                padding: {
                                    "bottom": 100
                                },
                            }
                        }
                    }
                });

                window.addEventListener("resize", () => {
                    $("pieChart").hide();
                    pieChart.resize(1, 1);
                    pieChart.resize();
                    $("pieChart").show();
                });
            </script>
        </div>
    </div>
</x-app-layout>
