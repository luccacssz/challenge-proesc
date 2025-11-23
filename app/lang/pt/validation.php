<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Linhas de Linguagem de Validação
    |--------------------------------------------------------------------------
    */

    "accepted"             => "O campo :attribute deve ser aceito.",
    "active_url"           => "O campo :attribute não é uma URL válida.",
    "after"                => "O campo :attribute deve ser uma data depois de :date.",
    "alpha"                => "O campo :attribute deve conter apenas letras.",
    "alpha_dash"           => "O campo :attribute deve conter apenas letras, números e traços.",
    "alpha_num"            => "O campo :attribute deve conter apenas letras e números.",
    "array"                => "O campo :attribute deve ser um array.",
    "before"               => "O campo :attribute deve ser uma data antes de :date.",
    
    "between"              => array(
        "numeric" => "O campo :attribute deve estar entre :min e :max.",
        "file"    => "O arquivo :attribute deve ter entre :min e :max kilobytes.",
        "string"  => "O campo :attribute deve ter entre :min e :max caracteres.",
        "array"   => "O campo :attribute deve ter entre :min e :max itens.",
    ),

    "confirmed"            => "A confirmação do campo :attribute não confere.",
    "date"                 => "O campo :attribute não é uma data válida.",
    "date_format"          => "O campo :attribute não corresponde ao formato :format.",
    "different"            => "Os campos :attribute e :other devem ser diferentes.",
    "digits"               => "O campo :attribute deve ter :digits dígitos.",
    "digits_between"       => "O campo :attribute deve ter entre :min e :max dígitos.",
    "email"                => "O campo :attribute deve ser um e-mail válido.",
    "exists"               => "O :attribute selecionado é inválido.",
    "image"                => "O campo :attribute deve ser uma imagem.",
    "in"                   => "O :attribute selecionado é inválido.",
    "integer"              => "O campo :attribute deve ser um número inteiro.",
    "ip"                   => "O campo :attribute deve ser um endereço IP válido.",

    "max"                  => array(
        "numeric" => "O campo :attribute não pode ser maior que :max.",
        "file"    => "O arquivo :attribute não pode ser maior que :max kilobytes.",
        "string"  => "O campo :attribute não pode ter mais que :max caracteres.",
        "array"   => "O campo :attribute não pode ter mais que :max itens.",
    ),

    "mimes"                => "O campo :attribute deve ser um arquivo do tipo: :values.",

    "min"                  => array(
        "numeric" => "O campo :attribute deve ser no mínimo :min.",
        "file"    => "O arquivo :attribute deve ter no mínimo :min kilobytes.",
        "string"  => "O campo :attribute deve ter no mínimo :min caracteres.",
        "array"   => "O campo :attribute deve ter no mínimo :min itens.",
    ),

    "not_in"               => "O :attribute selecionado é inválido.",
    "numeric"              => "O campo :attribute deve ser um número.",
    "regex"                => "O formato do campo :attribute é inválido.",
    "required"             => "O campo :attribute é obrigatório.",
    "required_if"          => "O campo :attribute é obrigatório quando :other é :value.",
    "required_with"        => "O campo :attribute é obrigatório quando :values está presente.",
    "required_with_all"    => "O campo :attribute é obrigatório quando :values está presente.",
    "required_without"     => "O campo :attribute é obrigatório quando :values não está presente.",
    "required_without_all" => "O campo :attribute é obrigatório quando nenhum dos :values está presente.",
    "same"                 => "Os campos :attribute e :other devem corresponder.",
    
    "size"                 => array(
        "numeric" => "O campo :attribute deve ser :size.",
        "file"    => "O arquivo :attribute deve ter :size kilobytes.",
        "string"  => "O campo :attribute deve ter :size caracteres.",
        "array"   => "O campo :attribute deve conter :size itens.",
    ),

    "unique"               => "O valor do campo :attribute já está em uso.",
    "url"                  => "O formato do campo :attribute é inválido.",

    /*
    |--------------------------------------------------------------------------
    | Mensagens de Validação Personalizadas
    |--------------------------------------------------------------------------
    */

    'custom' => array(
        'cpf' => array(
            'cpf_valido' => 'O CPF informado não é válido.',
        ),        
    ),

    /*
    |--------------------------------------------------------------------------
    | Atributos Personalizados
    |--------------------------------------------------------------------------
    */

    'attributes' => array(),

);
