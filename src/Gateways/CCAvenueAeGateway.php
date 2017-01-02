<?php namespace Softon\Indipay\Gateways;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Softon\Indipay\Exceptions\IndipayParametersMissingException;

class CCAvenueAeGateway implements CCAvenueGateway {

    protected $parameters = array();
    protected $merchantData = '';
    protected $encRequest = '';
    protected $testMode = false;
    protected $workingKey = '';
    protected $accessCode = '';
    protected $liveEndPoint = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
    protected $testEndPoint = 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
    public $response = '';

    function __construct()
    {
        $this->workingKey = Config::get('indipay.ccavenueae.workingKey');
        $this->accessCode = Config::get('indipay.ccavenueae.accessCode');
        $this->testMode = Config::get('indipay.testMode');
        $this->parameters['merchant_id'] = Config::get('indipay.ccavenueae.merchantId');
        $this->parameters['currency'] = Config::get('indipay.ccavenueae.currency');
        $this->parameters['redirect_url'] = url(Config::get('indipay.ccavenueae.redirectUrl'));
        $this->parameters['cancel_url'] = url(Config::get('indipay.ccavenueae.cancelUrl'));
        $this->parameters['language'] = Config::get('indipay.ccavenueae.language');
    }
}
