<?php

namespace App\Http\Transformers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventTransformer extends Transformer {

	public function transform($event) {

        return [
            'eventId' => $event['id'],
            'title' => $event['name'],
            'publish' => $event['publish'],
            'tentative' => $event['is_penciled_in'],
            'private' => $event['is_private'],
            'start' => $this->utcToLocal($event['start']),
            'end' => $this->utcToLocal($event['end']),
            'backgroundColor' => $this->selectColor($event),
            'eventType' => $event['event_type'],
            'publicInformation' => $event['public_information']
        ];
	}

    private function utcToLocal($utcDateTime)
    {
		$localTime = (new Carbon($utcDateTime, 'UTC'))->tz(config('app.timezone'));

    	return str_replace(" ", "T", $localTime->toDateTimeString());
    }

    private function selectColor($event)
    {
        $event['is_private'] ? $color = 'gray' : $color = $event['event_type']['color'];

    	return $color;
    }
	
}