<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends BaseModel
{
    use HasFactory;
    protected $table = 'Evento';

    public function Qtd() {
        $qtd = ContadorEvento::where('evento_id', $this->id)->count();
        return $qtd;
    }
}
