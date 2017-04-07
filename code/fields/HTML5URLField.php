<?php

/**
 * class HTML5URLField
 *
 * @author Ryan
 */
class HTML5URLField extends TextField {

    private static $default_classes = array('text');

    private static $validregex = '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';

    /**
     * Set additional attributes
     * @return array Attributes
     */
    public function getAttributes() {
        $attributes = array(
            'placeholder' => 'http://example.com',
            'type' => 'url',
            'pattern' => 'https?://.+'
        );

        return array_merge(
                parent::getAttributes(), $attributes
        );
    }

    /**
     * Server side validation, using a regular expression.
     * @return Boolean
     */
    public function validate($validator) {
        $this->value = trim($this->value);

        if ($this->value && self::$validregex && !preg_match(self::$validregex, $this->value)) {
            $validator->validationError($this->name, 'Please enter a valid URL', 'validation');
            return false;
        }
        return true;
    }

}
