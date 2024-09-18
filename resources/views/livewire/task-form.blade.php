<form wire:submit.prevent="saveTask">
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" wire:model="title">
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" wire:model="description"></textarea>
    </div>

    <div>
        <label for="status">Status</label>
        <select wire:model="status">
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    <div>
        <label for="due_date">Due Date</label>
        <input type="date" id="due_date" wire:model="due_date">
    </div>

    <button type="submit">Save Task</button>
</form>
