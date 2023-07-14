<div class="container">
    @if($pollMillis !== null && $pollAction !== null)
        <div wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"></div>
    @elseif($pollMillis !== null)
        <div wire:poll.{{ $pollMillis }}ms></div>
    @endif

    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="d-flex">
        <div class="overflow-auto w-100">
            <div class="d-inline-block min-w-100 overflow-hidden">

                <div class="w-100 d-flex flex-row">
                    @foreach($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="w-100 d-flex flex-row">
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
