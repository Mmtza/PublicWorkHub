@props(['disabled' => false])

<div {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
</div>
<input type="hidden" name="deskripsi_diri_content" id="deskripsi_diri_content" autofocus autocomplete="deskripsi_diri_content" value="{{ auth()->user()->deskripsi_diri }}">