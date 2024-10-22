<?php

namespace app\exceptions;

use app\exceptions\DefaultException;
class InternalServerException extends DefaultException
{
    public function __construct($showPage=true, $data=[]){
        parent::__construct('500','Internal Server Error','Oh,no! We Cannot Process Your Request Right Now!',$showPage, $data);
    }
}