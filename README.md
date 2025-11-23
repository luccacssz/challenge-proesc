# Processo seletivo - Proesc

Olá, bem vindo(a) ao processo seletivo do Proesc.com! 

Este desafio técnico é uma atividade prática, onde avaliaremos seus conhecimentos de lógica de programação, banco de dados e html, assuntos que precisará utilizar diariamente para a função analista de suporte n3 no Proesc.

- Linguagens: PHP **5.6**
- Framework: Laravel
- Banco de dados: Postgres

# Relatório de Chamado: Amiguinhos do Saber

A instituição Amiguinhos do Saber abriu um chamado reportando alguns problemas. Veja a seguir.

## Ticket de Suporte: Solicitações de Ajustes e Tarefas Técnicas

Prezada equipe de suporte,

Estou entrando em contato para solicitar uma série de ajustes e tarefas técnicas relacionadas ao nosso sistema. Abaixo, detalho cada uma das solicitações esperando que possam ser atendidas com a máxima eficiência e qualidade.

### 1. Banco de Dados - Relatório Financeiro

**Descrição:** Precisamos de um relatório que traga todos os nomes e números de telefone das pessoas que não pagaram a mensalidade. Além disso, é necessário incluir a quantidade de parcelas não pagas e o valor somado total não pago por pessoa. Essa informação é vital para nossa equipe financeira iniciar o processo de cobrança efetiva.

 **Requisitos**
- Utilize SQL.

**Entregável**
- Consulta SQL que retorne como resultado o que foi pedido acima.

### 2. Ajuste de Boletim - Cálculo de Nota Final com Peso nos Bimestres

**Descrição:** Solicito a revisão do cálculo das notas anuais dos alunos. As notas devem ser calculadas da seguinte forma: soma das notas do 1º e 2º bimestres mais o dobro das notas do 3º e 4º bimestres, dividido por 6. A fórmula seria: (1bim + 2bim + (3bim * 2) + (4bim * 2)) / 6. Esse ajuste reflete melhor o peso acadêmico de cada bimestre em nosso currículo.

 **Requisitos**
- Código PHP.

**Entregável**
- Lógica em código PHP como resultado da solicitação acima.

### 3. Novo Requisito - Tipo de Arredondamento

**Descrição:** Implementar um sistema de arredondamento para as notas finais, onde frações iguais ou superiores a 0,7 serão arredondadas para o número inteiro mais próximo. Por exemplo, uma nota final de 55,7 deve ser arredondada para 56.

 **Requisitos**
- Código PHP.

**Entregável**
- Lógica em código PHP como resultado da solicitação acima.

### 4. Ajuste de Boletim - Layout e Notas Vermelhas

**Descrição:** É necessário ajustar o layout do boletim para incluir informações adicionais do aluno e uma funcionalidade que destaque notas vermelhas. Precisamos que seja exibido no boletim a nota máxima e mínima em cada período e no cálculo final, sendo respectivamente: 70 e 100. Com isso, queremos automatizar a definição de notas vermelhas para facilitar a visualização de desempenhos abaixo do esperado.

 **Requisitos**
- Necessário cumprir as tarefas 2 e 3 para cumprir esta demanda.
- Código PHP, HTML, CSS (opcional javascript).

**Entregável**
- Lógica em código PHP, HTML, CSS (opcional javascript) como resultado da solicitação acima.

### 5. Problema “Erro ao Adicionar Pessoa”

**Situação I:** Ao tentar adicionar uma nova pessoa através do formulário em nosso sistema, um erro é retornado devido a um CPF inválido. Não sei por que isso está acontecendo, mas espero que você possa resolver.

**Situação II:** Devido ao atraso causado por esse problema, precisamos de uma solução imediata para adicionar pessoas diretamente no banco de dados. Uma lista de pessoas será compartilhada através do drive para inclusão manual. [Link do drive](https://docs.google.com/spreadsheets/d/1MB8xHwLek8PLgcOfBiyxWhk6ZplomVrSXtdtvEZjiXY/edit?usp=sharing).

 **Requisitos**
- Código PHP, SCRIPT ou SQL.

**Entregável**
- Lógica em código PHP, SCRIPT ou SQL como resultado da solicitação acima.

Cada uma dessas solicitações é crucial para a operação contínua e a eficiência de nossos processos internos. Agradeço antecipadamente a atenção e a rapidez na resolução desses itens. Por favor, mantenham-me informado sobre o progresso de cada tarefa.

### Como executar 

Para iniciá-lo, siga os passos abaixo:

1 -  Clone o projeto para o seu computador:
```bash
$ git clone https://github.com/v-gama/processo_seletivo.git
```

2 - Entre na pasta do projeto
```bash
$ cd processo_seletivo
```
3 - Instale as depêndencias

```bash
$ sudo add-apt-repository ppa:ondrej/php
```

```bash
$ sudo apt install php5.6 -y
```

```bash
$ curl -sS https://getcomposer.org/installer | php
```

```bash
$ composer install
```

4 - Crie o arquivo arquivo .env.local.php copiando o arquivo [.env.local.example.php](.env.local.example.php) e configure com as informações do seu banco local

5 - Rode as migrations
```bash
$ php artisan migrate
```
6 - Rode o seeder
```bash
$ php artisan db:seed
```
7 - Inicie o projeto:
```bash
$ php artisan serve
```


## Entrega
Para entregar sua solução, baixe este projeto e resolva as solicitações propostas.

Assim que finalizar, suba a sua solução para o github e nos envie o link do seu repositório respondendo o e-mail recebido.

Em caso de dúvida, não hesite em nos contatar através do e-mail recebido ou para victorgama@proesc.com :]
# challenge-proesc
