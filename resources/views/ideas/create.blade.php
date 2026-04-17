<h3>Create your idea</h3>

<form action="/ideas/create" method="POST" class="flex flex-col gap-3">
    @csrf

    <input name="title" type="text" class="input input-bordered" placeholder="Title" required />

    <textarea name="description" class="textarea textarea-bordered" placeholder="Description" required></textarea>

    <button type="submit" class="btn btn-primary">
        Submit
    </button>
</form>
