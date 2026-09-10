<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index():View
    {
        return view('admin.settings.sections.general-settings');
    }
}
