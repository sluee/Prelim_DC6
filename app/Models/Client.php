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
        $url = $this->pic ? asset("images/clients_pics/" . $this->pic) : "https://i.pinimg.com/564x/57/10/9e/57109e872f0bf5f732436452cf61db38.jpg";
        return $url;
    }
}
