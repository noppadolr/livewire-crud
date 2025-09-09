<form>
    <flux:modal name="project-modal" class="md:w-[32rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Project</flux:heading>
                <flux:text class="mt-2">Add a new project using the form below.</flux:text>
            </div>


            {{-- project anme --}}
            <div class="form-group">
                <flux:input label="Project Name" placeholder="Enter Project name" />
            </div>

            {{-- Description --}}
            <div class="form-group">
                <flux:textarea label="Description"  placeholder="Short Project Description" rows="3"/>
            </div>

            {{-- Deadline --}}
            <div class="form-group">
                <flux:input label="Dead line" type="date"  />
            </div>

            {{-- Status --}}
            <div class="form-group">
            <flux:select wire:model="status" placeholder="Select Status...">
                <flux:select.option value="pending">Pending</flux:select.option>
                <flux:select.option value="in-progress">In-Progress</flux:select.option>
                <flux:select.option value="completed">Completed</flux:select.option>
                <flux:select.option value="cancelled">Cancelled</flux:select.option>

            </flux:select>
            </div>

            {{--project logo --}}
            <div class="form-group">
                <flux:input label="Project Logo" type="file" accept="image/*" class="cursor-pointer" />
            </div>


            {{--Button--}}
            <div class="flex justify-end pt-4">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost" class="cursor-pointer " >Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="primary" color="indigo" class="cursor-pointer ms-2">Save Project</flux:button>
            </div>

        </div>
    </flux:modal>
</form>
