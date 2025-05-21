<form action="{{ route('aduans.index') }}" method="GET" class="mb-4">
    <div class="flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari aduan..." class="border p-2 rounded w-full">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
    </div>
</form>
