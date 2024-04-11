<?php

namespace App\Http\Actions;

use Illuminate\Http\Request;
use Spatie\MailcoachSdk\Facades\Mailcoach;

class NewsletterSignUp
{
    public function __invoke(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        Mailcoach::createSubscriber(
            emailListUuid: config('mailcoach-sdk.list'),
            attributes: [
                'email' => $request->input('email'),
                'tags' => ['website'],
            ]);

        return back()->with('success', true);
    }
}
