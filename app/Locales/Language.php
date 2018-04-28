<?php

namespace App\Locales;

use Illuminate\Support\Facades\App;

class Language
{
    /**
     * The code name for the language.
     *
     * @var string
     */
    private $code;

    /**
     * The name of the language.
     *
     * @var string
     */
    private $name;

    /**
     * The native name of the language.
     *
     * @var string
     */
    private $native;

    /**
     * The direction of the language.
     *
     * @var string
     */
    private $dir;

    /**
     * The flag icon of the language.
     *
     * @var string
     */
    private $flag;

    /**
     * Language constructor.
     *
     * @param $code
     * @param $properties
     */
    public function __construct($code, $properties)
    {
        $this->code = $code;
        $this->name = $properties['name'];
        $this->native = $properties['native'];
        $this->dir = $properties['dir'];
        $this->flag = $properties['flag'];
    }

    /**
     * Get the code for the language.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the direction of the language.
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->dir;
    }

    /**
     * Get the name of the language.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the native name of the language.
     *
     * @return string
     */
    public function getNativeName()
    {
        return $this->native;
    }

    /**
     * Determine if the language is in RTL direction.
     *
     * @return bool
     */
    public function isRtl()
    {
        return strcasecmp($this->dir, 'rtl') === 0;
    }

    /**
     * Determine if the language is in LTR direction.
     *
     * @return bool
     */
    public function isLtr()
    {
        return ! $this->isRtl();
    }

    /**
     * Get a list of language representations.
     *
     * @return \App\Locales\Language[]
     */
    public static function all()
    {
        $languages = config('app.locales');

        foreach ($languages as $code => $properties) {
            $instances[] = new static($code, $properties);
        }

        return $instances;
    }

    /**
     * Get the representation of the default language.
     *
     * @return static
     */
    public static function default()
    {
        $code = config('app.locale');

        $lang = config('app.locales')[$code];

        return new static($code, $lang);
    }

    /**
     * Get the representation of the current language.
     *
     * @return static
     */
    public static function current()
    {
        $code = App::getLocale();

        $lang = config('app.locales')[$code];

        return new static($code, $lang);
    }

    /**
     * Get the representation of the current language.
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
    }
}
