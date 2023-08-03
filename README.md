# Phone-Number-Info Laravel Package

## Introduction

Phone-Number-Info is a Laravel package that provides useful information related to phone numbers, including Home Location Register (HLR) insights, number types, original network details, and more.

## Features
The Phone-Number-Info Laravel package comes with the following features:

1. Phone Number Validation:
   - Validate the format and correctness of phone numbers.

2. HLR Lookups:
   - Perform Home Location Register (HLR) lookups to determine the real-time status and information of phone numbers.

3. Number Type Detection:
   - Detect the type of phone number, such as mobile or landline.

4. Original Network Details:
   - Retrieve details about the original network provider of the phone number.

5. Number Porting Detection:
   - Identify if the phone number has been ported between different carriers.

6. SMS and MMS Email Addresses:
   - Obtain the SMS and MMS email addresses associated with the phone number.

7. Credits Management:
   - Keep track of the number of credits spent for API requests and usage.

8. Request Parameters:
   - Access and analyze the parameters used in the API request for phone number information.

## Prerequisites
Before using the Phone-Number-Info Laravel package, you must fulfill the following prerequisites:

1. **API Key and API Secret from hlrlookup.com**:
   - To access HLR data and perform phone number lookups, you need an API key and API secret from hlrlookup.com. Visit their website (https://hlrlookup.com) to sign up for an account and obtain the required credentials. Note that hlrlookup.com may have specific usage limits and pricing policies for their API services.

2. **PHP 7.4 or higher**:
   - Ensure that your server environment has PHP 7.4 or a higher version installed, as the package requires this minimum PHP version to function correctly.

3. **Laravel 8.0 or higher**:
   - Phone-Number-Info Laravel package requires Laravel 8.0 or a higher version. Make sure you have a compatible Laravel framework set up in your project.

### Installation

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require bytes4sale/phone-number-info
```

## Configuration
Before using this package, you need to set your API key and API Secret in the .env file of your Laravel project.

1. Open your Laravel project's root directory.
2. Create or modify the `.env` file and add:

```php
API_KEY=your_hlrlookup_api_key_here
API_SECRET=your_hlrlookup_api_secret_here,

```

## Usage

Getting information for a Phone Number is a breeze with phone-number-info. Simply follow these steps:

1. **Initialize phone-number-info**: Before using the package, make sure to initialize it. You can do this by adding the `ServiceProvider` to the `config/app.php` file:

   ```php
   // config/app.php
   
   'providers' => [
       // Other providers...
       Bytes4sale\PhoneNumberInfo\PhoneNumberInfoServiceProvider::class,
   ],

2. **Retrieve Number Information**: Once the package is initialized, you can easily get the details for a Phone Number:

   ```php
    use Bytes4sale\PhoneNumberInfo\Facades\PhoneNumberInfo;
   
   // Get information for a single phone number
    $phoneNumber = '921234567874';
    $response  = PhoneNumberInfo::getHlrDetails($phoneNumber);
    if ($response->isSuccessful()) {
        print_r($response->getContent());
        } else{
            print_r($response->getErrorResponse());
        }
    // Get information for multiple phone numbers
    $multiplePhoneNumbers = '921234567874,921234567891';
    $multipleResponse = PhoneNumberInfo::getHlrDetails($multiplePhoneNumbers);
    if ($multipleResponse->isSuccessful()) {
        print_r($multipleResponse->getContent());
        } else {
            print_r($multipleResponse->getErrorResponse());
        }

### Configuration

phone-number-info allows you to customize its behavior by publishing its configuration file. To do this, run the following artisan command:

```bash
php artisan vendor:publish --tag="number-info-config"
```

After running the command, you will find the configuration file at config/phonenumberinfo.php. You can modify the settings as per your needs.

# Available Methods

| Method                                                       | Description                                                               |
| ------------------------------------------------------------ | ------------------------------------------------------------------------- |
| `getNumberError($numbersErrors)`                             | Get the error messages related to phone numbers.                          |
| `getUuid($uuIds)`                                            | Get the UUIDs associated with the phone numbers.                          |
| `getRequestParameters($requestParameters)`                   | Get the parameters used in the request for phone number information.      |
| `getCreditsSpent($numberSpendCredits)`                       | Get the number of credits spent for retrieving phone number information.  |
| `getFormattedTelephoneNumber($formattedTelephoneNumbers)`    | Get the phone numbers in a formatted representation.                      |
| `getIsOriginalNetworkAvailable($isOriginalNetworkAvailable)` | Check if the information about the original network is available.         |
| `getOriginalNetworkDetails($originalNetworkDetails)`         | Get details about the original network of the phone number.               |
| `getNumberType($numberTypes)`                                | Get the type of the phone number (e.g., mobile, landline).                |
| `getIsLiveStatusAvailable($isLiveStatusAvailable)`           | Check if the live status information is available.                        |
| `getIsCurrentNetworkAvailable($isCurrentNetworkAvailable)`   | Check if the current network information is available.                    |
| `getCurrentNetworkDetails($currentNetworkDetails)`           | Get details about the current network of the phone number.                |
| `getIsNumberPorted($isNumberPorted)`                         | Check if the phone number is ported (i.e., transferred between carriers). |
| `getSmsEmail($smsEmail)`                                     | Get the SMS email address associated with the phone number.               |
| `getMmsEmail($mmsEmail)`                                     | Get the MMS email address associated with the phone number.               |
|                                                              |


## Contributions and Bug Reports
We welcome contributions from the community to improve bytes4sale phone-number-info. If you find a bug or have a suggestion for a new feature, we encourage you to participate and help make this package even better.

### Bug Reports

If you encounter any issues or bugs while using bytes4sale phone-number-info, please open an issue in our [GitHub repository](https://github.com/yaseenahmedpk/phone-number-info). When reporting a bug, please provide as much detail as possible, including:
- A clear and descriptive title for the issue.
- Steps to reproduce the bug.
- Information about your PHP and Laravel versions.
- Any relevant error messages or screenshots.

### Feature Requests

If you have a new feature idea or enhancement in mind, you can also open an issue in the [GitHub repository](https://github.com/yaseenahmedpk/phone-number-info). Please outline the feature's functionality and the problem it solves or the value it adds to the package.

### Contributing

We appreciate contributions from the community to help us improve the package. If you'd like to contribute code, please follow these steps:

1. Fork the repository and create a new branch from the `master` branch.
2. Implement your changes or additions.
3. Write tests to ensure the new code functions correctly and update existing tests as needed.
4. Make sure all tests pass.
5. Create a pull request (PR) to submit your changes. Clearly describe the changes you've made and any related issues or features.

Our team will review your PR, and if everything looks good, we'll merge it into the `master` branch.

By contributing to bytes4sale phone-number-info, you agree to make your contributions available under this package.

We appreciate the efforts of our contributors, and your help will make the package better for everyone. Thank you!

## License
The MIT License (MIT). Please see [License File](https://github.com/yaseenahmedpk/phone-number-info/blob/master/LICENSE.md) for more information.

## Acknowledgments

If you find this package helpful, consider giving credit to the authors and contributors.

