<?php

namespace Starter\Html;

use Collective\Html\FormBuilder as BaseBuilder;
use Collective\Html\HtmlBuilder;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Translation\Translator as Lang;

class FormBuilder extends BaseBuilder
{
    protected $lang;
    protected $html;

    public function __construct(HtmlBuilder $html, UrlGenerator $url, $csrfToken)
    {
        parent::__construct($html, $url, $csrfToken);

        $this->lang = app('translator');
        $this->html = $html;
    }


    public function bsInput($type, $name, $value = null, $options = array(), $class = 'col-md-9')
    {
        $labelName = $this->getLabelName($name, $options);
        $this->filterOptions($options, $name);
        $input = $this->input($type, $name, $value, $options);

        return $this->bootstrapFieldBlock($name, $labelName, $input, $class);
    }

    public function bsText($name, $value = null, $options = array(), $class = 'col-md-9')
    {
        return $this->bsInput('text', $name, $value, $options, $class);
    }

    public function bsPassword($name, $value = null, $options = array(), $class = 'col-md-9')
    {
        return $this->bsInput('password', $name, $value, $options, $class);
    }

    public function bsEmail($name, $value = null, $options = array(), $class = 'col-md-9')
    {
        return $this->bsInput('email', $name, $value, $options, $class);
    }

    public function bsPhone($name, $value = null, $options = array(), $class = 'col-md-9')
    {
        return $this->bsInput('phone', $name, $value, $options, $class);
    }


    public function bsTextarea($name, $value = null, $options = array(), $class = 'col-md-9')
    {
        if (! isset($options['rows'])) $options['rows'] = 5;

        $labelName = $this->getLabelName($name, $options);
        $this->filterOptions($options, $name);
        $input = $this->textarea($name, $value, $options);

        return $this->bootstrapFieldBlock($name, $labelName, $input, $class);
    }


    public function bsSelect($name, $list, $selected = null, $options = array(), $class = 'col-md-9')
    {
        $labelName = $this->getLabelName($name, $options);
        $this->filterOptions($options, $name);
        $input = $this->select($name, $list, $selected, $options);

        return $this->bootstrapFieldBlock($name, $labelName, $input, $class);
    }


    public function bsRadios($name, $list, $selected = null, $options = array())
    {
        return $this->bsCheckables('radio', $name, $list, $selected, $options = array());
    }

    public function bsCheckboxes($name, $list, $selected = null, $options = array())
    {
        return $this->bsCheckables('checkbox', $name, $list, $selected, $options);
    }

    public function bsCheckables($type, $name, $list, $selected = null, $options = array())
    {
        $labelName = $this->getLabelName($name, $options);
        $this->filterOptions($options, $name);

        unset($options['class']);

        $input = '';
        foreach ($list as $label => $value) {
            $input .= '<label style="margin-right:20px;margin-top:7px;">' . $label . ' ' . $this->checkable($type, $name, $value, ($selected === $value), $options) . '</label>';
        }

        return $this->bootstrapFieldBlock($name, $labelName, $input);
    }


    public function bsButton($label = 'Enregistrer', $options = array())
    {
        $button =  '<div class="form-group row">';
        $button .=     '<div class="col-md-offset-3 col-md-9">';
        $button .=         '<button type="submit" class="btn btn-default col-md-12 btn-primary">';
        $button .=             isset($label) ? $label : 'Enregistrer';
        $button .=         '</button>';
        $button .=     '</div>';
        $button .= '</div>';

        return $button;
    }


    public function bootstrapFieldBlock($name, $labelName, $input, $class = 'col-md-9')
    {
        $field =  '<div class="form-group row">';
        $field .=     '<label for="' . $name . '" class="col-md-3 form-control-label">' . $labelName . '</label>';
        $field .=     '<div class="'.$class.'">';
        $field .=         $input;
        $field .=     '</div>';
        $field .= '</div>';

        return $field;
    }


    public function getLabelName($name, $options)
    {
        $name = isset($options['label']) ? $options['label'] : $this->lang->get('validation.attributes.'.$name);

        if (isset($options['markdown']) or in_array('markdown', $options)) {
            $name = $name . $this->html->image('img/markdown.png', 'markdown', ['class' => 'markdown']);
        }

        if (isset($options['required']) or in_array('required', $options)) {
            $name = $name . ' *';
        }

        return $name;
    }

    public function filterOptions(&$options, $name)
    {
        unset($options['label']);
        $options['class'] = 'form-control' . (isset($options['class']) ? ' '.$options['class'] : '');
        $options['id'] = isset($options['id']) ? $options['id'] : $name;
    }

}
