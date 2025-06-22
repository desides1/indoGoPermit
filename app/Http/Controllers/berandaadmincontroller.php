<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perizinan;
use Carbon\Carbon;

class BerandaAdminController extends Controller
{
    public function index()
    {
        $totalApplicants = Perizinan::count();
        $process = Perizinan::where('status', 'process')->count();
        $approved = Perizinan::where('status', 'accepted')->count();
        $rejected = Perizinan::where('status', 'rejected')->count();

        $oneWeekAgo = Carbon::now()->subDays(7);

        $totalLastWeek = Perizinan::where('created_at', '>=', $oneWeekAgo)->count();
        $processLastWeek = Perizinan::where('status', 'process')->where('created_at', '>=', $oneWeekAgo)->count();
        $approvedLastWeek = Perizinan::where('status', 'accepted')->where('created_at', '>=', $oneWeekAgo)->count();
        $rejectedLastWeek = Perizinan::where('status', 'rejected')->where('created_at', '>=', $oneWeekAgo)->count();

        return view('admin.berandaadmin', compact(
            'totalApplicants', 'process', 'approved', 'rejected',
            'totalLastWeek', 'processLastWeek', 'approvedLastWeek', 'rejectedLastWeek'
        ));
    }
}
