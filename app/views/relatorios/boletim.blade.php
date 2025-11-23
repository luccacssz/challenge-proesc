@extends('layouts.main')

@section('title', 'BOLETIM')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">BOLETIM</h2>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered mb-4">
                <tbody>
                    <tr class="title__green">
                        <th scope="row" class="text-left">ALUNO: {{ $aluno->nome }}</th>
                        <td class="text-left">TURMA: {{ $aluno->turma_nome }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center mb-3 text__green">NOTAS</h4>
           <table class="table table-bordered text-center">
    <thead>
        <tr>
            <th class="title__green">DISCIPLINAS</th>
            @foreach ($diarios as $diario)
                <th class="title__green">
                    {{ $diario->periodo_nome }}<br>              
                </th>
            @endforeach
            <th class="title__green">
                NOTA FINAL<br>              
            </th>
        </tr>
    </thead>  
    <tbody>
    @foreach ($disciplinas as $disciplina)
        <tr>
            <th class="title__green">{{ $disciplina->disciplina_nome }}</th>
            
            @foreach ($diarios as $diario)
                <?php
                    $nota = isset($notas_por_disciplina_periodo[$disciplina->disciplina_id][$diario->periodo_id])
                            ? $notas_por_disciplina_periodo[$disciplina->disciplina_id][$diario->periodo_id]
                            : null;

                    $classe = 'cel__green';
                    if($nota) {
                        if($nota->vermelha) {
                            $classe = 'text__red';
                        } elseif($nota->valor_nota == $max_por_periodo[$diario->periodo_id]) {
                            $classe = 'text__blue';
                        }
                    }
                ?>
                <td class="{{ $classe }}">
                    {{ $nota ? $nota->valor_nota : '-' }}
                </td>
            @endforeach

            <?php
                $nota_final_val = null;
                foreach ($notas_finais as $nf) {
                    if ($nf['disciplina_id'] == $disciplina->disciplina_id) {
                        $nota_final_val = $nf;
                        break;
                    }
                }

                $classe_final = 'cel__green'; 
                if($nota_final_val) {
                    if($nota_final_val['vermelha']) {
                        $classe_final = 'text__red';
                    } elseif($nota_final_val['valor_nota'] == $max_nota_final) {
                        $classe_final = 'text__blue';
                    }
                }
            ?>
            <td class="{{ $classe_final }}">
                {{ $nota_final_val ? $nota_final_val['valor_nota'] : '-' }}
            </td>
        </tr>
    @endforeach
</tbody>

   </table>
   <div class="observacao__boletim mt-4">
    <div class="obs__icon">!</div>
    <div class="obs__text">
        <strong>Atenção:</strong>  
        Notas com média abaixo de <strong>70</strong> são exibidas em 
        <span class="text__red" style="font-weight: bold;">vermelho</span>.
    </div>
</div>
    </div>
    </div>
</div>
@endsection
