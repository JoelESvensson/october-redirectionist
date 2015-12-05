<?php

namespace EngagementAgency\Redirectionist\Models;

use Model;

class Redirection extends Model
{
    protected $table = 'engagement_redirectionist_redirections';

    protected $fillable = [
        'from_route',
        'to_route',
    ];
}
