<div>
    <flux:modal.trigger name="showCreateModal">
        <flux:button>Create</flux:button>
    </flux:modal.trigger>

    <flux:modal name="showCreateModal" variant="flyout" class="space-y-6">
        <form wire:submit="save">
        <div>
            <flux:heading size="lg">{{ $departmentId ? 'Edit Department' : 'Add New Department' }}</flux:heading>
            <flux:subheading>{{ $departmentId ? 'Subheading Edit Department' : 'Subheading Add New Department' }}</flux:subheading>
        </div>

        <flux:input wire:model="name" type="text" label="Name" placeholder="Department" />

        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary">Save</flux:button>
        </div>
            </form>
    </flux:modal>
</div>
