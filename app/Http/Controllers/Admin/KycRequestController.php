<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use App\Services\AlertService;
use App\Services\MailService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class KycRequestController extends Controller
{
    public function index(): View {
        $kycRequests = Kyc::paginate(25);
        return view('admin.kyc.index', compact('kycRequests'));
    }

    public function pending(): View {
        $kycRequests = Kyc::where('status', 'pending')->paginate(25);
        return view('admin.kyc.pending', compact('kycRequests'));
    }

    public function rejected(): View {
        $kycRequests = Kyc::where('status', 'rejected')->paginate(25);
        return view('admin.kyc.rejected', compact('kycRequests'));
    }

    public function show(Kyc $kyc_request): View {
        return view('admin.kyc.show', compact('kyc_request'));
    }

    public function download(Kyc $kyc_request): StreamedResponse {
        return Storage::disk('local')->download($kyc_request->document_scan_copy);
    }

    public function update(Request $request, Kyc $kyc_request): RedirectResponse {
        $kyc_request->update([
            'status' => $request->status
        ]);

        if ($kyc_request->status === 'approved') {
            MailService::send(
                to: $kyc_request->user->email,
                subject: 'KYC Application Has Been Approved',
                body: 'Congratulations! Your KYC request has been approved.'
            );
        } elseif ($kyc_request->status === 'rejected') {
            MailService::send(
                to: $kyc_request->user->email,
                subject: 'KYC Application Has Been Rejected',
                body: 'Sorry! Your KYC request has been rejected.'
            );
        }
        AlertService::updated();
        return redirect()->route('admin.kyc.index');
    }
}
