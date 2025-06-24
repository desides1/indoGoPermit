<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    /**
     * Display the draft page with activities and drafts
     */
    public function index()
    {
        $userId = Auth::id();
        $allUserPerizinan = Perizinan::where('user_id', $userId)->get();

        $activities = Perizinan::where('user_id', $userId)
            ->whereNotIn('status', ['draft'])
            ->with(['permissionType', 'request'])
            ->orderBy('created_at', 'desc')
            ->get();

        $drafts = Perizinan::where('user_id', $userId)
            ->where('status', 'draft')
            ->with(['permissionType'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('activity.draft', compact('activities', 'drafts'));
    }

    public function detail($id)
    {
        $perizinan = Perizinan::with([
            'user',
            'permissionType',
            'location',
            'request.requestNumber',
            'individual.province',
            'individual.city',
            'individual.subdistric',
            'bussinessEntity.province',
            'bussinessEntity.city',
            'bussinessEntity.subdistric',
            'documentRequirements.requirement',
            'project'
        ])->findOrFail($id);

        return view('activity.detail', compact('perizinan'));
    }
}
