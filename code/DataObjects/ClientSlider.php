<?php


class ClientSlider extends DataObject
{

    private static $db = [
        'Title'     => 'Varchar(255)',
        'SortOrder' => 'Int'
    ];

    private static $has_one = [
        'Page' => 'Page',
        'Image' => 'Image'
    ];

    private static $default_sort = 'SortOrder';

    private static $field_labels = [
        'Title'   => 'Client Slider Title'
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->addFieldsToTab('Root.Main', [
                TextField::create('Title'),
                UploadField::create('Image', 'Image')
            ]);
        });

        $fields = parent::getCMSFields();

        $fields->removeByName('SortOrder');
        $fields->removeByName('PageID');

        return $fields;
    }

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

}
