<?php
namespace Opencart\Catalog\Controller\Startup;
/**
 * Class Language
 *
 * @package Opencart\Catalog\Controller\Startup
 */
class Language extends \Opencart\System\Engine\Controller {
	/**
	 * @var array<string, array<string, mixed>>
	 */
	private static array $languages = [];

	/**
	 * Index
	 *
	 * @return void
	 */
	public function index(): void {
    $this->load->model('localisation/language');

    self::$languages = $this->model_localisation_language->getLanguages();

    // FIX: always force default language (NO GET LANGUAGE)
    $language_info = self::$languages[$this->config->get('config_language_catalog')] ?? [];

    if ($language_info) {
        if ($language_info['extension']) {
            $this->language->addPath(
                'extension/' . $language_info['extension'],
                DIR_EXTENSION . $language_info['extension'] . '/catalog/language/'
            );
        }

        $this->config->set('config_language_id', $language_info['language_id']);
        //$this->config->set('config_language', $language_info['code']);
        // FORCE SINGLE LANGUAGE
$this->config->set('config_language', $this->config->get('config_language_catalog'));

        $this->load->language('default');
    }
}

	/**
	 * After
	 *
	 * Override the language default values
	 *
	 * @param string       $route
	 * @param string       $prefix
	 * @param string       $code
	 * @param array<mixed> $output
	 *
	 * @return void
	 */
	public function after(&$route, &$prefix, &$code, &$output): void {
		if (!$code) {
			$code = $this->config->get('config_language');
		}

		// Use $this->language->load so it's not triggering infinite loops
		$this->language->load($route, $prefix, $code);

		if (isset(self::$languages[$code])) {
			$language_info = self::$languages[$code];

			$path = '';

			if ($language_info['extension']) {
				$extension = 'extension/' . $language_info['extension'];

				if (oc_substr($route, 0, strlen($extension)) != $extension) {
					$path = $extension . '/';
				}
			}

			// Use $this->language->load so it's not triggering infinite loops
			$this->language->load($path . $route, $prefix, $code);
		}
	}
}
