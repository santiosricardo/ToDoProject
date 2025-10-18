<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
   //ok
    public function index()
    {
        $tasks = Task::all();

        return response([
            'tasks' => $tasks
        ]);
    }

    //ok
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' =>[ Rule::in(Task::STATUS)]]);

            if (!isset($validated['status'])) {
        $validated['status'] = Task::STATUS_PENDENTE;
    }
          $task = Task::create($validated);
          
          return response()->json([
        'mensagem' => 'Tarefa criada com sucesso',
          ], 201);

    }

    //ok
    public function show(string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['mensagem' => 'Task não encontrada'], 404);
        }

        return response()->json([
            'mensagem' => 'Task Localizada',
            'Task' => $task
        ], 200);
    
    }

    //ok
    public function update(Request $request, string $id)
    {
        
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['mensagem' => 'Task não encontrada'], 404);
        }

        $validated = $request->validate([
            'title' => 'string|max:255',
            'status' => [Rule::in(Task::STATUS)]
        ]);

        $task->update($validated);

        return response()->json([
            'mensagem' => 'Task atualizada com sucesso',
            'dados' => $task
        ], 200);
    }

//ok
    public function destroy(string $id)
    {
        
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['mensagem' => 'Task não encontrada'], 404);
        }

        $task->delete();

        return response()->json([
            'mensagem' => 'Task deletada com sucesso'
        ], 200);
    }
    
}
