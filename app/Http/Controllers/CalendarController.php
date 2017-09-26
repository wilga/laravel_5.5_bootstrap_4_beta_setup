<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Transformers\EventTransformer;

class CalendarController extends Controller
{
    public function index()
    {
        $events = new Event;
            $events = $events::with('eventType')
                ->where('publish', true)
                ->get()->toArray();

        $eventTransformer = new EventTransformer;

        $calendarEvents = $eventTransformer->transformCollection($events);

        return view('calendar', [
            'eventsJson' => json_encode($calendarEvents)
        ]);
    }
}
