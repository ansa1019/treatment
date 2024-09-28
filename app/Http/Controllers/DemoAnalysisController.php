<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DemoAnalysisController extends Controller
{
    // 顯示分析頁面
    public function index()
    {
        return view('demo_analysis');
    }

    // 執行分析
    public function run(Request $request)
    {
        # Windows 測試用固定路徑
        # $python = "C:/Users/USER/AppData/Local/Programs/Python/Python310/python.exe";

        # 正式用 .env / config/services.php
        $python = config('services.python_path');
        $demoDir = base_path("Model\demo");
        $createScript = $demoDir . "/create_demo_patients.py";
        $runScript = $demoDir . "/run_demo.py";
        $outputDir = $demoDir . "/demo_results";

        // 確認有無 demo patient library，沒有就先建立
        if (!file_exists($demoDir . "/patients_library.csv") || !file_exists($demoDir . "/patients_expr.csv")) {
            // Linux AWS 時加環境變數
            $env = array_merge($_ENV, $_SERVER);

            $process = new Process([$python, $createScript], $demoDir, $env);
            $process->run();

            if (!$process->isSuccessful()) {
                return back()->with('error', '建立病人資料庫失敗: ' . $process->getErrorOutput());
            }
        }

        // 執行 run_demo.py（依照作業系統選擇方式）
        $latestFile = '';
        $returnVar = 0;

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows → 先檢查是否需要建立病人資料
            if (!file_exists($demoDir . "/patients_library.csv") || !file_exists($demoDir . "/patients_expr.csv")) {
                $createCmd = 'cd /d "' . $demoDir . '" && ' . $python . ' ' . escapeshellarg($createScript);
                exec($createCmd . " 2>&1", $output, $returnVar);

                if ($returnVar !== 0) {
                    return back()->with('error', "建立病人資料庫失敗:\n" . implode("\n", $output));
                }
            }

            // 再執行 run_demo.py
            $cmd = 'cd /d "' . $demoDir . '" && ' . $python . ' ' . escapeshellarg($runScript) . ' --random --save_detailed';
            exec($cmd . " 2>&1", $output, $returnVar);

            if ($returnVar !== 0) {
                $errorOutput = implode("\n", $output);
                $errorOutput = preg_replace('/\x1b\[[0-9;]*m/', '', $errorOutput);
                if (!mb_check_encoding($errorOutput, 'UTF-8')) {
                    $errorOutput = mb_convert_encoding($errorOutput, 'UTF-8', 'CP950,ISO-8859-1');
                }
                return back()->with('error', "分析失敗 (Windows exec):\n" . $errorOutput);
            }
        } else {
            // Linux (AWS) → 用 Symfony Process
            $env = array_merge($_ENV, $_SERVER);
            $process = new Process([$python, $runScript, '--random', '--save_detailed'], $demoDir, $env);
            $process->run();

            if (!$process->isSuccessful()) {
                $errorOutput = $process->getErrorOutput();

                // 移除 ANSI 顏色碼
                $errorOutput = preg_replace('/\x1b\[[0-9;]*m/', '', $errorOutput);

                // 確保轉成 UTF-8
                if (!mb_check_encoding($errorOutput, 'UTF-8')) {
                    $errorOutput = mb_convert_encoding($errorOutput, 'UTF-8', 'CP950,ISO-8859-1');
                }

                return back()->with('error', "分析失敗 (Linux process):\n" . $errorOutput);
            }
        }

        // 找到最新的結果圖
        $latestTime = 0;
        foreach (glob($outputDir . "/patient_*/DEMO_*_combined_analysis.png") as $file) {
            if (filemtime($file) > $latestTime) {
                $latestTime = filemtime($file);
                $latestFile = $file;
            }
        }

        if ($latestFile == '') {
            return back()->with('error', '沒有找到新的分析結果');
        }

        // 把路徑轉成相對於 public 的網址
        $patientDir = basename(dirname($latestFile));
        $filename   = basename($latestFile);

        // 組成相對路徑（給 asset() 用）
        $relativePath = "demo_results/{$patientDir}/{$filename}";

        return view('demo_analysis', [
            'result' => $relativePath
        ]);
    }
}
