<?php

namespace cursoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjetoArquivos extends Model implements Transformable {

    use TransformableTrait;

    protected $fillable = [
        'name',
        'description',
        'extension',
    ];

    public function projeto() {
        return $this->belongsTo(Projeto::class);
    }
}
