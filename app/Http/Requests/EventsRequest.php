<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
    {
        return [
            'title' => 'required|min:3',
            'body' => 'required',
            'start_time' => 'required|min:4',
            'end_time' => 'required|min:4',
            'age' => 'required',
            'price' => 'required',
            'address' => 'required',
            'date' => 'required',
            'event_page' => 'required',
            'tag_list' => 'required',
            'city_id' => 'required',
            'img_id' => 'required'
        ];
    }

    /**
     * Get the customized messages that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'Det behövs en titel.',
            'body.required' => 'Skriv en kort förklarande text om eventet.',
            'start_time.required' => 'Det behövs en start tid för eventet.',
            'end_time.required' => 'Det behövs en slut tid för eventet.',
            'age.required' => 'Det behövs en åldersgräns för eventet, om ni inte har någon åldersgräns låt det stå 0.',
            'price.required' => 'Det behöver vara en kostnad för eventet, om det är gratis låt det stå 0.',
            'address.required' => 'Det måste finnas en adress för eventet.',
            'date.required' => 'Det behöver finnas ett datum för eventet.',
            'event_page.required' => 'Det behöver finnas en sida för eventet.',
            'tag_list.required' => 'Det behöver finnas några taggar för eventet',
            'city_id.required' => 'Det behöver finnas en stad för eventet',
            'city_id.required' => 'Det behöver finnas en bild för eventet'
        ];
    }
}
