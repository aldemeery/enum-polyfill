<?php

if (!class_exists('SplEnum')) {

    /**
     * A polyfill for the 'splEnum' class.
     *
     * @see http://php.net/manual/en/class.splenum.php
     * @author Osama Aldemeery <aldemeery@gmail.com>
     */
    abstract class SplEnum
    {
        /**
         * @constant(__default) The default value of the enum.
         */
        protected const __default = null;

        /**
         * The current value of the enum.
         *
         * @var mixed
         */
        protected $value;

        /**
         * splEnum constructor.
         *
         * @param mixed $value The initial value of the enum.
         * @throws UnexpectedValueException
         */
        public function __construct($value = null)
        {
            $ref = new \ReflectionClass($this);

            if (!in_array($value, $ref->getConstants())) {
                throw new \UnexpectedValueException("Value '$value' is not part of the enum " . get_called_class());
            }

            $this->value = $value;
        }

        /**
         * Get a list of all the constants in the enum
         *
         * @param  boolean $include_default Whether to include the default value in the list or no.
         *
         * @return array                    The list of constants defined in the enum.
         */
        public static function getConstList($include_default = false)
        {
            $reflected = new \ReflectionClass(new static(null));

            $constants = $reflected->getConstants();

            if (!$include_default) {
                unset($constants['__default']);
                return $constants;
            }

            return $constants;
        }

        /**
         * The string representation of the enum.
         *
         * @return string The current value of the enum.
         */
        final public function __toString()
        {
            return strval($this->value);
        }
    }
}
