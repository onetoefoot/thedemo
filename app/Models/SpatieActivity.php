<?php

namespace App\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use \Spatie\Activitylog\Models\Activity as BaseActivity;

class SpatieActivity extends BaseActivity
{
    use UsesTenantConnection;
}
