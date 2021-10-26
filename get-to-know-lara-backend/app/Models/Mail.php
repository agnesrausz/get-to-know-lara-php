<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    //  - `id` as the primary key
    //  - `id_user_from` a nullable foreign key to the User model
    //  - `id_user_to` a nullable foreign key to the User model
    //  - `subject` a string containing the subject of the mail
    //  - `message` a text containing the body of the mail
    //  - `is_read` logical value to check if the recipient read the mail or not
    //  - `sent` a nullable timestamp with the date and time the mail was sent
    //  - `created` a timestamp with the date and time the record was inserted
}
