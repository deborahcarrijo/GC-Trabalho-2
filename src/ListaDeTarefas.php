<?php

namespace App;
class ListaDeTarefas
{
    private $tarefas = [];

    public function adicionarTarefa($tarefa)
    {
        if (empty($tarefa)) {
            throw new InvalidArgumentException('A tarefa não pode ser vazia.');
        }
        $this->tarefas[] = $tarefa;
    }

    public function removerTarefa($tarefa)
    {
        $key = array_search($tarefa, $this->tarefas);
        if ($key === false) {
            throw new InvalidArgumentException('Tarefa não encontrada.');
        }
        unset($this->tarefas[$key]);
        $this->tarefas = array_values($this->tarefas); // Reindexar array
    }

    public function obterTarefas()
    {
        return $this->tarefas;
    }
}
