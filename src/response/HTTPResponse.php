<?php

namespace Bytes4sale\PhoneNumberInfo\response;

class HTTPResponse
{

    private $statusCode;
    private $content;
    private $successful = false;
    private $requestString;
    private $message;
    private $numberError;
    private $uuid;
    private $creditsSpent;
    private $requestParameters = [];
    private $formattedTelephoneNumber;
    private $isOriginalNetworkAvailable;
    private $originalNetworkDetails = [];
    private $numberType;
    private $isLiveStatusAvailable;
    private $isCurrentNetworkAvailable;
    private $currentNetworkDetails = [];
    private $isNumberPorted;
    private $smsEmail;
    private $mmsEmail;

    public function __construct()
    {
    }

    /**
     * @return the http request status code i.e. 200, 500
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param statusCode to set status code <b>will be used by http client to
     * update the info</b>
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return the content/body of http response
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param content to set the content/body of http response <b>will be used by
     * http client to update the info</b>
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function isSuccessful()
    {
        return $this->successful;
    }

    /**
     * @param successfull the successful to set
     */
    public function setSuccessful($successfull)
    {
        $this->successful = $successfull;
    }

    /**
     * @return the requestString
     */
    public function getRequestString()
    {
        return $this->requestString;
    }

    /**
     * @param requestString the requestString to set
     */
    public function setRequestString($requestString)
    {
        $this->requestString = $requestString;
    }

    /**
     * setMessage function
     *@param string $message set response message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    /**
     * getMessage function
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * getErrorResponse function
     *
     * @return array
     */
    public function getErrorResponse()
    {
        return [
            'successful' => $this->isSuccessful(),
            'statusCode' => $this->getStatusCode(),
            'message' => $this->getMessage(),
            'description' => $this->getContent(),
        ];
    }

    public function setNumberError($numberError)
    {
        $this->numberError = $numberError;
    }

    public function getNumberError()
    {
        return $this->numberError;
    }
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }
    public function getUuid()
    {
        return $this->uuid;
    }

    public function setRequestParameters(array $requestParameters)
    {
        $this->requestParameters = $requestParameters;
    }
    public function getRequestParameters(): array
    {
        return $this->requestParameters;
    }
    public function setCreditsSpent($creditsSpent)
    {
        $this->creditsSpent = $creditsSpent;
    }
    public function getCreditsSpent()
    {
        return $this->creditsSpent;
    }
    public function setFormattedTelephoneNumber($formattedTelephoneNumber)
    {
        $this->formattedTelephoneNumber = $formattedTelephoneNumber;
    }
    public function getFormattedTelephoneNumber()
    {
        return $this->formattedTelephoneNumber;
    }
    public function setIsOriginalNetworkAvailable($isOriginalNetworkAvailable)
    {
        $this->isOriginalNetworkAvailable = $isOriginalNetworkAvailable;
    }
    public function getIsOriginalNetworkAvailable()
    {
        return $this->isOriginalNetworkAvailable;
    }
    public function setOriginalNetworkDetails(array $originalNetworkDetails)
    {
        $this->originalNetworkDetails = $originalNetworkDetails;
    }
    public function getOriginalNetworkDetails(): array
    {
        return $this->originalNetworkDetails;
    }
    public function setNumberType($numberType)
    {
        $this->numberType = $numberType;
    }
    public function getNumberType()
    {
        return $this->numberType;
    }
    public function setIsLiveStatusAvailable($isLiveStatusAvailable)
    {
        $this->isLiveStatusAvailable = $isLiveStatusAvailable;
    }
    public function getIsLiveStatusAvailable()
    {
        return $this->isLiveStatusAvailable;
    }
    public function setIsCurrentNetworkAvailable($isCurrentNetworkAvailable)
    {
        $this->isCurrentNetworkAvailable = $isCurrentNetworkAvailable;
    }
    public function getIsCurrentNetworkAvailable()
    {
        return $this->isCurrentNetworkAvailable;
    }
    public function setCurrentNetworkDetails($currentNetworkDetails)
    {
        $this->currentNetworkDetails = $currentNetworkDetails;
    }
    public function getCurrentNetworkDetails()
    {
        return $this->currentNetworkDetails;
    }
    public function setIsNumberPorted($isNumberPorted)
    {
        $this->isNumberPorted = $isNumberPorted;
    }
    public function getIsNumberPorted()
    {
        return $this->isNumberPorted;
    }
    public function setSmsEmail($smsEmail)
    {
        $this->smsEmail = $smsEmail;
    }
    public function getSmsEmail()
    {
        return $this->smsEmail;
    }
    public function setMmsEmail($mmsEmail)
    {
        $this->mmsEmail = $mmsEmail;
    }
    public function getMmsEmail()
    {
        return $this->mmsEmail;
    }

}
