<?php

/**
 * A simple dataobject for defining a custom route
 * in the sitemap XML
 *
 * @author Ryan
 */
class SitemapXMLCustomRoute extends DataObject {

    private static $singular_name='Custom Route';

    private static $plural_name='Custom Routes';

    private static $db=array(
                                'Path'=>'Varchar(2083)',
                                'Frequency'=>'Enum("yearly, monthly, weekly, daily, hourly, always", "monthly")'
                            );

    private static $summary_fields=array(
                                            'Path'=>'Path',
                                            'Frequency'=>'Change Frequency'
                                        );

    public function getCMSFields() {
        $fields = FieldList::create(
                        TextField::create('Path', 'Path', null, 2083)->setDescription('for example: http://example.com/company/about-us enter company/about-us'),
                        DropdownField::create('Frequency', 'Change Frequency', $this->dbObject('Frequency')->enumValues())
                );

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function getTitle() {
        return $this->Path;
    }

    /**
     * required fields in the CMS
     * @return \RequiredFields
     */
    public function getCMSValidator(){
		return new RequiredFields('Link');
	}

    /**
     * required by the Googlesitemaps module.
     *
     * @param type $member
     * @return boolean
     */
    public function canView($member = null) {
		return true;
	}

    /**
     * required by the Googlesitemaps module.
     * returns the Link
     * @return String
     */
	public function AbsoluteLink() {
		return Director::absoluteURL($this->Link());
	}

    /**
     * wrapper for returning the Link
     *
     * @return String
     */
	public function Link() {
		return $this->Path;
	}

    /**
     * return the change freq. for this route
     * @return String
     */
    public function getChangeFrequency(){
        return $this->Frequency;
    }


}
