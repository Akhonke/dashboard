<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Unit tests for (some of) ../moodlelib.php.
 *
 * @package    core
 * @category   phpunit
 * @copyright  &copy; 2006 The Open University
 * @author     T.J.Hunt@open.ac.uk
 * @author     nicolas@moodle.com
 */

defined('MOODLE_INTERNAL') || die();

class core_moodlelib_testcase extends advanced_testcase {

    public static $includecoverage = array('lib/moodlelib.php');

    /**
     * Define a local decimal separator.
     *
     * It is not possible to directly change the result of get_string in
     * a unit test. Instead, we create a language pack for language 'xx' in
     * dataroot and make langconfig.php with the string we need to change.
     * The default example separator used here is 'X'; on PHP 5.3 and before this
     * must be a single byte character due to PHP bug/limitation in
     * number_format, so you can't use UTF-8 characters.
     *
     * @param string $decsep Separator character. Defaults to `'X'`.
     */
    protected function define_local_decimal_separator(string $decsep = 'X') {
        global $SESSION, $CFG;

        $SESSION->lang = 'xx';
        $langconfig = "<?php\n\$string['decsep'] = '$decsep';";
        $langfolder = $CFG->dataroot . '/lang/xx';
        check_dir_exists($langfolder);
        file_put_contents($langfolder . '/langconfig.php', $langconfig);

        // Ensure the new value is picked up and not taken from the cache.
        $stringmanager = get_string_manager();
        $stringmanager->reset_caches(true);
    }

    public function test_cleanremoteaddr() {
        // IPv4.
        $this->assertNull(cleanremoteaddr('1023.121.234.1'));
        $this->assertSame('123.121.234.1', cleanremoteaddr('123.121.234.01 '));

        // IPv6.
        $this->assertNull(cleanremoteaddr('0:0:0:0:0:0:0:0:0'));
        $this->assertNull(cleanremoteaddr('0:0:0:0:0:0:0:abh'));
        $this->assertNull(cleanremoteaddr('0:0:0:::0:0:1'));
        $this->assertSame('::', cleanremoteaddr('0:0:0:0:0:0:0:0', true));
        $this->assertSame('::1:1', cleanremoteaddr('0:0:0:0:0:0:1:1', true));
        $this->assertSame('abcd:ef::', cleanremoteaddr('abcd:00ef:0:0:0:0:0:0', true));
        $this->assertSame('1::1', cleanremoteaddr('1:0:0:0:0:0:0:1', true));
        $this->assertSame('0:0:0:0:0:0:10:1', cleanremoteaddr('::10:1', false));
        $this->assertSame('1:1:0:0:0:0:0:0', cleanremoteaddr('01:1::', false));
        $this->assertSame('10:0:0:0:0:0:0:10', cleanremoteaddr('10::10', false));
        $this->assertSame('::ffff:c0a8:11', cleanremoteaddr('::ffff:192.168.1.1', true));
    }

