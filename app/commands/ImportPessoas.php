<?php

use Illuminate\Console\Command;

class ImportPessoas extends Command
{
    protected $name = 'import:pessoas';
    protected $description = 'Importa pessoas a partir do CSV people_import.csv';

    public function fire()
    {
        $path = storage_path('people_import.csv');

        if (!file_exists($path)) {
            $this->error("Arquivo CSV não encontrado em: " . $path);
            return;
        }

        $this->info("Iniciando importação do arquivo: " . $path);

        if (($handle = fopen($path, 'r')) !== false) {

            $header = fgetcsv($handle);

            while (($row = fgetcsv($handle, 2000, ',')) !== false) {

                if (!$row || count($row) < 5) {
                    continue;
                }

                $data = array_combine($header, $row);

                $nome     = trim($data['NOME']);
                $email    = trim($data['EMAIL']);
                $cpf      = preg_replace('/\D/', '', $data['CPF']);
                $telefone = preg_replace('/\D/', '', $data['TELEFONE']);
                $grupo_id = trim($data['GRUPO']); 

                if ($nome === '' || $email === '') {
                    $this->error("Linha ignorada por falta de nome/email");
                    continue;
                }
                
                Pessoa::firstOrCreate(
                    ['email' => $email],
                    [
                        'nome'      => $nome,
                        'cpf'       => $cpf,
                        'telefone'  => $telefone,
                        'grupo_id'  => $grupo_id,
                    ]
                );
            }

            fclose($handle);
            $this->info("Importação concluída com sucesso!");
        }
    }
}
