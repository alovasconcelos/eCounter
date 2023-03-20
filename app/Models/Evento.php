<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends BaseModel
{
    use HasFactory;
    protected $table = 'Evento';

    public function qtd() {
        $qtd = ContadorEvento::where('evento_id', $this->id)->count();
        return $qtd;
    }

    public static function ultimo($idEvento) {
        $ce = ContadorEvento::where('evento_id', $idEvento)
						->latest('id')
						->first();
	if ($ce) {
	    $timestamp = strtotime($ce->hora);
	    return date('d/m/Y H:i', $timestamp);
	}
        return 'sem registro'; 
    }
    
}
