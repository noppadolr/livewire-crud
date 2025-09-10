<?php

namespace App\Livewire\Projects;

use App\Services\ProjectService;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class FormModal extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:100')]
    public $name=null;

    #[Validate('required|string|max:255')]
    public $description=null;

    #[Validate('required|string')]
    public $deadline=null;

    #[Validate('required|string')]
    public $status='pending';

    #[Validate('nullable|image|max:5120')]
    public $project_logo=null;

    public $projectId = null;
    public $isView = false;
    public $existingImage=null;



    public function saveProject(ProjectService $projectService)
    {
        $validatedProjectRequest= $this->validate();
        if ($this->projectId){
            $projectService->updateProject($this->projectId,$validatedProjectRequest);
        }else {
            $projectService->saveProject($validatedProjectRequest);
        }
        $this->reset();
        $this->dispatch('reload');
        $this->dispatch('flash',[
            'type'=>'success',
            'message'=>'Project has been saved successfully.'
        ]);
        Flux::modal('project-modal')->close();
    }

    /**
     * clear form
     */

    public function resetForm():void
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->deadline=null;
        $this->project_logo=null;
        $this->name=null;
        $this->description=null;
        $this->status='pending';
    }

    #[On('open-project-modal')]
    public function projectDetail($mode,$project)
    {
         $this->isView=$mode === 'view';
        if ($mode === 'create') {
            $this->isView=false;
            $this->resetForm();
        }else
        {
//            dd($project);
            $this->name=$project['name'];
            $this->description=$project['description'];
            $this->status=$project['status'];
            $this->deadline=$project['deadline'];
            $this->projectId=$project['id'];
            $this->existingImage=$project['project_logo'];


        }
    }
    public function render()
    {
        return view('livewire.projects.form-modal');
    }
}
