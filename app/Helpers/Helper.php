<?php

use App\Http\Services\AffiliationService;
use App\Mail\CustomEmailNotify;
use App\Models\Coin;
use App\Models\Currency;
use App\Models\EmailTemplate;
use App\Models\FileManager;
use App\Models\Hardware;
use App\Models\Language;
use App\Models\Meta;
use App\Models\Notification;
use App\Models\Plan;
use App\Models\Quotation;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\TicketConversation;
use App\Models\User;
use App\Models\UserPackage;
use Jenssegers\Agent\Agent;
use App\Models\UserActivityLog;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\UserWallet;
use App\Models\Webhook;
use App\Models\WebhookEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Mail\EmailNotify;
use App\Models\Chat;
use App\Models\ClientInvoice;
use App\Models\ClientOrder;
use App\Models\ClientOrderItem;
use App\Modules\Settings\Models\SchoolInformation;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

if (!function_exists("getInstituteInfo")) {
    function getInstituteInfo($option_key)
    {

    }
}


if (!function_exists("getOption")) {
    function getOption($option_key, $default = NULL)
    {
        $system_settings = SchoolInformation::where('school_id', auth()->user()->school_id)->first();
        $value = $system_settings->$option_key;

        if ($option_key && $value != null) {
            return $value;
        } else {
            return $default;
        }
    }
}
