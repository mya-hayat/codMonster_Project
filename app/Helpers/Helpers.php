<?php

namespace App\Helpers;

class Helpers
{
    public function settings_default() {
        $data = [
            "title_form"            => "Quick Form",
            "color_title"           => "#292ED6",
            "background_color"      => "#EDD8C7",
            "last_name"             => "Last Name",
            "first_name"            => "First Name",
            "email"                 => "Email",
            "phone_number"          => "Phone",
            "address"               => "Address",
            "btn_save"              => "Buy now",
            "back_btn"              => "#D62828",
            "border_color"          => "#D62828",
            "border_size"           => "1",
        ];

        return $data;
    }
    public static function instance()
    {
        return new Helpers();
    }


}
