<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPerizinan;
use Carbon\Carbon;

class BerandaAdminController extends Controller
{
    public function index()
    {
        $totalApplicants = DataPerizinan::count();
        $process = DataPerizinan::where('status', 'process')->count();
        $approved = DataPerizinan::where('status', 'accepted')->count();
        $rejected = DataPerizinan::where('status', 'rejected')->count();

        $oneWeekAgo = Carbon::now()->subDays(7);

        $totalLastWeek = DataPerizinan::where('created_at', '>=', $oneWeekAgo)->count();
        $processLastWeek = DataPerizinan::where('status', 'process')->where('created_at', '>=', $oneWeekAgo)->count();
        $approvedLastWeek = DataPerizinan::where('status', 'accepted')->where('created_at', '>=', $oneWeekAgo)->count();
        $rejectedLastWeek = DataPerizinan::where('status', 'rejected')->where('created_at', '>=', $oneWeekAgo)->count();

        return view('admin.berandaadmin', compact(
            'totalApplicants', 'process', 'approved', 'rejected',
            'totalLastWeek', 'processLastWeek', 'approvedLastWeek', 'rejectedLastWeek'
        ));
    }
}
