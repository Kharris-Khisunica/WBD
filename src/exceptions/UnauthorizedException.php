<?php

namespace app\exceptions;

use app\exceptions\DefaultException;
class UnauthorizedException extends DefaultException
{
    public function __construct($showPage=true, $data=[]){
        parent::__construct('401','Unauthorized','Oh,no! We Cannot Process Your Request Right Now!',$showPage, $data);
    }
}