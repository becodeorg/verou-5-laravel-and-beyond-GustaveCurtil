<?php

namespace App\Http\Controllers;

use DOMXPath;
use DOMDocument;
use App\Models\User;
use App\Models\Event;
use App\Models\Scrape;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function scrapeKask(){
        $Kask = User::where('name', 'Kask')->first();
        if ($Kask === null) {
            $Kask = User::create([
                'name' => 'Kask',
                'password' => 'Kask', 
                'password-check' => 'Kask'
            ]);
        }
        require '../vendor/autoload.php';
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get('https://www.kaskcinema.be/');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->loadHTML($htmlString);
        $xpath = new DOMXPath($doc);

        $titles = $xpath->evaluate('//div[@class="row"]/div/div/h1/a/span');
        $datetimes = $xpath->evaluate('//div[@class="row"]/div/div/div[@class="movieDate"]');
        
        foreach ($titles as $key => $title) {

            $dateAndTime = $datetimes[$key]->textContent.PHP_EOL;
            $dateAndTime = trim($dateAndTime);
            list($datePart, $timePart) = explode(' - ', $dateAndTime);
            $formattedDate = date_create_from_format('d.m.y', $datePart);
            if ($formattedDate === false) {
                // Handle invalid date format
                echo "Invalid date format: $datePart";
            } else {
                $formattedDate = $formattedDate->format('Y-m-d');
            }
            $formattedTime = date_create_from_format('H:i', $timePart);
            if ($formattedTime === false) {
                // Handle invalid time format
                echo "Invalid time format: $timePart";
            } else {
                $formattedTime = $formattedTime->format('H:i');
            }



            $existing = Event::where('title', $title->textContent.PHP_EOL)->exists();
            if (!$existing) {
                Event::create([
                    'date' => $formattedDate,
                    'time' => $formattedTime,
                    'title' => $title->textContent.PHP_EOL,
                    'description' => $datetimes[$key]->textContent.PHP_EOL, 
                    'user_id' => $Kask->id, 
                    'type' => 'cinema'
                ]);
            }
        } 
    }
}
