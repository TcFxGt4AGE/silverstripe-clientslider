<?php

class ClientSliderExtension extends SiteTreeExtension
{

    private static $db = [
        'SliderTitle'     => 'Varchar(255)'
    ];
    private static $has_many = [
        'ClientSliders' => 'ClientSlider'
    ];

    public function updateCMSFields(FieldList $fields)
    {

        /** @var GridFieldConfig $gridConfig */
        $gridConfig = GridFieldConfig::create();

        $gridConfig
            ->addComponent(new GridFieldButtonRow('before'))
            ->addComponent(new GridFieldAddNewButton('buttons-before-left'))
            ->addComponent(new GridFieldToolbarHeader())
            ->addComponent(new  GridFieldSortableHeader())
            ->addComponent(new GridFieldSortableRows('SortOrder'))
            ->addComponent($dataColumns = new GridFieldDataColumns())
            ->addComponent(new GridFieldEditButton())
            ->addComponent(new GridFieldDeleteAction())
            ->addComponent(new GridFieldDetailForm());

        $dataColumns->setDisplayFields([
            'Title' => 'ClientSlider Title',
        ]);

        /** @var TabSet $rootTab */
        //We need to repush Metadata to ensure it is the last tab
        $rootTab = $fields->fieldByName('Root');
        $rootTab->push(Tab::create('ClientSliders'));
        if ($rootTab->fieldByName('Metadata')) {
            $metaChildren = $rootTab->fieldByName('Metadata')->getChildren();
            $rootTab->removeByName('Metadata');
            $rootTab->push(Tab::create('Metadata')->setChildren($metaChildren));
        }

        $GridField = GridField::create('ClientSliders', 'ClientSliders', $this->owner->ClientSliders(), $gridConfig);

        $fields->addFieldToTab('Root.ClientSliders', TextField::create('SliderTitle','Slider Title'));
        $fields->addFieldToTab('Root.ClientSliders', $GridField);

        return $fields;
    }
}
