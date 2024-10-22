<?php

namespace app\exceptions;

use app\exceptions\DefaultException;
class ForbiddenException extends DefaultException
{
    public function __construct($showPage=true, $data=[]){
        parent::__construct('403','Forbidden','Oh,no! We Cannot Process Your Request Right Now!',$showPage, $data);
    }
}