 # Soluções do Desafio Técnico

Este documento contém as soluções para os desafios propostos, incluindo SQL, PHP (Controller, Service e Command), e ajustes de layout para boletins.

- - -

## Sumário

*   [1\. Banco de Dados - Relatório Financeiro](#desafio1)
*   [2\. Ajuste de Boletim - Cálculo de Nota Final com Peso nos Bimestres](#desafio2)
*   [3\. Novo Requisito - Tipo de Arredondamento](#desafio3)
*   [4\. Ajuste de Boletim - Layout e Notas Vermelhas](#desafio4)
*   [5\. Problema “Erro ao Adicionar Pessoa”](#desafio5)

- - -

## 1\. Banco de Dados - Relatório Financeiro

**Descrição:** Relatório com nomes e telefones das pessoas que não pagaram a mensalidade, quantidade de parcelas não pagas e valor total não pago por pessoa.

**Requisitos:** SQL

**Arquivos Alterados:** Nenhum (consulta SQL diretamente no banco)

**Solução:**

```
SELECT 
    pessoas.nome, 
    pessoas.telefone, 
    COUNT(parcelas.debito_id) AS total_parcelas, 
    SUM(parcelas.valor) AS valor_nao_pago
FROM pessoas
INNER JOIN debitos ON debitos.pessoa_id = pessoas.id
INNER JOIN parcelas ON parcelas.debito_id = debitos.id
WHERE parcelas.pago = false
GROUP BY pessoas.nome, pessoas.telefone
ORDER BY pessoas.nome;
```

- - -

## 2\. Ajuste de Boletim - Cálculo de Nota Final com Peso nos Bimestres

**Descrição:** Cálculo de nota anual com pesos diferentes:

*   1º e 2º bimestre: peso 1
*   3º e 4º bimestre: peso 2

Fórmula: (1bim + 2bim + (3bim\*2) + (4bim\*2)) / 6

**Requisitos:** PHP

**Arquivos Alterados:** NotasFormatar.php (Service), BoletimController.php (Controller)

**Funções Criadas/Alteradas:**

*   formataNotasPeriodos($notas, $criterio\_avaliativo)
*   calculaNotaFinal($notas, $disciplinas, $criterio\_avaliativo)
*   calculo3($array\_notas, $arredondamento\_id)
*   arredondaNota($nota, $arredondamento\_id)
*   calculaNotasPorDisciplinaPeriodo($notas\_periodos)
*   calculaNotaMaxima($notas\_por\_disciplina\_periodo, $notas\_finais, $disciplinas, $diarios)

**Trecho representativo do Service:**

```
$media = ($disciplina['notas'][1] + $disciplina['notas'][2] +
          ($disciplina['notas'][3]*2) + ($disciplina['notas'][4]*2)) / 6;
$disciplina['valor_nota'] = $this->arredondaNota($media, $arredondamento_id);
```

**Trecho representativo do Controller:**

```
$notas_finais = $notas_formatar->calculaNotaFinal($notas_periodos, $disciplinas, $criterio_avaliativo);
$notas_por_disciplina_periodo = $notas_formatar->calculaNotasPorDisciplinaPeriodo($notas_periodos);
$resultadoNotaMaxima = $notas_formatar->calculaNotaMaxima(
    $notas_por_disciplina_periodo, $notas_finais, $disciplinas, $diarios
);
```

- - -

## 3\. Novo Requisito - Tipo de Arredondamento

**Descrição:** Implementar arredondamento: frações >= 0,7 arredondam para o número inteiro mais próximo.

**Requisitos:** PHP

**Arquivos Alterados:** NotasFormatar.php (Service)

**Funções Criadas/Alteradas:**

*   arredondamento3($valor\_nota)
*   arredondaNota($nota, $arredondamento\_id)

**Trecho representativo:**

```
protected function arredondamento3($valor_nota)
{
    $parte_inteira = floor($valor_nota);
    $parte_decimal = $valor_nota - $parte_inteira;

    return $parte_decimal >= 0.7 ? $parte_inteira + 1 : $parte_inteira;
}
```

- - -

## 4\. Ajuste de Boletim - Layout e Notas Vermelhas

**Descrição:** Ajuste do boletim para incluir informações adicionais e destacar notas vermelhas. Exibição de nota mínima e máxima por período e no cálculo final.

**Requisitos:** PHP, HTML, CSS (opcional JS)

**Arquivos Alterados:** NotasFormatar.php (Service), BoletimController.php (Controller), relatorios/boletim.blade.php (View)

**Trechos representativos:**

```
foreach ($notas_finais as &$nf) {
    $nf['vermelha'] = $nf['valor_nota'] < self::NOTA_MIN;
    $nf['nota_min'] = self::NOTA_MIN;
    $nf['nota_max'] = self::NOTA_MAX;
}
```

```
<tr class="{{ $nota->vermelha ? 'nota-vermelha' : '' }}">
    <td>{{ $aluno->nome }}</td>
    <td>{{ $nota->valor_nota }}</td>
</tr>

<style>
.nota-vermelha { color: red; font-weight: bold; }
</style>
```

- - -

## 5\. Problema “Erro ao Adicionar Pessoa”

**Descrição:**

*   Situação I: erro ao adicionar pessoa via formulário
*   Situação II: importação de pessoas diretamente no banco via CSV

**Requisitos:** PHP, SQL ou Script

**Arquivos Alterados/Criados:** PessoasController.php (Controller), ImportPessoas.php (Command Artisan), CSV: storage/people\_import.csv

**Funções Criadas/Alteradas:**

*   Controller: visualizarFormulario(), cadastrarPessoa()
*   Command: fire() → importa CSV

**Trecho representativo do Controller:**

```
Pessoa::create([
    'nome'     => Input::get('nome'),
    'email'    => Input::get('email'),
    'cpf'      => Input::get('cpf'),
    'telefone' => Input::get('telefone'),
    'grupo_id' => Input::get('grupo_id')
]);
```

**Trecho representativo do Command:**

```
Pessoa::firstOrCreate(
    ['email' => $data['EMAIL']],
    [
        'nome'     => trim($data['NOME']),
        'cpf'      => preg_replace('/\D/', '', $data['CPF']),
        'telefone' => preg_replace('/\D/', '', $data['TELEFONE']),
        'grupo_id' => trim($data['GRUPO']),
    ]
);
```