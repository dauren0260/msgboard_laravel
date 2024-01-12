<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "member";
    protected $primaryKey = "id";
    protected $fillable = ["memEmail","memPassword","memName"];
    protected $casts = ['memPassword' => 'hashed'];

    public function getAuthPassword() {
        return $this->memPassword;
    }

}
