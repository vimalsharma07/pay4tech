<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::query()->first() ?? new SiteSetting();

        return view('admin.settings.edit', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::query()->first() ?? new SiteSetting();

        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
            'tagline' => ['nullable', 'string', 'max:180'],

            'email' => ['nullable', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:190'],

            'instagram_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'youtube_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],

            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            File::ensureDirectoryExists(public_path('uploads'));

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension() ?: 'png';
            $name = 'logo-' . date('YmdHis') . '.' . $ext;
            $file->move(public_path('uploads'), $name);

            $data['logo_path'] = 'uploads/' . $name;
        }

        $settings->fill($data);
        $settings->save();

        SiteSetting::clearCache();

        return redirect()
            ->route('admin.settings.edit')
            ->with('toast', 'Settings saved.');
    }
}

