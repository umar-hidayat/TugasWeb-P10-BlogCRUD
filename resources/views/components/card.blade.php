@props(['title' => ''])

<div class="card card-custom mb-3 shadow-sm">
    @if ($title)
        <div class="card-header bg-transparent border-bottom border-secondary-subtle font-mono text-info fw-semibold d-flex align-items-center">
            <i class="bi bi-terminal me-2"></i> {{ $title }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>