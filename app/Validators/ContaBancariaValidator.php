<?php

namespace finLaravel\Validators;

use Prettus\Validator\LaravelValidator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientValidator
 *
 * @author proativos
 */
class ContaBancariaValidator extends LaravelValidator {

    protected $rules = [
        'dono_id' => 'required',
        'banco_id' => 'required',
        'conta' => 'required',
        'descricao' => 'required',
    ];

}
