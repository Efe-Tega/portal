<?php

use Carbon\Carbon;

function formatDate($date, $format = 'F Y')
{
    if (!$date) return null;
    return Carbon::parse($date)->format($format);
}
