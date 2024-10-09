<div>
    <flux:modal.trigger name="edit-profile">
        <flux:button>Create</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-profile" variant="flyout" class="space-y-6">
        <div>
            <flux:heading size="lg">Create Department</flux:heading>
            <flux:subheading>Create a new department</flux:subheading>
        </div>

        <flux:input wire:model="name" type="text" label="Name" placeholder="Department" />

        <div class="flex">
            <flux:spacer />

            <flux:button wire:click="save" type="submit" variant="primary">Save</flux:button>
        </div>
    </flux:modal>
</div>
