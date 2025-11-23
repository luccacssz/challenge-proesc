<?php

use App\Services\NotasFormatar;

class BoletimController extends BaseController {
 
    public function visualizarBoletim()
    {
        $dados_aluno = Pessoa::select('pessoas.nome as nome', 'turmas.id as turma_id', 'turmas.nome as turma_nome', 'turmas.criterio_avaliativo_id as criterio_avaliativo_id')
            ->join('matriculas', 'pessoas.id', '=', 'matriculas.pessoa_id')
            ->join('turmas', 'matriculas.turma_id', '=', 'turmas.id')
            ->where('matriculas.id', 1)
            ->first();

        $notas_periodos = Nota::select(
            'notas.nota as valor_nota',
            'avaliacoes.id as avaliacao_id',
            'diarios.id as diario_id',
            'disciplinas.id as disciplina_id',
            'disciplinas_bases.nome as disciplina_base_nome',
            'periodos.nome as periodo_nome',
            'periodos.id as periodo_id'
            )
            ->join('matriculas', 'notas.matricula_id', '=', 'matriculas.id')
            ->join('avaliacoes', 'notas.avaliacao_id', '=', 'avaliacoes.id')
            ->join('diarios', 'avaliacoes.diario_id', '=', 'diarios.id')
            ->join('periodos', 'diarios.periodo_id', '=', 'periodos.id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->join('disciplinas_bases', 'disciplinas.disciplina_base_id', '=', 'disciplinas_bases.id')
            ->where('matriculas.id', '=', 1)
            ->groupBy('notas.nota', 'avaliacoes.id', 'disciplinas_bases.nome', 'periodos.nome', 'periodos.id', 'diarios.id', 'disciplinas.id')
            ->orderBy('disciplinas_bases.nome')
            ->orderBy('periodos.nome')
            ->get();

        $disciplinas = Disciplina::select(
            'disciplinas.id as disciplina_id',
            'disciplinas_bases.nome as disciplina_nome',
            'pessoas.nome as docente_nome'
        )
        ->join('disciplinas_bases', 'disciplinas.disciplina_base_id', '=', 'disciplinas_bases.id')
        ->join('docentes', 'disciplinas.docente_id', '=', 'docentes.id')
        ->join('pessoas', 'docentes.pessoa_id', '=', 'pessoas.id')
        ->where('disciplinas.turma_id', '=', $dados_aluno->turma_id)
        ->get();

        $criterio_avaliativo = CriterioAvaliativo::find($dados_aluno->criterio_avaliativo_id);

        $diarios = Diario::select('diarios.id as diario_id', 'periodos.id as periodo_id', 'periodos.nome as periodo_nome')
            ->join('periodos', 'diarios.periodo_id', '=', 'periodos.id')
            ->where('diarios.turma_id', $dados_aluno->turma_id)
            ->get();

        $avaliacoes = Avaliacao::select(
            'avaliacoes.id as avaliacao_id', 'avaliacoes.nome as avaliacao_nome', 'avaliacoes.diario_id as diario_id', 'avaliacoes.disciplina_id as disciplina_id'
            )
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->where('disciplinas.turma_id', $dados_aluno->turma_id)
            ->get();
    
        $notas_formatar = new NotasFormatar();
        $notas_formatar->formataNotasPeriodos($notas_periodos, $criterio_avaliativo);
        $notas_finais = $notas_formatar->calculaNotaFinal($notas_periodos, $disciplinas, $criterio_avaliativo);
        $notas_por_disciplina_periodo = $notas_formatar->calculaNotasPorDisciplinaPeriodo($notas_periodos);
        $resultadoNotaMaxima = $notas_formatar->calculaNotaMaxima($notas_por_disciplina_periodo, $notas_finais, $disciplinas, $diarios);
        $notaMin = NotasFormatar::NOTA_MIN;
        $notaMax = NotasFormatar::NOTA_MAX;

        return View::make('relatorios.boletim')->with([
            'notas_periodos' => $notas_periodos,
            'notas_finais' => $notas_finais,
            'aluno' => $dados_aluno,
            'diarios' => $diarios,
            'avaliacoes' => $avaliacoes,
            'disciplinas' => $disciplinas,
            'notaMin' => $notaMin, 
            'notaMax' => $notaMax,
            'notas_por_disciplina_periodo' => $notas_por_disciplina_periodo,
            'max_por_periodo' => $resultadoNotaMaxima['max_por_periodo'],
            'max_nota_final' => $resultadoNotaMaxima['max_nota_final'],
        ]);

    }

}