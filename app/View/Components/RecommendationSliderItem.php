<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RecommendationSliderItem extends Component
{
  public $name;
  public $avatarSrc;
  public $reviewTexts;
  public $buttonLink;
  public $buttonText;

  public function __construct(
    $name = '',
    $avatarSrc = '',
    array $reviewTexts = [],
    $buttonLink = '',
    $buttonText = ''
  ) {
    $this->name = $name;
    $this->avatarSrc = $avatarSrc;
    $this->reviewTexts = $reviewTexts;
    $this->buttonLink = $buttonLink;
    $this->buttonText = $buttonText;
  }

  public function render()
  {
    return view('components.recommendation.recommendation-slider-item');
  }
}
