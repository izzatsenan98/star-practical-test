<?php

namespace App;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;

class CustomCspPolicy extends Policy
{
  public function configure()
  {
    $this
      ->addDirective(Directive::DEFAULT, [Keyword::SELF, 'https://cdn.jsdelivr.net'])
      ->addDirective(Directive::FRAME_ANCESTORS, Keyword::SELF)
      ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
      ->addDirective(Directive::SCRIPT, [Keyword::SELF])
      ->addDirective(Directive::STYLE, [Keyword::SELF, 'https://code.ionicframework.com', 'https://fonts.googleapis.com', 'https://cdn.jsdelivr.net'])
      ->addDirective(Directive::IMG, [Keyword::SELF, 'data:'])
      ->addDirective(Directive::FONT, [Keyword::SELF, 'https://code.ionicframework.com', 'https://fonts.gstatic.com', 'https://cdn.jsdelivr.net'])
      ->addNonceForDirective(Directive::SCRIPT)
      ->addNonceForDirective(Directive::STYLE);
  }
}
