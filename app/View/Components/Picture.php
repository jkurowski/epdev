<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Picture extends Component
{
    public $webpSmall;
    public $webpLarge;
    public $pngSmall;
    public $pngLarge;
    public $jpgSmall;
    public $jpgLarge;
    public $defaultSrc;
    public $width;
    public $height;
    public $alt;
    public $class;

    public function __construct(
        $webpSmall = null,
        $webpLarge = null,
        $pngSmall = null,
        $pngLarge = null,
        $jpgSmall = null,
        $jpgLarge = null,
        $defaultSrc = null,
        $alt = 'Image',
        $class = 'img-fluid'
    ) {
        $this->webpSmall = $webpSmall;
        $this->webpLarge = $webpLarge;
        $this->pngSmall = $pngSmall;
        $this->pngLarge = $pngLarge;
        $this->jpgSmall = $jpgSmall;
        $this->jpgLarge = $jpgLarge;
        $this->defaultSrc = $defaultSrc;
        $this->alt = $alt;
        $this->class = $class;

        if ($defaultSrc && file_exists(public_path($defaultSrc))) {
            $this->setDimensions(public_path($defaultSrc));
        }
    }

    private function setDimensions($imagePath)
    {
        if (file_exists($imagePath)) {
            $dimensions = getimagesize($imagePath);
            if ($dimensions) {
                $this->width = $dimensions[0];
                $this->height = $dimensions[1];
            }
        }
    }


    public function render()
    {
        return view('components.picture');
    }
}
