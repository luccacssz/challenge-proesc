<?php

namespace App\Services;

Class NotasFormatar {
    const NOTA_MIN = 70;
    const NOTA_MAX = 100;

    public function formataNotasPeriodos($notas, $criterio_avaliativo)
    {
        if (!empty($notas) && !empty($criterio_avaliativo)) {
            foreach ($notas as $nota) {
                $nota->valor_nota = $this->arredondaNota($nota->valor_nota, $criterio_avaliativo->arredondamento_id);
                $nota->vermelha = $nota->valor_nota < self::NOTA_MIN;
                $nota->nota_min = self::NOTA_MIN;
                $nota->nota_max = self::NOTA_MAX;
            }
        }

        return $notas;
    }

    public function calculaNotaFinal($notas, $disciplinas, $criterio_avaliativo)
    {
        if (empty($notas) || empty($disciplinas) || empty($criterio_avaliativo)) {
            return [];
        }

        $array_notas = [];

        foreach ($disciplinas as $disciplina) {
            foreach ($notas as $nota) {
                if ($nota->disciplina_id == $disciplina->disciplina_id) {
                    $array_notas[] = [
                        'valor_nota' => $nota->valor_nota,
                        'disciplina_id' => $nota->disciplina_id,
                        'periodo_id' => $nota->periodo_id
                    ];
                }
            }
        }

        $notas_finais = $this->{"calculo$criterio_avaliativo->calculo_id"}($array_notas, $criterio_avaliativo->arredondamento_id);

        
        foreach ($notas_finais as &$nf) {
            $nf['vermelha'] = $nf['valor_nota'] < self::NOTA_MIN;
            $nf['nota_min'] = self::NOTA_MIN;
            $nf['nota_max'] = self::NOTA_MAX;
        }

        return $notas_finais;
    }

    function calculo1($array_notas, $arredondamento_id) {
        $array_notas_finais = [];
    
        foreach ($array_notas as $nota) {
            $disciplina_id = $nota['disciplina_id'];
    
            if (!isset($array_notas_finais[$disciplina_id])) {
                $array_notas_finais[$disciplina_id] = [
                    'disciplina_id' => $disciplina_id,
                    'soma' => 0,
                    'contagem' => 0
                ];
            }
    
            $array_notas_finais[$disciplina_id]['soma'] += $nota['valor_nota'];
            $array_notas_finais[$disciplina_id]['contagem']++;
        }
    
        foreach ($array_notas_finais as &$nota_final) {
            $nota_final['valor_nota'] = $this->arredondaNota($nota_final['soma'] / $nota_final['contagem'], $arredondamento_id);
        }
    
        return $array_notas_finais;
    }

    function calculo2($array_notas, $arredondamento_id) {
        $array_notas_finais = [];
    
        foreach ($array_notas as $nota) {
            $disciplina_id = $nota['disciplina_id'];
    
            if (!isset($array_notas_finais[$disciplina_id])) {
                $array_notas_finais[$disciplina_id] = [
                    'disciplina_id' => $disciplina_id,
                    'soma' => 0
                ];
            }
    
            $array_notas_finais[$disciplina_id]['soma'] += $nota['valor_nota'];
        }
    
        foreach ($array_notas_finais as &$nota_final) {
            $nota_final['valor_nota'] = $this->arredondaNota($nota_final['soma'], $arredondamento_id);
        }
    
        return $array_notas_finais;
    }


    function calculo3($array_notas, $arredondamento_id) {

    $array_notas_finais = [];

    
    foreach ($array_notas as $nota) {

        $disciplina_id = $nota['disciplina_id'];
        $periodo = (int) $nota['periodo_id']; 

        if (!isset($array_notas_finais[$disciplina_id])) {
            $array_notas_finais[$disciplina_id] = [
                'disciplina_id' => $disciplina_id,
                'notas' => [
                    1 => 0,
                    2 => 0,
                    3 => 0,
                    4 => 0
                ]
            ];
        }

        
        $array_notas_finais[$disciplina_id]['notas'][$periodo] = $nota['valor_nota'];
    }
    
    foreach ($array_notas_finais as &$disciplina) {

        $nota1 = $disciplina['notas'][1];
        $nota2 = $disciplina['notas'][2];
        $nota3 = $disciplina['notas'][3];
        $nota4 = $disciplina['notas'][4];        
       
        $media = ($nota1 + $nota2 + ($nota3 * 2) + ($nota4 * 2)) / 6;

        
        $disciplina['valor_nota'] = $this->arredondaNota($media, $arredondamento_id);
    }

    return $array_notas_finais;
}


    protected function arredondaNota($nota, $arredondamento_id)
    {
        if (!is_null($arredondamento_id) && !is_null($nota)) {
            return $this->{"arredondamento$arredondamento_id"}($nota);
        }

        return $nota;
    }

    protected function arredondamento1($valor_nota)
    {
        $valor_nota_arredondada = ceil($valor_nota);
        
        return $valor_nota_arredondada;
    }

    protected function arredondamento2($valor_nota)
    {
        $valor_nota_arredondada = floor($valor_nota);
        
        return $valor_nota_arredondada;
    }

    protected function arredondamento3($valor_nota)
    {
        if (is_null($valor_nota)) {
            return $valor_nota;
        }

        $parte_inteira = floor($valor_nota);
        $parte_decimal = $valor_nota - $parte_inteira;

        if ($parte_decimal >= 0.7) {
            return $parte_inteira + 1;
        }

        return $parte_inteira;
    }

    public function calculaNotasPorDisciplinaPeriodo($notas_periodos)
    {
        $notas_por_disciplina_periodo = [];
        
       foreach ($notas_periodos as $nota) {
          $notas_por_disciplina_periodo[$nota->disciplina_id][$nota->periodo_id] = $nota;
        }
        return $notas_por_disciplina_periodo;
    }

    public function calculaNotaMaxima($notas_por_disciplina_periodo, $notas_finais, $disciplinas, $diarios)
    {
        $max_por_periodo = [];

    
        foreach ($diarios as $diario) {
            $max = null;
            foreach ($disciplinas as $disciplina) {
                $nota = isset($notas_por_disciplina_periodo[$disciplina->disciplina_id][$diario->periodo_id])
                        ? $notas_por_disciplina_periodo[$disciplina->disciplina_id][$diario->periodo_id]->valor_nota
                        : null;
                if ($nota !== null && ($max === null || $nota > $max)) {
                    $max = $nota;
                }
            }
            $max_por_periodo[$diario->periodo_id] = $max;
        }

        
        $max_nota_final = null;
        foreach ($notas_finais as $nf) {
            if ($max_nota_final === null || $nf['valor_nota'] > $max_nota_final) {
                $max_nota_final = $nf['valor_nota'];
            }
        }

        return [
            'max_por_periodo' => $max_por_periodo,
            'max_nota_final' => $max_nota_final
        ];
    }

}