<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailSetting;

class MailSettingController extends Controller
{
    public function edit()
    {
        $setting = MailSetting::first();
        return view('admin.mail-settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'host' => 'required',
            'port' => 'required|integer',
            'username' => 'required|email',
            'password' => 'required',
            'encryption' => 'nullable|string',
            'from_address' => 'required|email',
            'from_name' => 'required|string',
        ]);

        MailSetting::updateOrCreate(['id' => 1], $request->all());

        return redirect()->back()->with('success', 'Mail settings updated successfully!');
    }
}
