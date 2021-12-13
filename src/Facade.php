<?php

namespace Sontungx305\LaravelSimpleHtmlDom;

class Facade extends \Illuminate\Support\Facades\Facade {

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor() {
        return 'SimpleHTMLDom';
    }
}
