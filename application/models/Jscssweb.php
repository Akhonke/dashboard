<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Jscssweb extends CI_Model

{

	public function css($page)

	{

		$css = [];

		$css[] = '<link href="' . BASEURL . 'assets/web/css/main.css" rel="stylesheet" type="text/css">';


		if($page == 'register')
		{
			$css[] = '<link href="' . BASEURL . 'assets/web/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
			$css[] = '<link href="' . BASEURL . 'assets/web/css/normalize.min.css" rel="stylesheet" type="text/css">';
			$css[] = '<link href="' . BASEURL . 'assets/web/css/animate.min.css" rel="stylesheet" type="text/css">';
			$css[] = '<script>document.documentElement.className = document.documentElement.className.replace("no-js", "js");</script>';
		}
		return $css;
	}

	public function js($page)

	{

		$js = [];

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/jquery-3.5.1.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/popper.min.js"> </script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/bootstrap.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/jquery.easing.min.js"> </script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/owl.carousel.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/countdown.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/jquery.waypoints.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/jquery.rcounterup.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/magnific-popup.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/validator.min.js"></script>';

		$js[] = '<script src="' . BASEURL . 'assets/web/js/app.js"></script>';

		if ($page == 'register') {
			$js[] = '<script src="' . BASEURL . 'assets/web/js/vendors/jquery.validate.min.js"></script>';

			$js[] = '<script src="' . BASEURL . 'assets/web/js/other.js"></script>';

			$js[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js" ></script>';
		}

		return $js;
	}
}
