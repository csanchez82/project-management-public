@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => ' text-red-600 dark:text-red-400']) }}>{{ $message }}</p>
@enderror
