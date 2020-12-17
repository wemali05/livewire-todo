<?php

namespace App\Http\Livewire\Todo;

use DB;
use Log;
use Exception;
use Livewire\Component;
use App\Models\TodoModel;
use App\Http\Requests\TodoFormRequest;

class FormComponent extends Component
{
    public $submit_btn_title = "Save Task";
    public $form = [
        "todo_id" => null,
        "title" => "",
        "desc" => "",
        "status" => "",
    ];

    public $listeners = [
        "edit" => "edit"
    ];

    public function mount()
    {
    }
    
    public function edit($todo_id)
    {
        try {
            $this->submit_btn_title = "Update Task";
            $todo = TodoModel::find($todo_id);
            $this->form = $todo->toArray();
        } catch (Exception $ex) {
        }
    }

    public function save()
    {
        $form = new TodoFormRequest();
        $form->merge($this->form);
        $validated_data = $form->validate($form->rules());
        
        DB::beginTransaction();
        try {
            $query = [
                "title" => $validated_data["title"],
                "desc" => $validated_data["desc"],
                "status" => $validated_data["status"],
            ];

            $condition = [
                "todo_id" => $validated_data["todo_id"]
            ];

            $info["todo"] = TodoModel::updateOrCreate($condition, $query);
            
            DB::commit();
            $info['success'] = true;
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = false;
        }


        if ($info["success"]) {
            $type = "success";
            if ($info["todo"]->wasRecentlyCreated) {
                $message = "New Task created successfully.";
            } else {
                $message = "Task updated successfully.";
            }

            $this->submit_btn_title = "Save Task";
        } else {
            $type = "error";
            $message = "Something went wrong while saving task.";
        }

        $this->emitTo('todo.todo-notification-component', 'flash_message', $type, $message);

        $this->emitTo('todo.list-component', 'load_list');
    }

    public function render()
    {
        return view('livewire.todo.create_form');
    }
}
