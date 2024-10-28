@props(['message'])

@if ($message)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $message }}
    </div>
@endif
