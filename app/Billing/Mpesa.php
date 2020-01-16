<?php
 namespace App\Billing;


 class Mpesa{

     protected $key;

     public function __construct($key)
     {
         $this->key=$key;
     }
 }
