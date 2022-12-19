<?php

namespace App\Http\Traits;

use App\Models\Configuration;

/**
 * 
 */
trait ConfigurationTrait
{
    public function fistOrConfigurationeMail()
    {
        try {
            $adminEmail = Configuration::firstOrFail();
            $adminEmail->email;
        } catch (\Throwable $th) {
            //  s'il n'est pas encore configuré, récupérer à partir de env file
            $adminEmail = env("MAIL_FROM_ADDRESS");
        }
        return $adminEmail;
    }
}
