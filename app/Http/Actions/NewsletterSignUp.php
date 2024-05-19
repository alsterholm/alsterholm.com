<?php

namespace App\Http\Actions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Spatie\MailcoachSdk\Facades\Mailcoach;

class NewsletterSignUp
{
    public function __invoke(Request $request)
    {
        $request->validate(['email' => 'required|email:rfc,dns']);

        $maxAttempts = 1;
        $decay = 300;

        $newsletterSignup = function () use ($request) {
            try {
                Mailcoach::createSubscriber(
                    emailListUuid: config('mailcoach-sdk.list'),
                    attributes: [
                        'email' => $request->input('email'),
                        'tags' => ['website'],
                    ]);
            } catch (Exception) {}
        };

        $executed = RateLimiter::attempt('newsletter-signup.'.$request->ip(), $maxAttempts, $newsletterSignup, $decay);

        if (! $executed) {
            return back()->with('error', true);
        }

        return back()->with('success', true);
    }
}
