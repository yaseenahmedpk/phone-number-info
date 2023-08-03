<?php

namespace Bytes4sale\PhoneNumberInfo\Provider;

use Bytes4sale\PhoneNumberInfo\net\HttpRequest;
use InvalidArgumentException;

class HlrLookup
{
    private $baseUrl = "https://api.hlrlookup.com/apiv2";

    public function getHlrDetails(string $number, array $params = [])
    {
        
        $httpRequest = new HttpRequest();
        $response = $httpRequest->post($this->baseUrl . '/hlr', json_encode($this->prepareRequestData($number, $params)), HttpRequest::APPLICATION_JSON);
        if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
            $responseContentArray = json_decode($response->getContent());
            $this->prepareHlrResponse($responseContentArray->results, $response);
            return $response;
        }
        return $response;
    }

    private function prepareRequestData($numbers, $params)
    {
        $paramsData = [];
        foreach (explode(",", $numbers) as $number) {
            $paramsData[] = $this->getParams($number, $params);
        }
        if (config('phonenumberinfo.api-key') != null && config('phonenumberinfo.api-secret') != null) {
            return [
                "api_key" => config('phonenumberinfo.api-key'),
                "api_secret" => config('phonenumberinfo.api-secret'),
                "requests" => $paramsData,
            ];
        } else {
            throw new InvalidArgumentException('Api key or Api secret is missing please set API_KEY and API_SECRET in .env file, If you have already set then please try config:cache command');
        }
    }

    private function getParams($number, $params)
    {
        $params["telephone_number"] = $number;
        return $params;
    }

    private function prepareHlrResponse($responseContentArray, $response)
    {
        $numbersErrors = [];
        $uuIds = [];
        $requestParameters = [];
        $numberSpendCredits = [];
        $formattedTelephoneNumbers = [];
        $isOriginalNetworkAvailable = [];
        $originalNetworkDetails = [];
        $numberTypes = [];
        $isLiveStatusAvailable = [];
        $isCurrentNetworkAvailable = [];
        $currentNetworkDetails = [];
        $isNumberPorted = [];
        $smsEmail = [];
        $mmsEmail = [];
        foreach ($responseContentArray as $responseData) {
            $numbersErrors[] = $responseData->error;
            $uuIds[] = $responseData->uuid;
            $requestParameters[] = $responseData->request_parameters;
            $numberSpendCredits[] = $responseData->credits_spent;
            $numberSpendCredits[] = $responseData->credits_spent;
            $formattedTelephoneNumbers[] = $responseData->formatted_telephone_number;
            $isOriginalNetworkAvailable[] = $responseData->original_network;
            $originalNetworkDetails[] = $responseData->original_network_details;
            $numberTypes[] = $responseData->telephone_number_type;
            $isLiveStatusAvailable[] = $responseData->live_status;
            $isCurrentNetworkAvailable[] = $responseData->current_network;
            $currentNetworkDetails[] = $responseData->current_network_details;
            $isNumberPorted[] = $responseData->is_ported;
            $smsEmail[] = $responseData->sms_email;
            $mmsEmail[] = $responseData->mms_email;
        }
        $response->setNumberError($numbersErrors);
        $response->setUuid($uuIds);
        $response->setRequestParameters($requestParameters);
        $response->setCreditsSpent($numberSpendCredits);
        $response->setFormattedTelephoneNumber($formattedTelephoneNumbers);
        $response->setIsOriginalNetworkAvailable($isOriginalNetworkAvailable);
        $response->setOriginalNetworkDetails($originalNetworkDetails);
        $response->setNumberType($numberTypes);
        $response->setIsLiveStatusAvailable($isLiveStatusAvailable);
        $response->setIsCurrentNetworkAvailable($isCurrentNetworkAvailable);
        $response->setCurrentNetworkDetails($currentNetworkDetails);
        $response->setIsNumberPorted($isNumberPorted);
        $response->setSmsEmail($smsEmail);
        $response->setMmsEmail($mmsEmail);
    }
}
