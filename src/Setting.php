<?php

namespace Wuxuejian\DcatConfig;

use Dcat\Admin\Extend\Setting as Form;

class Setting extends Form
{
    // 返回表单弹窗标题
    public function title()
    {
        return $this->trans('dcat-config.title');
    }
    public function form()
    {
        $this->table('tab',$this->trans('dcat-config.tab'), function (\Dcat\Admin\Widgets\Form $form) {
            $form->text('key',$this->trans('dcat-config.key'))->default('base');
            $form->text('value',$this->trans('dcat-config.value'))->default('基本配置');
        });
    }
}
