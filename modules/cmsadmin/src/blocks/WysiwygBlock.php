<?php

namespace cmsadmin\blocks;

use cmsadmin\Module;
use cmsadmin\blockgroups\TextGroup;

class WysiwygBlock extends \cmsadmin\base\Block
{
    public $cacheEnabled = true;
    
    public function name()
    {
        return Module::t('block_wysiwyg_name');
    }

    public function icon()
    {
        return 'format_color_text';
    }

    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Module::t('block_wysiwyg_content_label'), 'type' => 'zaa-wysiwyg'],
            ],
        ];
    }

    public function getFieldHelp()
    {
        return [
            'content' => Module::t('block_wysiwyg_help_content'),
        ];
    }

    public function twigFrontend()
    {
        return '{% if vars.content is not empty %}{{ vars.content }}{% endif %}';
    }

    public function twigAdmin()
    {
        return '{% if vars.content is empty %}<span class="block__empty-text">' . Module::t('block_wysiwyg_no_content') . '</span>{% else %}{{ vars.content }}{% endif %}';
    }
    
    public function getBlockGroup()
    {
        return TextGroup::className();
    }
}
