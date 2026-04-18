{{-- @props(['title' => 'Modal', 'name'])

<div x-data="{ show: false }" x-cloak @keydown.escape.window="show = false"
    @open-modal.window="
    show = $event.detail === '{{ $name }}'">
    <!-- Overlay -->
    <div x-show="show" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <!-- Modal -->
        <div class="bg-white text-black p-6 rounded-xl shadow-xl w-96" @click.outside="show = false"
            x-transition:scale.90>
            <!-- Header -->
            <h2 class="text-lg font-bold mb-4">
                {{ $title }}
            </h2>

            <!-- Body -->
            <div>
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="mt-4 flex justify-end">
                <button class="btn btn-primary" @click="show = false">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('open-modal', e => {
        console.log('EVENT FIRED', e.detail);
    });
</script> --}}

<div x-data="{ show: false }" x-cloak @open-modal.window="show = ($event.detail === 'create-idea')"
    @keydown.escape.window="show = false">
    <div x-show="show" class="fixed inset-0 bg-black/60 flex items-center justify-center">
        <div class="bg-white p-6 rounded">
            <p>Modal Works</p>

            <button @click="show = false">Close</button>
        </div>
    </div>
</div>
