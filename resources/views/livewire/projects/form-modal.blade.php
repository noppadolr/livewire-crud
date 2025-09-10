
    <flux:modal name="project-modal" class="md:w-[32rem]" @close="resetForm()" @cancel="resetForm()">
        <form class="space-y-3" wire:submit="saveProject()">
            <div>
                <flux:heading size="lg">
                {{ $isView ? 'Project Detail' : ($projectId ? 'Update ' : 'Create ').' Project' }}
{{--                    {{ !$isView ? 'Project' : '' }}--}}
                </flux:heading>
                <flux:text class="mt-2">Add a new project using the form below.</flux:text>
            </div>


            {{-- project anme --}}
            <div class="form-group">
                <flux:input :disabled="$isView" wire:model="name" label="Project Name" placeholder="Enter Project name" />
            </div>

            {{-- Description --}}
            <div class="form-group">
                <flux:textarea :disabled="$isView" wire:model="description" label="Description"  placeholder="Short Project Description" rows="3"/>
            </div>

            {{-- Deadline --}}
            <div class="form-group">
                <flux:input :disabled="$isView" wire:model="deadline" label="Dead line" type="date"  />
            </div>

            {{-- Status --}}
            <div class="form-group">
            <flux:select :disabled="$isView" wire:model="status" label="Status" placeholder="Select Status...">
                <flux:select.option value="pending">Pending</flux:select.option>
                <flux:select.option value="in-progress">In-Progress</flux:select.option>
                <flux:select.option value="completed">Completed</flux:select.option>
                <flux:select.option value="cancelled">Cancelled</flux:select.option>

            </flux:select>
            </div>

            {{--project logo --}}
            <div class="form-group">
                @if(!$isView)
                <flux:input :disabled="$isView" wire:model="project_logo" label="Project Logo" type="file" accept="image/*" class="cursor-pointer" />
                @endif

                @if($project_logo && !$errors->has('$project_logo'))
                        <img src="{{$project_logo->temporaryUrl()}}" class="w-32 h-32 mt-2 rounded-b-lg mx-3" alt="image">

                    @elseif($projectId && $existingImage)

                        <img src="{{asset(Storage::url($existingImage))}}" class="w-32 h-32 mt-2 rounded-b-lg mx-3" alt="image">
                @endif
            </div>



            {{--Button--}}
            <div class="flex justify-end pt-4">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost" class="cursor-pointer " >Cancel</flux:button>
                </flux:modal.close>
                @if(!$isView)
                <flux:button type="submit" variant="primary" color="indigo" class="cursor-pointer ms-2">
                    {{ $projectId  ? 'Update' : 'Save' }}
{{--                    Save Project--}}
                </flux:button>
                @endif
            </div>

        </form>
    </flux:modal>

