<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RecommendationSection extends Component
{
  public $title;
  public $subtitle;
  public $buttonLink;
  public $buttonText;

  public function __construct(
    $title = 'EP DEVELOPMENT',
    $subtitle = 'Rekomendacje',
    $buttonLink = '',
    $buttonText = ''
  ) {
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->buttonLink = $buttonLink;
    $this->buttonText = $buttonText;
  }

  public function render()
  {
    return view('components.recommendation.recommendation-section');
  }
}