    public function test_address_in_subnet() {
        // 1: xxx.xxx.xxx.xxx/nn or xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx/nnn (number of bits in net mask).
        $this->assertTrue(address_in_subnet('123.121.234.1', '123.121.234.1/32'));
        $this->assertFalse(address_in_subnet('123.121.23.1', '123.121.23.0/32'));
        $this->assertTrue(address_in_subnet('10.10.10.100',  '123.121.23.45/0'));
        $this->assertTrue(address_in_subnet('123.121.234.1', '123.121.234.0/24'));
        $this->assertFalse(address_in_subnet('123.121.34.1', '123.121.234.0/24'));
        $this->assertTrue(address_in_subnet('123.121.234.1', '123.121.234.0/30'));
        $this->assertFalse(address_in_subnet('123.121.23.8', '123.121.23.0/30'));
        $this->assertTrue(address_in_subnet('baba:baba::baba', 'baba:baba::baba/128'));
        $this->assertFalse(address_in_subnet('bab:baba::baba', 'bab:baba::cece/128'));
        $this->assertTrue(address_in_subnet('baba:baba::baba', 'cece:cece::cece/0'));
        $this->assertTrue(address_in_subnet('baba:baba::baba', 'baba:baba::baba/128'));
        $this->assertTrue(address_in_subnet('baba:baba::00ba', 'baba:baba::/120'));
        $this->assertFalse(address_in_subnet('baba:baba::aba', 'baba:baba::/120'));
        $this->assertTrue(address_in_subnet('baba::baba:00ba', 'baba::baba:0/112'));
        $this->assertFalse(address_in_subnet('baba::aba:00ba', 'baba::baba:0/112'));
        $this->assertFalse(address_in_subnet('aba::baba:0000', 'baba::baba:0/112'));

        // Fixed input.
        $this->assertTrue(address_in_subnet('123.121.23.1   ', ' 123.121.23.0 / 24'));
        $this->assertTrue(address_in_subnet('::ffff:10.1.1.1', ' 0:0:0:000:0:ffff:a1:10 / 126'));

        // Incorrect input.
        $this->assertFalse(address_in_subnet('123.121.234.1', '123.121.234.1/-2'));
        $this->assertFalse(address_in_subnet('123.121.234.1', '123.121.234.1/64'));
        $this->assertFalse(address_in_subnet('123.121.234.x', '123.121.234.1/24'));
        $this->assertFalse(address_in_subnet('123.121.234.0', '123.121.234.xx/24'));
        $this->assertFalse(address_in_subnet('123.121.234.1', '123.121.234.1/xx0'));
        $this->assertFalse(address_in_subnet('::1', '::aa:0/xx0'));
        $this->assertFalse(address_in_subnet('::1', '::aa:0/-5'));
        $this->assertFalse(address_in_subnet('::1', '::aa:0/130'));
        $this->assertFalse(address_in_subnet('x:1', '::aa:0/130'));
        $this->assertFalse(address_in_subnet('::1', '::ax:0/130'));

        // 2: xxx.xxx.xxx.xxx-yyy or  xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx::xxxx-yyyy (a range of IP addresses in the last group).
        $this->assertTrue(address_in_subnet('123.121.234.12', '123.121.234.12-14'));
        $this->assertTrue(address_in_subnet('123.121.234.13', '123.121.234.12-14'));
        $this->assertTrue(address_in_subnet('123.121.234.14', '123.121.234.12-14'));
        $this->assertFalse(address_in_subnet('123.121.234.1', '123.121.234.12-14'));
        $this->assertFalse(address_in_subnet('123.121.234.20', '123.121.234.12-14'));
        $this->assertFalse(address_in_subnet('123.121.23.12', '123.121.234.12-14'));
        $this->assertFalse(address_in_subnet('123.12.234.12', '123.121.234.12-14'));
        $this->assertTrue(address_in_subnet('baba:baba::baba', 'baba:baba::baba-babe'));
        $this->assertTrue(address_in_subnet('baba:baba::babc', 'baba:baba::baba-babe'));
        $this->assertTrue(address_in_subnet('baba:baba::babe', 'baba:baba::baba-babe'));
        $this->assertFalse(address_in_subnet('bab:baba::bab0', 'bab:baba::baba-babe'));
        $this->assertFalse(address_in_subnet('bab:baba::babf', 'bab:baba::baba-babe'));
        $this->assertFalse(address_in_subnet('bab:baba::bfbe', 'bab:baba::baba-babe'));
        $this->assertFalse(address_in_subnet('bfb:baba::babe', 'bab:baba::baba-babe'));

        // Fixed input.
        $this->assertTrue(address_in_subnet('123.121.234.12', '123.121.234.12 - 14 '));
        $this->assertTrue(address_in_subnet('bab:baba::babe', 'bab:baba::baba - babe  '));

        // Incorrect input.
        $this->assertFalse(address_in_subnet('123.121.234.12', '123.121.234.12-234.14'));
        $this->assertFalse(address_in_subnet('123.121.234.12', '123.121.234.12-256'));
        $this->assertFalse(address_in_subnet('123.121.234.12', '123.121.234.12--256'));

        // 3: xxx.xxx or xxx.xxx. or xxx:xxx:xxxx or xxx:xxx:xxxx. (incomplete address, a bit non-technical ;-).
        $this->assertTrue(address_in_subnet('123.121.234.12', '123.121.234.12'));
        $this->assertFalse(address_in_subnet('123.121.23.12', '123.121.23.13'));
        $this->assertTrue(address_in_subnet('123.121.234.12', '123.121.234.'));
        $this->assertTrue(address_in_subnet('123.121.234.12', '123.121.234'));
        $this->assertTrue(address_in_subnet('123.121.234.12', '123.121'));
        $this->assertTrue(address_in_subnet('123.121.234.12', '123'));
        $this->assertFalse(address_in_subnet('123.121.234.1', '12.121.234.'));
        $this->assertFalse(address_in_subnet('123.121.234.1', '12.121.234'));
        $this->assertTrue(address_in_subnet('baba:baba::bab', 'baba:baba::bab'));
        $this->assertFalse(address_in_subnet('baba:baba::ba', 'baba:baba::bc'));
        $this->assertTrue(address_in_subnet('baba:baba::bab', 'baba:baba'));
        $this->assertTrue(address_in_subnet('baba:baba::bab', 'baba:'));
        $this->assertFalse(address_in_subnet('bab:baba::bab', 'baba:'));

        // Multiple subnets.
        $this->assertTrue(address_in_subnet('123.121.234.12', '::1/64, 124., 123.121.234.10-30'));
        $this->assertTrue(address_in_subnet('124.121.234.12', '::1/64, 124., 123.121.234.10-30'));
        $this->assertTrue(address_in_subnet('::2',            '::1/64, 124., 123.121.234.10-30'));
        $this->assertFalse(address_in_subnet('12.121.234.12', '::1/64, 124., 123.121.234.10-30'));

        // Other incorrect input.
        $this->assertFalse(address_in_subnet('123.123.123.123', ''));
    }

