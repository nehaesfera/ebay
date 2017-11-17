<?php

ini_set("display_errors", 1);
/**
 * Copyright 2017 David T. Sadler
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Include the SDK by using the autoloader from Composer.
 */
require __DIR__.'/vendor/autoload.php';

/**
 * Include the configuration values.
 *
 * Ensure that you have edited the configuration.php file
 * to include your application keys.
 */
$config = require __DIR__.'/keys.php';

/**
 * The namespaces provided by the SDK.
 */
use \DTS\eBaySDK\OAuth\Services;
use \DTS\eBaySDK\OAuth\Types;

/**
 * Create the service object.
 */
$service = new Services\OAuthService([
    'credentials' => $config['production']['credentials'],
    'ruName'      => $config['production']['ruName'],
    'production'     => true
]);

/**
 * Create the request object.
 */
$request = new Types\GetUserTokenRestRequest();
$request->code = 'v^1.1#i^1#f^0#I^3#r^0#p^1#t^H4sIAAAAAAAAAOVXa2wUVRTudtutDRQJIiIiWYaCpjjvndndCZ2wtEUaoFvY2tjyqHdn7rTD7s4sc2do9wem1thIiAkJBPTf+gPFGCPGmMhDI4IkhohGtEQMPlIUYiQEiCEaTLwzu5RtJTyLkDjJZjPnnnvu+b7znXvnMv2B6rrBJYOXanxV5fl+pr/c52MnMNWByvmT/OUzKsuYEgdfvr+2v2LAf2YBApl0VloJUdY0EAz2ZdIGkjxjPeFYhmQCpCPJABmIJFuRErHlyySOYqSsZdqmYqaJYHNjPcGFgMqEeIGNRDRNiwJsNa7EbDPrCTYqgAgf5XioQDachHgcIQc2G8gGho3nM2yYZFmSDbexvMRxkiBSIhPtJILt0EK6aWAXiiFkL13Jm2uV5Hr9VAFC0LJxEEJuji1OxGPNjU0tbQvoklhykYeEDWwHjX5rMFUYbAdpB15/GeR5SwlHUSBCBC0XVhgdVIpdSeY20veoFkUhHOVCDM9zqphMgnGhcrFpZYB9/Txci66SmucqQcPW7dyNGMVsJNdBxS6+teAQzY1B92+FA9K6pkOrnmhaFOuItbYSsgphCvUAi4xbKrQadUS2rmwkQywfghEtzJHRZBhqQkgsLlSIVqR5zEoNpqHqLmko2GLaiyDOGo7lhi3hBjvFjbgV02w3o1I/YYRDodMtaqGKjt1juHWFGUxE0Hu9cQVGZtu2pScdG45EGDvgUVRPgGxWV4mxg54Wi/LpQ/VEj21nJZru7e2lennKtLppjmFY+tnlyxJKD8xghfRl3F4v+Os3nkDqHhQFtyn2l+xcFufSh7WKEzC6CZkTOfwUeR+dljzW+i9DCWZ6dEeMV4dEOcBHBV4QxZDGRYTkeHSIXBQp7eYBkyBHZoCVgnY2DRRIKlhnTgZauirxgsbxEQ2SqhjVyFBU08ikoIokq0HIQJhMKtHI/6lRblbqCcXMwlYzrSu5cRH8uImdt9RWYNm5BEynseFmVX9NkMgFedfhub1+SxDdGAgHAVmdcrVNKWaGNgHe1FxTl5f1HeHW8Xl4XxUVAywg1dXCQUZ5cCm0QaEsiEzHwmc4FXf39TYzBQ3cJbZlptPQamfviInx29Hv0W5+TVRKWsc0dt1vyG5xm7xNbQP7HqKuGPCtugZyVmAZ/JEYDd8Ztgavrm25/2DTuqXCLjGRDdW78AFCj74OyWXeww74PmAGfO/hGxVDM3PZOczsgP+ZCv/EGUi3IaUDjUJ6t4G/8i1IpWAuC3SrPOBbNXP3W10lF7D8Gmb6yBWs2s9OKLmPMTOvjlSyDz5Sw4ZZFv94jhPETmbO1dEKdlrF1PkLf4KzLjuz1u+YWPXQmeDP1Xu/qWBqRpx8vsoyrIyyYQvMndrfsOTsE3VW1aeHZnfqR958gHt0U2rb5z9U7try8op9a9v/+ur14Y5fBn878NTlj1enNq/XTu7YenbfC93W5ClbPvm+Ni5/d1hNPnc+0NJU9XVHr/zFO793bHz13NE15+oO/bH2jbc3/6i0zZq+6O/XDj79GP3kqfXyzoXbNm1aMzDFqT1xevWvgfOZ1PCkS0OD+Q/XHUzvfHzeBRFuPT40lJKXf8RNvQgePq3tP9YdmOIHhy9O73llz142k2heumrydvHCSjScl88lcxo7c+OJQNeL8dRx6s/3Tz6ff2loWt0GpzIXqbm4dPOMQ/uP5I+W7T4VD79LH1M+q93VfmDPtzsnzvvSX9dTKN8/QIvn4hoPAAA=';

/**
 * Send the request.
 */
$response = $service->getUserToken($request);

/**
 * Output the result of calling the service operation.
 */
printf("\nStatus Code: %s\n\n", $response->getStatusCode());
if ($response->getStatusCode() !== 200) {
    printf(
        "%s: %s\n\n",
        $response->error,
        $response->error_description
    );
} else {
    printf(
        "%s\n%s\n%s\n%s\n\n",
        $response->access_token,
        $response->token_type,
        $response->expires_in,
        $response->refresh_token
    );
}
