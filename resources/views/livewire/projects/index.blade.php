<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Project Management') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create and manage your projects') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Button section --}}
    <div class="mb-4">
        <flux:modal.trigger name="project-modal">
{{--            <flux:button>Edit profile</flux:button>--}}
            <flux:button variant="primary" color="indigo" icon="plus-circle" class="cursor-pointer">Add Project</flux:button>
        </flux:modal.trigger>

    </div>

    {{-- Modal section --}}
    <livewire:projects.form-modal/>


</div>
