 # Soluções do Desafio Técnico

Este repositório contém as soluções para os desafios propostos, incluindo SQL, PHP (Controller, Service e Command), e ajustes de layout para boletins.

## 🚀 Como Rodar o Projeto com Docker

Para iniciar a aplicação e o banco de dados utilizando Docker, siga os passos abaixo no diretório raiz do projeto onde está o arquivo `docker-compose.yml`:

1.  **Clonar o projeto**
    ```bash
       git clone git@github.com:luccacssz/challenge-proesc.git
       cd challenge-proesc
       cp .env.example .env
            
    ```
2.  **O arquivo .env.local.php, precisa estar com as mesmas credenciais do banco de dados que estao no .env, essas informacoes serao usadas no docker-compose.yml**
 
3.  **Construa e inicie os contêineres:**
    ```bash
    docker-compose up -d
    docker compose exec -it php56 bash     
    composer install    
    cd /var/www/html
    chmod -R 777 app/storage        
    ```
4.  **Rode as migrations:**
    ```bash
    php artisan migrate

5.  **Rode as seeds:**
    ```bash
    php artisan db:seed  
  
6.  **Acessar a Aplicação:**
    Após a execução do comando, abra seu navegador e acesse:
    [http://localhost:8000](http://localhost:8000)


7.  **Executar Comandos (Ex: Artisan, Composer):**
    Para rodar comandos dentro do contêiner da aplicação (PHP), entre no container
    ```bash 
    docker compose exec -it php56 bash 

8.  **Parar e Remover os Contêineres:**
    Quando terminar, você pode parar e remover os contêineres, redes e volumes (exceto o volume de dados `pgdata`, a menos que você adicione a flag `-v`):
    ```bash
    docker-compose down
    ```

-------


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


**Migration Criada para inserir novo calculo e atualizar os criterios avaliativos:**

*  2025_11_23_141539_update_criterios_avaliativos_table

**Trecho representativo do Service:**

```
$media = ($disciplina['notas'][1] + $disciplina['notas'][2] +
          ($disciplina['notas'][3]*2) + ($disciplina['notas'][4]*2)) / 6;
$disciplina['valor_nota'] = $this->arredondaNota($media, $arredondamento_id);
```

**Trecho representativo do Controller:**

```
$notas_finais = $notas_formatar->calculaNotaFinal($notas_periodos, $disciplinas, $criterio_avaliativo);

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

**Funções Criadas/Alteradas:**

*   calculaNotasPorDisciplinaPeriodo($notas\_periodos)
*   calculaNotaMaxima($notas\_por\_disciplina\_periodo, $notas\_finais, $disciplinas, $diarios)


**Trechos representativos:**

```
foreach ($notas_finais as &$nf) {
    $nf['vermelha'] = $nf['valor_nota'] < self::NOTA_MIN;
    $nf['nota_min'] = self::NOTA_MIN;
    $nf['nota_max'] = self::NOTA_MAX;
}
```


<img width="1507" height="688" alt="Screenshot from 2025-11-24 12-43-30" src="https://github.com/user-attachments/assets/efe66b75-fb6e-48f4-aa7b-dff7c0da4fdd" />

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
    'nome'     => mb_strtoupper(Input::get('nome'), 'UTF-8'),
    'email'    => Input::get('email'),
    'cpf'      => Input::get('cpf'),
    'telefone' => Input::get('telefone'),
    'grupo_id' => Input::get('grupo_id')
  ]);
```

**Trecho representativo do Command:**

```
  Pessoa::create([
   'email'     => $email,
   'nome'      => mb_strtoupper($nome, 'UTF-8'),
   'cpf'       => $cpf,
   'telefone'  => $telefone,
   'grupo_id'  => $grupo_id,
  ]);
        
```

**Para importar o arquivo disponibilizado no drive rodar o comando abaixo:**

```
  php artisan import:pessoas
  ou pelo docker
  docker exec php56 php artisan import:pessoas
```

<img width="1226" height="634" alt="Screenshot from 2025-11-24 12-43-15" src="https://github.com/user-attachments/assets/6ab5cca5-0f8b-45f0-8ae2-047c64932a41" />

<img width="1107" height="500" alt="Screenshot from 2025-11-24 12-48-04" src="https://github.com/user-attachments/assets/e92da6e7-8f96-4e9a-94ba-02bab8df5a05" />

