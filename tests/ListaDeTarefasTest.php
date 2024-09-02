<?php

namespace Tests;

use App\ListaDeTarefas;
use PHPUnit\Framework\TestCase;

class ListaDeTarefasTest extends TestCase
{
    private $listaDeTarefas;

    protected function setUp(): void
    {
        $this->listaDeTarefas = new ListaDeTarefas();
    }

    public function testAdicionarTarefa()
    {
        $this->listaDeTarefas->adicionarTarefa('Tarefa 1');
        $this->assertCount(1, $this->listaDeTarefas->obterTarefas());
        $this->assertEquals('Tarefa 1', $this->listaDeTarefas->obterTarefas()[0]);
    }

    public function testAdicionarTarefaVazia()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('A tarefa não pode ser vazia.');
        $this->listaDeTarefas->adicionarTarefa('');
    }

    public function testRemoverTarefa()
    {
        $this->listaDeTarefas->adicionarTarefa('Tarefa 1');
        $this->listaDeTarefas->removerTarefa('Tarefa 1');
        $this->assertCount(0, $this->listaDeTarefas->obterTarefas());
    }

    public function testRemoverTarefaInexistente()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Tarefa não encontrada.');
        $this->listaDeTarefas->removerTarefa('Tarefa Inexistente');
    }

    public function testObterTarefas()
    {
        $this->listaDeTarefas->adicionarTarefa('Tarefa 1');
        $this->listaDeTarefas->adicionarTarefa('Tarefa 2');
        $tarefas = $this->listaDeTarefas->obterTarefas();
        $this->assertCount(2, $tarefas);
        $this->assertEquals('Tarefa 1', $tarefas[0]);
        $this->assertEquals('Tarefa 2', $tarefas[1]);
    }
}
