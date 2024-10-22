<?php

namespace app\exceptions;

use app\exceptions\DefaultException;
class NotFoundException extends DefaultException
{
    public function __construct($showPage=true, $data=[]){
        parent::__construct('404','Not Found','Oh,no! We Cannot Find What You Are Looking For!',$showPage, $data);
    }
}