<?php

namespace Bytes4sale\PhoneNumberInfo\Http;

use App\Http\Controllers\Controller;
use Bytes4sale\PhoneNumberInfo\Facades\PhoneNumberInfo;

class Example extends Controller
{

    public function getNumberDetails()
    {
        $response = PhoneNumberInfo::getHlrDetails('923333974745');
        // $response = $responseObject->getHlrDetails('923333974745');
        if ($response->isSuccessful()) {
            echo "<pre>";
            print_r($response->getCurrentNetworkDetails());
            die;
        }
        echo "<pre>";
        print_r($response->getContent());
        die;
    }
}
