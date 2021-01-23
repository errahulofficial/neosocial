<?php

namespace App\Http\Controllers;

use Google; // See: https://github.com/pulkitjalan/google-apiclient
use GoogleMyBusiness;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\SocialPlatform;
use App\SocialConnection;
use Auth;
use Session;

class GoogleController extends Controller
{


    function authRedirect() {

        // Define the GMB scope
        $scopes = [
            'https://www.googleapis.com/auth/plus.business.manage'
        ];

        // Define any configs that overrride the /config/google.php defaults from pulkitjalan/google-apiclient
        $googleConfig = array_merge(config('google'),[
            'scopes' => $scopes,
            'redirect_uri' => config('app.callback_url').'/ggle/callback'
        ]);

        // Generate an auth request URL
        $googleClient = Google::getClient();
        $loginUrl = $googleClient->createAuthUrl();
        
        // Send user to Google for Authorisation
        return redirect()->away($loginUrl);
    }
    
    function getAccountName(Google $googleClient) {
        $gmb = new GoogleMyBusiness($googleClient);
        return $gmb->getAccountName();
    }

}
