<?php

namespace Mezai\Visma\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Mezai\Visma\Contracts\TokenStorage;

class VismaController
{
    public function toVisma(Request $request)
    {
        $request->session()->put('visma.oauth.request_url', url()->previous());

        $parameters = [
            'access_type' => 'offline',
        ];


        return Socialite::driver('visma')
            ->with($parameters)
            ->scopes(explode(',', config('visma.scopes', '')))
            ->redirect();
    }

    public function handleCallback(Request $request)
    {
        $requestUrl = $request->session()->pull('visma.oauth.request_url');

        if ($request->has('error')) {
            return redirect()->to($requestUrl)
                ->with('type', 'visma')
                ->with('status', 'error')
                ->with('message', $request->input('error_description', 'An error occurred during the Visma authentication process.'));
        }

        try {
            /**
             * @var Token $token
             */
            $token = Socialite::driver('visma')->token();
        } catch (\Exception $e) {
            return redirect()->to($requestUrl)
                ->with('type', 'visma')
                ->with('status', 'error')
                ->with('message', 'Failed to authenticate with Visma: ' . $e->getMessage());
        }

        /**
         * Store the token using the configured storage provider.
         *
         * @var TokenStorage $storageProvider
         */
        $storageProvider = app(config('visma.storage_provider'));
        $storageProvider->storeToken($token);

        return redirect()->to($requestUrl)
            ->with('type', 'visma')
            ->with('status', 'success')
            ->with('message', 'Successfully authenticated with Visma.');
    }
}
