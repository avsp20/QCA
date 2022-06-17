<?php
namespace App\Helper;

use App\Helper;

class Frontpages {
	public static function pages() {
		$pages = array(
			'home'                         => 'Home',
			'advices'                      => 'Advices',
			'cost-management'              => 'Cost Management',
			'costs-drafting'               => 'Cost Drafting',
			'settlement-conference-team'   => 'Settlement Conference Team',
			'court-appearances'            => 'Court Appearances',
			'expert-reports'               => 'Expert Reports',
			'alternative-costs-resolution' => 'Alternative Costs Resolution',
			'cle-seminars'                 => 'CLE Seminars',
			'instruction-forms'            => 'Instruction Forms',
			'contact-us'                   => 'Contact Us',
			'about-us'                     => 'About Us',
			'qca-legal'                    => 'QCA Legal',
			'rates'                        => 'Rates',
			'terms-and-conditions'         => 'Terms & Conditions',
			'security-policy'              => 'Security Policy',
			'privacy-policy'               => 'Privacy Policy',
			'employment'                   => 'Employment',
		);
		return $pages;
	}

	public static function locations() {
		$locations = array(
			'ACT',
			'NSW',
			'NT',
			'QLD',
			'TAS',
			'VIC',
			'WA',
		);
		return $locations;
	}

	public static function jurisdictions() {
		$jurisdictions = array(
			'ACT',
			'NSW',
			'NT',
			'QLD',
			'TAS',
			'VIC',
			'WA',
			'Family Court',
			'Federal Court',
			'High Court',
			'Other',
		);
		return $jurisdictions;
	}

	public static function states() {
		$states = array(
			'0' => 'NSW',
			'1' => 'VIC',
			'2' => 'QLD',
			'3' => 'SA',
			'4' => 'WA',
			'5' => 'NT',
			'6' => 'TAS',
		);
		return $states;
	}
}
