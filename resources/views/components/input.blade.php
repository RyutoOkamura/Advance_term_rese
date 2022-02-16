@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'shadow-sm border-gray-300 border-bottom-only focus:border-indigo-300  focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
