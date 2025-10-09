<?php

use Config\Services;

if (!function_exists('csrf_auto_field')) {
    function csrf_auto_field(): string
    {
        $security = Services::security();
        return '<input type="hidden" name="' . $security->getTokenName() .
               '" value="' . $security->getHash() . '">';
    }
}
