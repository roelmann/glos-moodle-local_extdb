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
 * local_extdb local plugin settings and presets.
 *
 * @package    local_extdb
 * @copyright  2017 RMOelmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * This is designed as a template to enable creation of local plugins reading from
 * an external assessmentsettings table. The external assessmentsettings and table are set in a settings
 * page for each plugin create - ie can each point at different Db/tables etc if
 * required. By default this template reads all fields in the set table (SELECT * FROM).
 **/

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_extdb',
        get_string('pluginname', 'local_extdb'));
    $ADMIN->add('localplugins', $settings);

        // Headings.
    $settings->add(new admin_setting_heading('local_extdb_settings', '',
        get_string('pluginname_desc', 'local_extdb')));
    $settings->add(new admin_setting_heading('local_extdb_exdbheader',
        get_string('settingsheaderdb', 'local_extdb'), ''));

    // Db Connection Settings.
    // -----------------------

    // Db type.
    $options = array('',
        "access",
        "ado_access",
        "ado",
        "ado_mssql",
        "borland_ibase",
        "csv",
        "db2",
        "fbsql",
        "firebird",
        "ibase",
        "informix72",
        "informix",
        "mssql",
        "mssql_n",
        "mssqlnative",
        "mysql",
        "mysqli",
        "mysqlt",
        "oci805",
        "oci8",
        "oci8po",
        "odbc",
        "odbc_mssql",
        "odbc_oracle",
        "oracle",
        "pdo",
        "postgres64",
        "postgres7",
        "postgres",
        "proxy",
        "sqlanywhere",
        "sybase",
        "vfp");
    $options = array_combine($options, $options);
    $settings->add(new admin_setting_configselect('local_extdb/dbtype',
        get_string('dbtype', 'local_extdb'),
        get_string('dbtype_desc', 'local_extdb'), '', $options));

    // Db host.
    $settings->add(new admin_setting_configtext('local_extdb/dbhost',
        get_string('dbhost', 'local_extdb'),
        get_string('dbhost_desc', 'local_extdb'), 'localhost'));

    // Db User.
    $settings->add(new admin_setting_configtext('local_extdb/dbuser',
        get_string('dbuser', 'local_extdb'), '', ''));

    // Db Password.
    $settings->add(new admin_setting_configpasswordunmask('local_extdb/dbpass',
        get_string('dbpass', 'local_extdb'), '', ''));

    // Db Name.
    $settings->add(new admin_setting_configtext('local_extdb/dbname',
        get_string('dbname', 'local_extdb'),
        get_string('dbname_desc', 'local_extdb'), ''));

    // Db Encoding.
    $settings->add(new admin_setting_configtext('local_extdb/dbencoding',
        get_string('dbencoding', 'local_extdb'), '', 'utf-8'));

    // Db Setup.
    $settings->add(new admin_setting_configtext('local_extdb/dbsetupsql',
        get_string('dbsetupsql', 'local_extdb'),
        get_string('dbsetupsql_desc', 'local_extdb'), ''));

    // Db Sybase.
    $settings->add(new admin_setting_configcheckbox('local_extdb/dbsybasequoting',
        get_string('dbsybasequoting', 'local_extdb'),
        get_string('dbsybasequoting_desc', 'local_extdb'), 0));

    // AODBC Debug.
    $settings->add(new admin_setting_configcheckbox('local_extdb/debugdb',
        get_string('debugdb', 'local_extdb'),
        get_string('debugdb_desc', 'local_extdb'), 0));

}
