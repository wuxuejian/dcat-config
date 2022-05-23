<?php

namespace Wuxuejian\DcatConfig;

use Dcat\Admin\Extend\ServiceProvider;


class DcatConfigServiceProvider extends ServiceProvider
{
    // 定义菜单
    protected $menu = [
        [
            'title' => 'Config',
            'uri' => 'config',
            'icon' => 'fa-toggle-off', // 图标可以留空
        ],
    ];

    public function init()
    {
        parent::init();
        $this->load();
    }

    public function load()
    {
        $array = collect(admin_setting_array('ghost::admin_config'))->map(function ($value) {
            return ['key' => $value['key'], 'value' => $value];
        })->toArray();
        foreach ($array as $config) {
            config([$config['key']."_all" => $config['value']]);
            config([$config['key'] => $config['value']['value']]);
        }
    }

    public function settingForm()
    {
        return new Setting($this);
    }
}
