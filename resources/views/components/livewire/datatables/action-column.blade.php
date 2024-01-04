<div>
    <button class="p-2 rounded-xl bg-yellow-800/20 text-yellow-500 hover:bg-yellow-900/30" wire:click="edit({{ $row->id }})">Edit</button>
    <button class="p-2 mt-2 rounded-xl bg-red-800/20 text-red-500 hover:bg-red-900/30" wire:click="delete({{ $row->id }})">Delete</button>
</div>