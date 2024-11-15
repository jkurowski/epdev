@props([
    'tabs' => [
        ['id' => 'tab1', 'label' => 'Tab 1', 'content' => 'Content for Tab 1'],
        ['id' => 'tab2', 'label' => 'Tab 2', 'content' => 'Content for Tab 2'],
        ['id' => 'tab3', 'label' => 'Tab 3', 'content' => 'Content for Tab 3'],
    ]
])

<div class="tabs-component">
    <!-- Zakładki (nav-tabs) -->
    <ul class="nav nav-tabs" id="customTabs" role="tablist">
        @foreach($tabs as $index => $tab)
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                    id="{{ $tab['id'] }}-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#{{ $tab['id'] }}" 
                    type="button" 
                    role="tab" 
                    aria-controls="{{ $tab['id'] }}" 
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    {{ $tab['label'] }}
                </button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content mt-3" id="customTabsContent">
        @foreach($tabs as $index => $tab)
            <div 
                class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                id="{{ $tab['id'] }}" 
                role="tabpanel" 
                aria-labelledby="{{ $tab['id'] }}-tab">
                {{ $tab['content'] }}
            </div>
        @endforeach
    </div>
</div>
