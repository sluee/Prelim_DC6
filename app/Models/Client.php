<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable =['first_name', 'last_name','address','phone','level','pic'];
    protected $appends = ['picUrl'];

    public function getPicUrlAttribute() {
        $url = $this->pic ? asset("images/clients_pics/" . $this->pic) : "https://i.pinimg.com/736x/73/e0/5c/73e05c27a6de1ad14a8374289f53f4cb.jpg";
        return $url;
    }
}
