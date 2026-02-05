<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'logo_path',
        'email',
        'phone',
        'address',
        'instagram_url',
        'linkedin_url',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'whatsapp_url',
    ];

    public static function cached(): self
    {
        /** @var self $settings */
        $settings = Cache::remember('site_settings:first', now()->addHour(), function () {
            return static::query()->first() ?? new static();
        });

        return $settings;
    }

    public static function clearCache(): void
    {
        Cache::forget('site_settings:first');
    }
}

