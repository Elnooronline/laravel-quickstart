<?php

namespace App\Http\Requests;

use App\Locales\Language;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
     * Get a proper rules based on the request type.
     *
     * @return array
     */
    public function getAproperRules()
    {
        if ($this->isUpdateRequest()) {
            return $this->updateRules();
        } elseif ($this->isCreateRequest()) {
            return $this->createRules();
        }
    }

    /**
     * Parse localized/multilingual rules.
     *
     * @return array
     */
    public function rules()
    {
        if (method_exists($this, 'localedRules')) {
            return $this->parseLocaled($this->localedRules());
        }

        return [];
    }

    /**
     * Return the rules of update request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [];
    }

    /**
     * Return the rules of create request.
     *
     * @return array
     */
    public function createRules()
    {
        return [];
    }

    /**
     * Determine if the current request is put or patch.
     *
     * @return bool
     */
    public function isUpdateRequest()
    {
        return $this->isMethod('put') || $this->isMethod('patch');
    }

    /**
     * Determine if the current request is post.
     *
     * @return bool
     */
    public function isCreateRequest()
    {
        return $this->isMethod('post');
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        if (is_array($attributes = trans($this->getResourceName().'.attributes'))) {
            return array_dot($attributes + $this->localedAttributes($this->getLocaledAttributeFromRules()));
        }

        return [];
    }

    /**
     *
     * Get the model resource name by route.
     *
     * @return string|null
     */
    public function getResourceName()
    {
        preg_match('/(dashboard\.)?([a-zA-Z_-]+)?.*/', $this->route()->getName(), $matches);

        $resource = $matches[2] ?? null;

        if (property_exists($this, 'resource')) {
            $resource = $this->resource;
        }

        return $resource;
    }

    /**
     * Parse localed rules.
     *
     * @param $localedRules
     */
    public function parseLocaled($localedRules)
    {
        $supportedLanguages = Language::all();
        $newRules = [];
        $defaultNotation = ':{default}';
        $langNotation = ':{lang}';

        foreach ($localedRules as $key => $rules) {

            // Detect the key:{default} format.
            // Represent the validation for the default language.
            if (ends_with($key, $defaultNotation)) {
                $newRules[str_replace_last($defaultNotation, '', $key).':'.config('app.locale')] = $rules;
            }

            // Detect the key:{lang} format.
            // Represent the validation for supported language format.
            elseif (ends_with($key, $langNotation)) {
                // Loop over the supported languages.
                foreach ($supportedLanguages as $language) {
                    // Replace the lang in :{lang} with the supported language code..
                    $localedKey = str_replace_last($langNotation, ':'.$language->getCode(), $key);
                    // If there is :{default} notation defined avoid overriding it.
                    if (! isset($newRules[$localedKey])) {
                        $newRules[$localedKey] = $rules;
                    }
                }
            } // If there is no notations return the key and the rules as it.
            else {
                $newRules[$key] = $rules;
            }
        }

        return $newRules;
    }

    /**
     * Translate localed attributes.
     *
     * @param $resource
     * @param array $attributes
     * @return array
     */
    public function localedAttributes($attributes = [])
    {
        $resource = $this->getResourceName();
        $supportedLanguages = Language::all();
        $translatedAttributes = trans($resource.'.attributes');
        foreach ($attributes as $attribute) {
            foreach ($supportedLanguages as $language) {
                $translatedAttributes[$attribute.':'.$language->getCode()] = trans($resource.'.attributes.'.$attribute).' ( '.$language->getNativeName().' )';
            }
        }

        return $translatedAttributes;
    }

    /**
     * Get the localed attribute names by the rules.
     *
     * @return array
     */
    public function getLocaledAttributeFromRules()
    {
        $localedAttributes = [];
        foreach ($this->rules() as $attribute => $rule) {
            if (str_contains($attribute, ':')) {
                $localedAttributes[] = explode(':', $attribute)[0];
            }
        }

        return array_unique($localedAttributes);
    }
}
