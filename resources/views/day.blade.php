<style>
    /* Default styles */
.flex-1 {
  flex: 1;
}

.h-40 {
  height: 10rem;
}

.lg\\:h-48 {
  height: 12rem;
}

.border {
  border-width: 1px;
}

.border-gray-200 {
  border-color: #edf2f7;
}

.-mt-px {
  margin-top: -1px;
}

.-ml-px {
  margin-left: -1px;
}

.min-width {
  min-width: 10rem;
}

/* Responsive styles */
@media (min-width: 1024px) {
  .h-40 {
    height: 12rem;
  }
}

@media (min-width: 1024px) {
  .lg\\:h-48 {
    height: 14rem;
  }
}

/* Other classes */
.w-full {
  width: 100%;
}

.h-full {
  height: 100%;
}

.bg-yellow-100 {
  background-color: #fefcbf;
}

.bg-white {
  background-color: #ffffff;
}

.bg-gray-100 {
  background-color: #f3f4f6;
}

.flex {
  display: flex;
}

.flex-col {
  flex-direction: column;
}

.items-center {
  align-items: center;
}

.p-2 {
  padding: 0.5rem;
}

.text-sm {
  font-size: 0.875rem;
}

.font-medium {
  font-weight: 500;
}

.text-xs {
  font-size: 0.75rem;
}

.text-gray-600 {
  color: #6b7280;
}

.my-2 {
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
}

.overflow-y-auto {
  overflow-y: auto;
}

.grid {
  display: grid;
}

.grid-cols-1 {
  grid-template-columns: repeat(1, minmax(0, 1fr));
}

.grid-flow-row {
  grid-auto-flow: row;
}

.gap-2 {
  gap: 0.5rem;
}

.draggable {
  -webkit-user-drag: element;
  -khtml-user-drag: element;
  -moz-user-drag: element;
  -o-user-drag: element;
  user-drag: element;
}

</style>
<div
    ondragenter="onLivewireCalendarEventDragEnter(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
    ondragleave="onLivewireCalendarEventDragLeave(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
    ondragover="onLivewireCalendarEventDragOver(event);"
    ondrop="onLivewireCalendarEventDrop(event, '{{ $componentId }}', '{{ $day }}', {{ $day->year }}, {{ $day->month }}, {{ $day->day }}, '{{ $dragAndDropClasses }}');"
    class="flex-1 h-40 lg:h-48 border border-gray-200 -mt-px -ml-px"
    style="min-width: 10rem;">

    {{-- Wrapper for Drag and Drop --}}
    <div
        class="w-full h-full"
        id="{{ $componentId }}-{{ $day }}">

        <div
            @if($dayClickEnabled)
                wire:click="onDayClick({{ $day->year }}, {{ $day->month }}, {{ $day->day }})"
            @endif
            class="w-full h-full p-2 {{ $dayInMonth ? $isToday ? 'bg-yellow-100' : ' bg-white ' : 'bg-gray-100' }} flex flex-col">

            {{-- Number of Day --}}
            <div class="flex items-center">
                <p class="text-sm {{ $dayInMonth ? ' font-medium ' : '' }}">
                    {{ $day->format('j') }}
                </p>
                <p class="text-xs text-gray-600 ml-4">
                    @if($events->isNotEmpty())
                        {{ $events->count() }} {{ Str::plural('event', $events->count()) }}
                    @endif
                </p>
            </div>

            {{-- Events --}}
            <div class="p-2 my-2 flex-1 overflow-y-auto">
                <div class="grid grid-cols-1 grid-flow-row gap-2">
                    @foreach($events as $event)
                        <div
                            @if($dragAndDropEnabled)
                                draggable="true"
                            @endif
                            ondragstart="onLivewireCalendarEventDragStart(event, '{{ $event['id'] }}')">
                            @include($eventView, [
                                'event' => $event,
                            ])
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
