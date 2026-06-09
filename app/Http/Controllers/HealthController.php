<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Throwable;

class HealthController extends Controller
{
    public function __invoke()
    {
        $db = 'unknown';

        try {
            DB::connection()->getPdo();
            $db = 'connected';
        } catch (Throwable $e) {
            $db = 'failed: '.$e->getMessage();
        }

        return response()->json([
            'status' => 'ok',
            'database' => $db,
            'app_key' => config('app.key') ? 'set' : 'missing',
        ]);
    }
}
