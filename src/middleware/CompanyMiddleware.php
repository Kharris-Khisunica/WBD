<?php

namespace app\middlewares;

use app\core\Middleware;
use app\exceptions\ForbiddenException;
use app\exceptions\NotFoundException;

class CompanyMiddleware extends Middleware
{
    public function handle($showPage = true)
    {
        if (!isset($_SESSION['role'])) {
            throw new NotFoundException($showPage);
        } elseif ($_SESSION['role'] != 'company') {
            throw new ForbiddenException($showPage);
        }
    }
}
