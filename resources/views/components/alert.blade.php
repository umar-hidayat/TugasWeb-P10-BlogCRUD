@props(['type' => 'info', 'message' => ''])

<div class="alert alert-{{ $type }} bg-dark border border-{{ $type }} text-{{ $type }} alert-dismissible fade show font-mono" role="alert">
    <i class="bi bi-info-circle-fill me-2"></i> {{ $message }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
</div>