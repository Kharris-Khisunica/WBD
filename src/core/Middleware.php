<?php

namespace app\core;

abstract class Middleware
{
    public abstract function handle($isViewReq = false);
}