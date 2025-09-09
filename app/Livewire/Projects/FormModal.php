<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\Attributes\Validate;

class FormModal extends Component
{
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


    /**
     * @return void
     */
    public function saveProject()
    {
        $validatedProjectRequest= $this->validate();
    }

    /**
     * clear form
     */

    public function resetForm():void
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.projects.form-modal');
    }
}
