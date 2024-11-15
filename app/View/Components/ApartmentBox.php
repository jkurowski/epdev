<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApartmentBox extends Component
{
    public $status;
    public $title;
    public $size;
    public $type;
    public $floor;
    public $rooms;
    public $pdfLink;
    public $detailsLink;
    public $statusText;
    public $statusClass;
    public $webpSmall;
    public $webpLarge;
    public $pngSmall;
    public $pngLarge;
    public $defaultSrc;
    public $alt;
    public $lightboxSrc;
    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status = "1", $title = "", $size = "", $type = "", $floor = "", $rooms = "", $pdfLink = '#', $detailsLink = '#', $webpSmall = '', $webpLarge = '', $pngSmall = '', $pngLarge = '', $defaultSrc = '', $alt = '', $lightboxSrc = '')
    {
        $this->status = $status;
        $this->title = $title;
        $this->size = $size;
        $this->type = $type;
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->pdfLink = $pdfLink;
        $this->detailsLink = $detailsLink;
        $this->webpSmall = $webpSmall;
        $this->webpLarge = $webpLarge;
        $this->pngSmall = $pngSmall;
        $this->pngLarge = $pngLarge;
        $this->defaultSrc = $defaultSrc;
        $this->alt = $alt;
        $this->lightboxSrc = asset($lightboxSrc);

        // Determine status text and class based on the status value
        switch ($status) {
            case 1:
                $this->statusText = 'DOSTĘPNE';
                $this->statusClass = 'bg-success';
                break;
            case 2:
                $this->statusText = 'REZERWACJA';
                $this->statusClass = 'bg-warning';
                break;
            case 3:
                $this->statusText = 'SPRZEDANE';
                $this->statusClass = 'bg-danger';
                break;
            default:
                $this->statusText = 'Nieznany';
                $this->statusClass = 'bg-secondary';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.apartment-box');
    }
}
