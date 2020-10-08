<?php

namespace App;

class PayPal{
    
        private $_apiContext;
        private $shopping_cart;
        private $_ClientId = 'AWeJkadXyc4adtXWexQlOlIi7Oe6pTEMpU7MVH475q9qqf7xkgbdnDVmI7b5Jue2idmxVugBonxFFRgC';
        private $_ClientSecret = 'EPI7z5w9u9k3cfpq-60ulY_rd6yuFuRhYhMlbRnyJfSz3P-os0sANqRSpM_JyaFTV922T_PUZKRLc9vn';

        public function __construct($shopping_cart)
        {
            $this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId,
                    $this->_ClientSecret);

            $config = config("paypal_payment");

            $flatConfig = array_dot($config);

            $this->_apiContext->setConfig($flatConfig);

            $this->shopping_cart = $shopping_cart;
        }


        public function generate(){
            $payment = \PaypalPayment::payment()->setIntent("sale")
                        ->setPayer($this->payer())
                        ->setTransactions([$this->transaction()])
                        ->setRedirectUrls($this->redirectURLs());

            try {
                $payment->create($this->_apiContext);
            } catch (\Exception $ex) {
                dd($ex);
                exit(1);
            }

            return $payment;
        }

        public function payer()
        { //Return payments Info
            return \PaypalPayment::payer()
                                ->setPaymentMethod("paypal");
        }

        public function transaction()
        {  //Return transactions info
            return \PaypalPayment::transaction()
                                ->setAmount($this->amount())
                                ->setItemList($this->items())
                                ->setDescription("Tu compra en MAYACADEMY")
                                ->setInvoiceNumber(uniqid());
        }

        public function items(){ //Lists producs
            $items = [];

            $courses = $this->shopping_cart->courses()->get();

            foreach ($courses as $course) {
                array_push($items,$course->paypalItem());
            }

            return \PaypalPayment::itemList()->setItems($items);
        }


        public function amount()
        {  //Return transactions info
            
            return \PaypalPayment::amount()->setCurrency("USD")
                                ->setTotal($this->shopping_cart->totalUSD());
        }

        public function redirectURLs()
        { //Return result a redirectURLs
            $baseURL = url('/');
            return \PaypalPayment::redirectUrls()
                                ->setReturnUrl("$baseURL/payments/store")
                                ->setCancelUrl("$baseURL/mycart");
        }

        public function execute($paymentId,$payerId)
        {
            $payment = \PaypalPayment::getById($paymentId,$this->_apiContext);

            $execution = \PaypalPayment::PaymentExecution()
                                    ->setPayerId($payerId);

            return $payment->execute($execution,$this->_apiContext);
        }
}