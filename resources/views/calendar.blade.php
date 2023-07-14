<style>
    /* Base class */
.flex {
  display: flex;
}

/* Responsive classes */
@media (min-width: 640px) {
  .sm\:flex {
    display: flex;
  }
}

@media (min-width: 768px) {
  .md\:flex {
    display: flex;
  }
}

@media (min-width: 1024px) {
  .lg\:flex {
    display: flex;
  }
}

/* Base class */
.overflow-x-auto {
  overflow-x: auto;
}

/* Responsive classes */
@media (min-width: 640px) {
  .sm\:overflow-x-auto {
    overflow-x: auto;
  }
}

@media (min-width: 768px) {
  .md\:overflow-x-auto {
    overflow-x: auto;
  }
}

@media (min-width: 1024px) {
  .lg\:overflow-x-auto {
    overflow-x: auto;
  }
}

/* Base class */
.w-full {
  width: 100%;
}

/* Responsive classes */
@media (min-width: 640px) {
  .sm\:w-full {
    width: 100%;
  }
}

@media (min-width: 768px) {
  .md\:w-full {
    width: 100%;
  }
}

@media (min-width: 1024px) {
  .lg\:w-full {
    width: 100%;
  }
}

/* Base class */
.inline-block {
  display: inline-block;
}

/* Base class */
.min-w-full {
  min-width: 100%;
}

/* Base class */
.overflow-hidden {
  overflow: hidden;
}

/* Base class */
.w-full {
  width: 100%;
}

/* Base class */
.flex-row {
  flex-direction: row;
}

/* Base class */
.w-full {
  width: 100%;
}

/* Base class */
.flex-row {
  flex-direction: row;
}

/* Base class */
.w-full {
  width: 100%;
}

/* Base class */
.w-full {
  width: 100%;
}

/* Base class */
.flex-row {
  flex-direction: row;
}

/* Base class */
.w-full {
  width: 100%;
}

/* Base class */
.flex-row {
  flex-direction: row;
}

/* Base class */
.w-full {
  width: 100%;
}

/* Base class */
.flex-row {
  flex-direction: row;
}
</style>
<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="flex">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">

                <div class="w-full flex flex-row">
                    @foreach($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="w-full flex flex-row">
                        @foreach($week as $day)
                            @include($dayView, [
                                    'componentId' => $componentId,
                                    'day' => $day,
                                    'dayInMonth' => $day->isSameMonth($startsAt),
                                    'isToday' => $day->isToday(),
                                    'events' => $getEventsForDay($day, $events),
                                ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
