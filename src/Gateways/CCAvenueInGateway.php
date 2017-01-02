<?php namespace Softon\Indipay\Gateways;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Softon\Indipay\Exceptions\IndipayParametersMissingException;

class CCAvenueInGateway extends CCAvenueGateway {

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
        $this->workingKey = Config::get('indipay.ccavenuein.workingKey');
        $this->accessCode = Config::get('indipay.ccavenuein.accessCode');
        $this->testMode = Config::get('indipay.testMode');
        $this->parameters['merchant_id'] = Config::get('indipay.ccavenuein.merchantId');
        $this->parameters['currency'] = Config::get('indipay.ccavenuein.currency');
        $this->parameters['redirect_url'] = url(Config::get('indipay.ccavenuein.redirectUrl'));
        $this->parameters['cancel_url'] = url(Config::get('indipay.ccavenuein.cancelUrl'));
        $this->parameters['language'] = Config::get('indipay.ccavenuein.language');
    }
}
