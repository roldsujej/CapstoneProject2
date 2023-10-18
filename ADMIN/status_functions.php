<?php

function getStatusText($statusCode)
{
    switch ($statusCode) {
        case -1:
            return "Application Denied";
        case 0:
            return "Pending Verification";
        case 1:
            return "Email Verified";
        case 2:
            return "Account Accepted";
        case 3:
            return "Member";
        default:
            return "Unknown Status";
    }
}
