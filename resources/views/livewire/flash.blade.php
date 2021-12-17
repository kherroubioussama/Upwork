<div x-data="{open : false}" @flash-message.window="open = true; setTimeout(()=>open=false,7000);" x-cloak>
    <div x-show="open"   class="border {{ $type ? $styleByType[$type] : '' }} px-4 py-2 rounded">
        {{$message}}
    </div>
</div>
