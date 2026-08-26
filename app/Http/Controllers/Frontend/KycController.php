<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use App\Services\AlertService;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KycController extends Controller
{
    use FileUploadTrait;
    public function index(): View
    {
        return view('frontend.pages.kyc');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:255'],
            'full_address' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'max:255', 'string'],
            'document_scan_copy' => ['required', 'mimes:jpg,jpeg,png,pdf,csv,docx', 'max:10000'],
        ]);

        $kyc = new Kyc();
        $kyc->user_id = auth('web')->user()->id;
        $kyc->full_name = $request->full_name;
        $kyc->date_of_birth = $request->date_of_birth;
        $kyc->gender = $request->gender;
        $kyc->full_address = $request->full_address;
        $kyc->document_type = $request->document_type;
        $kyc->document_scan_copy = $this->uploadPrivateFile($request->file('document_scan_copy'));

        $kyc->save();

        AlertService::created('Your KYC has been submitted successfully. Please wait for the admin approval.');

        return redirect()->route('vendor.dashboard');
    }
}
