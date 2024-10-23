<?php

namespace app\exceptions;

use app\exceptions\DefaultException;
class BadRequestException extends DefaultException
{
    public function __construct($showPage=true, $data=[]){
        parent::__construct('400','Bad Request','Oh, no! We Cannot Process Your Request Right Now!',$showPage, $data);
    }
}