    public function test_fix_utf8() {
        // Make sure valid data including other types is not changed.
        $this->assertSame(null, fix_utf8(null));
        $this->assertSame(1, fix_utf8(1));
        $this->assertSame(1.1, fix_utf8(1.1));
        $this->assertSame(true, fix_utf8(true));
        $this->assertSame('', fix_utf8(''));
        $this->assertSame('abc', fix_utf8('abc'));
        $array = array('do', 're', 'mi');
        $this->assertSame($array, fix_utf8($array));
        $object = new stdClass();
        $object->a = 'aa';
        $object->b = 'bb';
        $this->assertEquals($object, fix_utf8($object));

        // valid utf8 string
        $this->assertSame("žlutý koníček přeskočil potůček \n\t\r", fix_utf8("žlutý koníček přeskočil potůček \n\t\r\0"));

        // Invalid utf8 string.
        $this->assertSame('aš', fix_utf8('a'.chr(130).'š'), 'This fails with buggy iconv() when mbstring extenstion is not available as fallback.');
    }

    public function test_optional_param() {
        global $CFG;

        $_POST['username'] = 'post_user';
        $_GET['username'] = 'get_user';
        $this->assertSame($_POST['username'], optional_param('username', 'default_user', PARAM_RAW));

        unset($_POST['username']);
        $this->assertSame($_GET['username'], optional_param('username', 'default_user', PARAM_RAW));

        unset($_GET['username']);
        $this->assertSame('default_user', optional_param('username', 'default_user', PARAM_RAW));

        // Make sure exception is triggered when some params are missing, hide error notices here - new in 2.2.
        $_POST['username'] = 'post_user';
        try {
            optional_param('username', 'default_user', null);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }
        try {
            @optional_param('username', 'default_user');
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
        try {
            @optional_param('username');
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
        try {
            optional_param('', 'default_user', PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Make sure warning is displayed if array submitted - TODO: throw exception in Moodle 2.3.
        $_POST['username'] = array('a'=>'a');
        $this->assertSame($_POST['username'], optional_param('username', 'default_user', PARAM_RAW));
        $this->assertDebuggingCalled();
    }

    public function test_optional_param_array() {
        global $CFG;

        $_POST['username'] = array('a'=>'post_user');
        $_GET['username'] = array('a'=>'get_user');
        $this->assertSame($_POST['username'], optional_param_array('username', array('a'=>'default_user'), PARAM_RAW));

        unset($_POST['username']);
        $this->assertSame($_GET['username'], optional_param_array('username', array('a'=>'default_user'), PARAM_RAW));

        unset($_GET['username']);
        $this->assertSame(array('a'=>'default_user'), optional_param_array('username', array('a'=>'default_user'), PARAM_RAW));

        // Make sure exception is triggered when some params are missing, hide error notices here - new in 2.2.
        $_POST['username'] = array('a'=>'post_user');
        try {
            optional_param_array('username', array('a'=>'default_user'), null);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }
        try {
            @optional_param_array('username', array('a'=>'default_user'));
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
        try {
            @optional_param_array('username');
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
        try {
            optional_param_array('', array('a'=>'default_user'), PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Do not allow nested arrays.
        try {
            $_POST['username'] = array('a'=>array('b'=>'post_user'));
            optional_param_array('username', array('a'=>'default_user'), PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (coding_exception $ex) {
            $this->assertTrue(true);
        }

        // Do not allow non-arrays.
        $_POST['username'] = 'post_user';
        $this->assertSame(array('a'=>'default_user'), optional_param_array('username', array('a'=>'default_user'), PARAM_RAW));
        $this->assertDebuggingCalled();

        // Make sure array keys are sanitised.
        $_POST['username'] = array('abc123_;-/*-+ '=>'arrggh', 'a1_-'=>'post_user');
        $this->assertSame(array('a1_-'=>'post_user'), optional_param_array('username', array(), PARAM_RAW));
        $this->assertDebuggingCalled();
    }

    public function test_required_param() {
        $_POST['username'] = 'post_user';
        $_GET['username'] = 'get_user';
        $this->assertSame('post_user', required_param('username', PARAM_RAW));

        unset($_POST['username']);
        $this->assertSame('get_user', required_param('username', PARAM_RAW));

        unset($_GET['username']);
        try {
            $this->assertSame('default_user', required_param('username', PARAM_RAW));
            $this->fail('moodle_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('moodle_exception', $ex);
        }

        // Make sure exception is triggered when some params are missing, hide error notices here - new in 2.2.
        $_POST['username'] = 'post_user';
        try {
            @required_param('username');
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
        try {
            required_param('username', '');
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }
        try {
            required_param('', PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Make sure warning is displayed if array submitted - TODO: throw exception in Moodle 2.3.
        $_POST['username'] = array('a'=>'a');
        $this->assertSame($_POST['username'], required_param('username', PARAM_RAW));
        $this->assertDebuggingCalled();
    }

    public function test_required_param_array() {
        global $CFG;

        $_POST['username'] = array('a'=>'post_user');
        $_GET['username'] = array('a'=>'get_user');
        $this->assertSame($_POST['username'], required_param_array('username', PARAM_RAW));

        unset($_POST['username']);
        $this->assertSame($_GET['username'], required_param_array('username', PARAM_RAW));

        // Make sure exception is triggered when some params are missing, hide error notices here - new in 2.2.
        $_POST['username'] = array('a'=>'post_user');
        try {
            required_param_array('username', null);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }
        try {
            @required_param_array('username');
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
        try {
            required_param_array('', PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Do not allow nested arrays.
        try {
            $_POST['username'] = array('a'=>array('b'=>'post_user'));
            required_param_array('username', PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Do not allow non-arrays.
        try {
            $_POST['username'] = 'post_user';
            required_param_array('username', PARAM_RAW);
            $this->fail('moodle_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('moodle_exception', $ex);
        }

        // Make sure array keys are sanitised.
        $_POST['username'] = array('abc123_;-/*-+ '=>'arrggh', 'a1_-'=>'post_user');
        $this->assertSame(array('a1_-'=>'post_user'), required_param_array('username', PARAM_RAW));
        $this->assertDebuggingCalled();
    }

    public function test_clean_param() {
        // Forbid objects and arrays.
        try {
            clean_param(array('x', 'y'), PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }
        try {
            $param = new stdClass();
            $param->id = 1;
            clean_param($param, PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Require correct type.
        try {
            clean_param('x', 'xxxxxx');
            $this->fail('moodle_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('moodle_exception', $ex);
        }
        try {
            @clean_param('x');
            $this->fail('moodle_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('moodle_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }
    }

    public function test_clean_param_array() {
        $this->assertSame(array(), clean_param_array(null, PARAM_RAW));
        $this->assertSame(array('a', 'b'), clean_param_array(array('a', 'b'), PARAM_RAW));
        $this->assertSame(array('a', array('b')), clean_param_array(array('a', array('b')), PARAM_RAW, true));

        // Require correct type.
        try {
            clean_param_array(array('x'), 'xxxxxx');
            $this->fail('moodle_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('moodle_exception', $ex);
        }
        try {
            @clean_param_array(array('x'));
            $this->fail('moodle_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('moodle_exception', $ex);
        } catch (Error $error) {
            // PHP 7.1 throws Error even earlier.
            $this->assertRegExp('/Too few arguments to function/', $error->getMessage());
        }

        try {
            clean_param_array(array('x', array('y')), PARAM_RAW);
            $this->fail('coding_exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf('coding_exception', $ex);
        }

        // Test recursive.
    }

    public function test_clean_param_raw() {
        $this->assertSame(
            '#()*#,9789\'".,<42897></?$(*DSFMO#$*)(SDJ)($*)',
            clean_param('#()*#,9789\'".,<42897></?$(*DSFMO#$*)(SDJ)($*)', PARAM_RAW));
    }

    public function test_clean_param_trim() {
        $this->assertSame('Frog toad', clean_param("   Frog toad   \r\n  ", PARAM_RAW_TRIMMED));
    }

    public function test_clean_param_clean() {
        // PARAM_CLEAN is an ugly hack, do not use in new code (skodak),
        // instead use more specific type, or submit sothing that can be verified properly.
        $this->assertSame('xx', clean_param('xx<script>', PARAM_CLEAN));
    }

    public function test_clean_param_alpha() {
        $this->assertSame('DSFMOSDJ', clean_param('#()*#,9789\'".,<42897></?$(*DSFMO#$*)(SDJ)($*)', PARAM_ALPHA));
    }

    public function test_clean_param_alphanum() {
        $this->assertSame('978942897DSFMOSDJ', clean_param('#()*#,9789\'".,<42897></?$(*DSFMO#$*)(SDJ)($*)', PARAM_ALPHANUM));
    }

    public function test_clean_param_alphaext() {
        $this->assertSame('DSFMOSDJ', clean_param('#()*#,9789\'".,<42897></?$(*DSFMO#$*)(SDJ)($*)', PARAM_ALPHAEXT));
    }

    public function test_clean_param_sequence() {
        $this->assertSame(',9789,42897', clean_param('#()*#,9789\'".,<42897></?$(*DSFMO#$*)(SDJ)($*)', PARAM_SEQUENCE));
    }

    public function test_clean_param_component() {
        // Please note the cleaning of component names is very strict, no guessing here.
        $this->assertSame('mod_forum', clean_param('mod_forum', PARAM_COMPONENT));
        $this->assertSame('block_online_users', clean_param('block_online_users', PARAM_COMPONENT));
        $this->assertSame('block_blond_online_users', clean_param('block_blond_online_users', PARAM_COMPONENT));
        $this->assertSame('mod_something2', clean_param('mod_something2', PARAM_COMPONENT));
        $this->assertSame('forum', clean_param('forum', PARAM_COMPONENT));
        $this->assertSame('user', clean_param('user', PARAM_COMPONENT));
        $this->assertSame('rating', clean_param('rating', PARAM_COMPONENT));
        $this->assertSame('feedback360', clean_param('feedback360', PARAM_COMPONENT));
        $this->assertSame('mod_feedback360', clean_param('mod_feedback360', PARAM_COMPONENT));
        $this->assertSame('', clean_param('mod_2something', PARAM_COMPONENT));
        $this->assertSame('', clean_param('2mod_something', PARAM_COMPONENT));
        $this->assertSame('', clean_param('mod_something_xx', PARAM_COMPONENT));
        $this->assertSame('', clean_param('auth_something__xx', PARAM_COMPONENT));
        $this->assertSame('', clean_param('mod_Something', PARAM_COMPONENT));
        $this->assertSame('', clean_param('mod_somethíng', PARAM_COMPONENT));
        $this->assertSame('', clean_param('mod__something', PARAM_COMPONENT));
        $this->assertSame('', clean_param('auth_xx-yy', PARAM_COMPONENT));
        $this->assertSame('', clean_param('_auth_xx', PARAM_COMPONENT));
        $this->assertSame('a2uth_xx', clean_param('a2uth_xx', PARAM_COMPONENT));
        $this->assertSame('', clean_param('auth_xx_', PARAM_COMPONENT));
        $this->assertSame('', clean_param('auth_xx.old', PARAM_COMPONENT));
        $this->assertSame('', clean_param('_user', PARAM_COMPONENT));
        $this->assertSame('', clean_param('2rating', PARAM_COMPONENT));
        $this->assertSame('', clean_param('user_', PARAM_COMPONENT));
    }

    public function test_clean_param_localisedfloat() {

        $this->assertSame(0.5, clean_param('0.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('0X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(0.5, clean_param('.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(10.5, clean_param('10.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('10X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(1000.5, clean_param('1 000.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('1 000X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('1.000.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('1X000X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('nan', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('10.6blah', PARAM_LOCALISEDFLOAT));

        // Tests with a localised decimal separator.
        $this->define_local_decimal_separator();

        $this->assertSame(0.5, clean_param('0.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(0.5, clean_param('0X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(0.5, clean_param('.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(0.5, clean_param('X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(10.5, clean_param('10.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(10.5, clean_param('10X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(1000.5, clean_param('1 000.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(1000.5, clean_param('1 000X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('1.000.5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('1X000X5', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('nan', PARAM_LOCALISEDFLOAT));
        $this->assertSame(false, clean_param('10X6blah', PARAM_LOCALISEDFLOAT));
    }

    public function test_is_valid_plugin_name() {
        $this->assertTrue(is_valid_plugin_name('forum'));
        $this->assertTrue(is_valid_plugin_name('forum2'));
        $this->assertTrue(is_valid_plugin_name('feedback360'));
        $this->assertTrue(is_valid_plugin_name('online_users'));
        $this->assertTrue(is_valid_plugin_name('blond_online_users'));
        $this->assertFalse(is_valid_plugin_name('online__users'));
        $this->assertFalse(is_valid_plugin_name('forum '));
        $this->assertFalse(is_valid_plugin_name('forum.old'));
        $this->assertFalse(is_valid_plugin_name('xx-yy'));
        $this->assertFalse(is_valid_plugin_name('2xx'));
        $this->assertFalse(is_valid_plugin_name('Xx'));
        $this->assertFalse(is_valid_plugin_name('_xx'));
        $this->assertFalse(is_valid_plugin_name('xx_'));
    }

    public function test_clean_param_plugin() {
        // Please note the cleaning of plugin names is very strict, no guessing here.
        $this->assertSame('forum', clean_param('forum', PARAM_PLUGIN));
        $this->assertSame('forum2', clean_param('forum2', PARAM_PLUGIN));
        $this->assertSame('feedback360', clean_param('feedback360', PARAM_PLUGIN));
        $this->assertSame('online_users', clean_param('online_users', PARAM_PLUGIN));
        $this->assertSame('blond_online_users', clean_param('blond_online_users', PARAM_PLUGIN));
        $this->assertSame('', clean_param('online__users', PARAM_PLUGIN));
        $this->assertSame('', clean_param('forum ', PARAM_PLUGIN));
        $this->assertSame('', clean_param('forum.old', PARAM_PLUGIN));
        $this->assertSame('', clean_param('xx-yy', PARAM_PLUGIN));
        $this->assertSame('', clean_param('2xx', PARAM_PLUGIN));
        $this->assertSame('', clean_param('Xx', PARAM_PLUGIN));
        $this->assertSame('', clean_param('_xx', PARAM_PLUGIN));
        $this->assertSame('', clean_param('xx_', PARAM_PLUGIN));
    }

    public function test_clean_param_area() {
        // Please note the cleaning of area names is very strict, no guessing here.
        $t